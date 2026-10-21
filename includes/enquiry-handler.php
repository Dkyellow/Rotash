<?php
declare(strict_types=1);

/**
 * Enquiry handling.
 *
 * Runs before the page is rendered so the contact pages can show a
 * real result instead of simulating one. Includes server-side
 * validation, a honeypot and a time trap for bots, a per-session
 * rate limit, an email to the market contact and a local log entry.
 */

$ENQUIRY_FIELDS = [
    'name'      => 'Your name',
    'company'   => 'Company',
    'email'     => 'Email address',
    'phone'     => 'Phone',
    'market'    => 'Country',
    'discipline' => 'Discipline',
    'engagement' => 'How you would like to work with us',
    'site'      => 'Site or facility',
    'message'   => 'Message',
];

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
    session_start();
}

function enquiry_clean(string $v): string
{
    $v = trim(str_replace(["\r", "\n", "\t"], ' ', $v));
    return mb_substr($v, 0, 4000);
}

function enquiry_mail_safe(string $v): string
{
    return str_replace(["\r", "\n", "%0a", "%0d"], '', $v);
}

$enquiry = ['state' => 'idle', 'errors' => [], 'values' => []];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['enquiry'])) {
    $enquiry['values'] = [
        'name'       => enquiry_clean($_POST['name'] ?? ''),
        'company'    => enquiry_clean($_POST['company'] ?? ''),
        'email'      => enquiry_clean($_POST['email'] ?? ''),
        'phone'      => enquiry_clean($_POST['phone'] ?? ''),
        'market'     => enquiry_clean($_POST['market'] ?? ''),
        'discipline' => enquiry_clean($_POST['discipline'] ?? ''),
        'engagement' => enquiry_clean($_POST['engagement'] ?? ''),
        'site'       => enquiry_clean($_POST['site'] ?? ''),
        'message'    => enquiry_clean($_POST['message'] ?? ''),
        'consent'    => !empty($_POST['consent']),
    ];

    $honeypot = enquiry_clean($_POST['website'] ?? '');
    $ts       = (int) ($_POST['ts'] ?? 0);
    $elapsed  = $ts > 0 ? time() - $ts : 999;

    /* Bot traps: a filled hidden field, or a submission faster than a
       human could type it. Both are treated as a silent success so the
       sender is not told the trap exists. */
    if ($honeypot !== '' || $elapsed < 3) {
        $enquiry['state'] = 'sent';
        $enquiry['errors'] = [];
        unset($_POST);
    } else {
        $errors = [];
        if ($enquiry['values']['name'] === '') {
            $errors['name'] = 'Please tell us your name.';
        }
        if ($enquiry['values']['email'] === '' || !filter_var($enquiry['values']['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please give us a valid email address so we can reply.';
        }
        if ($enquiry['values']['market'] === '') {
            $errors['market'] = 'Please tell us which country the work is in.';
        }
        if (mb_strlen($enquiry['values']['message']) < 20) {
            $errors['message'] = 'Please describe the requirement in a little more detail.';
        }
        if (!$enquiry['values']['consent']) {
            $errors['consent'] = 'Please confirm we may reply to your enquiry.';
        }

        /* Per-session rate limit. */
        $now = time();
        $sent = $_SESSION['enquiries'] ?? [];
        $sent = array_values(array_filter($sent, fn($t) => $t > $now - 3600));
        if (count($sent) >= 5) {
            $errors['form'] = 'We have received several enquiries from this browser recently. Please call the team on ' . GROUP_CONTACT['phone'] . ' so we can help you directly.';
        }

        if ($errors) {
            $enquiry['state'] = 'error';
            $enquiry['errors'] = $errors;
        } else {
            $marketCode = $enquiry['values']['market'];
            $target     = ($marketCode !== '' && isset($OFFICES[$marketCode])) ? $marketCode : 'global';
            $to         = contact_point($target)['email'] ?: GROUP_CONTACT['email'];

            $lines = [];
            foreach ($ENQUIRY_FIELDS as $key => $label) {
                $value = $enquiry['values'][$key] ?? '';
                if ($key === 'consent') {
                    continue;
                }
                $lines[] = $label . ': ' . ($value === '' ? '—' : $value);
            }
            $lines[] = '';
            $lines[] = 'Market: ' . $marketCode;
            $lines[] = 'Source: ' . (($_SERVER['HTTP_REFERER'] ?? '') ?: 'direct');
            $lines[] = 'Received: ' . gmdate('D, d M Y H:i:s') . ' UTC';

            $body = implode("\r\n", $lines);
            $subject = 'Website enquiry — ' . ($enquiry['values']['company'] ?: $enquiry['values']['name'])
                . ' — ' . $marketCode;

            $headers = [
                'From: Rotash Power Projects <no-reply@rotashpowerprojects.com>',
                'Reply-To: ' . enquiry_mail_safe($enquiry['values']['email']),
                'X-Mailer: RotashWeb/1.0',
                'Content-Type: text/plain; charset=UTF-8',
            ];

            $sent_ok = @mail($to, enquiry_mail_safe($subject), $body, implode("\r\n", $headers));

            /* Local log: a second copy of the enquiry that survives if
               outbound mail is not configured on the host. */
            $log_ok = false;
            $dir = dirname(__DIR__) . '/storage';
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            if (is_dir($dir) && is_writable($dir)) {
                /* Guarantee the log is not web readable, whatever the
                   host configuration happens to be. */
                $guard = $dir . '/.htaccess';
                if (!is_file($guard)) {
                    @file_put_contents($guard, "<IfModule mod_authz_core.c>\n    Require all denied\n</IfModule>\n<IfModule !mod_authz_core.c>\n    Order allow,deny\n    Deny from all\n</IfModule>\n");
                }
                $record = [
                    'received' => gmdate('c'),
                    'market'   => $marketCode,
                    'fields'   => $enquiry['values'],
                    'mail'     => $sent_ok,
                ];
                @file_put_contents($dir . '/enquiries.jsonl', json_encode($record, JSON_UNESCAPED_SLASHES) . "\n", FILE_APPEND | LOCK_EX);
                $log_ok = true;
            }

            if ($sent_ok || $log_ok) {
                $_SESSION['enquiries'] = $sent;
                $_SESSION['enquiries'][] = $now;
                $_SESSION['enquiry_sent'] = $now;
                $enquiry['state'] = 'sent';
                $enquiry['errors'] = [];
                /* Avoid resubmission on refresh. */
                if (!headers_sent()) {
                    header('Location: ' . (($_SERVER['REQUEST_URI'] ?? '/') . '#enquiry-form'), true, 303);
                    exit;
                }
            } else {
                $enquiry['state'] = 'error';
                $enquiry['errors']['form'] = 'We could not send that message. Please email ' . GROUP_CONTACT['email']
                    . ' or call ' . GROUP_CONTACT['phone'] . ' and we will pick it up from there.';
            }
        }
    }
} elseif (!empty($_SESSION['enquiry_sent']) && (time() - (int) $_SESSION['enquiry_sent']) < 600) {
    /* Confirmation shown once after the post/redirect/get cycle. */
    $enquiry['state'] = 'sent';
    unset($_SESSION['enquiry_sent']);
}
