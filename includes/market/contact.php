<?php
/**
 * Market contact page — shared by every country site.
 * Expects: $mc, $MK, $MC.
 */
$mc = $mc ?? current_market_code();
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];
$cp = contact_point($mc);

$ph = [
    'eyebrow' => 'Contact · ' . $MK['name'],
    'title'   => 'Speak to the ' . $MK['name'] . ' team',
    'lede'    => 'Tell us about the building and the requirement. You will get an engineering response, not a sales script.',
    'image'   => '/assets/img/consultation.jpg',
    'alt'     => 'Two colleagues reviewing a document together in a meeting room',
    'meta'    => [
        'Response' => 'Aimed at ' . RESPONSE_TARGET,
        'Contact'  => $MK['name'] . ' team',
    ],
];
require __DIR__ . '/../sections/page-hero.php';
?>

<section class="section section--white">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-panel reveal">
                <p class="eyebrow">Step 01</p>
                <h2 class="display-md">The <?= e($MK['name']) ?> team</h2>
                <p class="contact-panel__intro"><?= e($cp['note']) ?></p>

                <dl class="contact-lines">
                    <div><dt><?= icon('phone', 'line-icon') ?><span class="visually-hidden">Phone</span></dt><dd><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a></dd></div>
                    <div><dt><?= icon('mail', 'line-icon') ?><span class="visually-hidden">Email</span></dt><dd><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></dd></div>
<?php if ($cp['hours'] !== ''): ?>
                    <div><dt><?= icon('clock', 'line-icon') ?><span class="visually-hidden">Hours</span></dt><dd><?= e($cp['hours']) ?></dd></div>
<?php endif; ?>
<?php if ($cp['whatsapp'] !== ''): ?>
                    <div><dt><?= icon('chat', 'line-icon') ?><span class="visually-hidden">WhatsApp</span></dt><dd><a href="https://wa.me/<?= e($cp['whatsapp']) ?>" target="_blank" rel="noopener">+<?= e($cp['phone']) ?></a></dd></div>
<?php endif; ?>
<?php foreach ($cp['offices'] as $loc): ?>
                    <div><dt><?= icon('pin', 'line-icon') ?><span class="visually-hidden">Office</span></dt><dd><?= e($loc['address']) !== '' ? e($loc['address']) : e($loc['city']) . ' — address to be confirmed' ?></dd></div>
<?php endforeach; ?>
                </dl>

                <div class="notice notice--tight">
                    <p class="notice__copy"><strong>Useful to include:</strong> the type of building, the temperature or comfort requirement, the location, whether anything is running now, and when the work is needed.</p>
                </div>

                <div class="contact-panel__switch">
                    <p class="label">Other markets</p>
                    <ul class="drawer__markets">
<?php foreach ($MARKETS as $mcode => $mk): if ($mcode === 'global' || $mcode === $mc) continue; ?>
                        <li><a class="drawer__market" href="<?= e($mk['prefix']) ?>contact/"><?= e($mk['name']) ?></a></li>
<?php endforeach; ?>
                        <li><a class="drawer__market" href="/contact/">International</a></li>
                    </ul>
                </div>
            </div>

            <div class="enquiry-panel reveal" data-delay="1">
                <p class="eyebrow">Step 02</p>
                <h2 class="display-md">The requirement</h2>
<?php require __DIR__ . '/../sections/enquiry.php'; ?>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../sections/cta.php'; ?>
