<?php
/**
 * Enquiry form.
 * Expects: $enquiry (state from includes/enquiry-handler.php).
 */
global $ENQUIRY_FIELDS, $ENGAGEMENT_MODELS;
$code   = current_market_code();
$errors = $enquiry['errors'] ?? [];
$values = $enquiry['values'] ?? [];
$state  = $enquiry['state'] ?? 'idle';

$marketOptions = [
    'south-africa' => 'South Africa',
    'zimbabwe'     => 'Zimbabwe',
    'uk'           => 'United Kingdom',
    'other'        => 'Another country',
];
$defaultMarket = $code === 'global' ? 'other' : $code;

$disciplines = services_for_market($code);
$engagements = [];
foreach ($ENGAGEMENT_MODELS as $m) {
    $engagements[$m['id']] = $m['name'];
}
$engagements['not-sure'] = 'Not sure yet — advise me';
?>
<div class="enquiry" id="enquiry-form">
<?php if ($state === 'sent'): ?>
    <div class="enquiry__success" role="status">
        <p class="enquiry__success-title">Enquiry received</p>
        <p>Thank you — your enquiry has reached the team for your market. We aim to respond within <?= e(RESPONSE_TARGET) ?>. If it is urgent, call <?= e(GROUP_CONTACT['phone']) ?>.</p>
    </div>
<?php else: ?>
<?php if (!empty($errors['form'])): ?>
    <p class="enquiry__form-error" role="alert"><?= e($errors['form']) ?></p>
<?php endif; ?>
    <form class="form" method="post" action="<?= e(mp('contact/')) ?>#enquiry-form" novalidate data-enquiry-form>
        <input type="hidden" name="enquiry" value="1">
        <input type="hidden" name="ts" value="<?= e((string) time()) ?>">
        <div class="form__hp" aria-hidden="true">
            <label for="f-website">Leave this field empty</label>
            <input type="text" id="f-website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form__row">
            <div class="field<?= isset($errors['name']) ? ' has-error' : '' ?>">
                <label for="f-name">Name <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="f-name" name="name" autocomplete="name" required
                       value="<?= e($values['name'] ?? '') ?>"<?= isset($errors['name']) ? ' aria-invalid="true" aria-describedby="err-name"' : '' ?>>
<?php if (isset($errors['name'])): ?>
                <span class="field__error" id="err-name"><?= e($errors['name']) ?></span>
<?php endif; ?>
            </div>
            <div class="field">
                <label for="f-company">Company</label>
                <input type="text" id="f-company" name="company" autocomplete="organization" value="<?= e($values['company'] ?? '') ?>">
            </div>
        </div>

        <div class="form__row">
            <div class="field<?= isset($errors['email']) ? ' has-error' : '' ?>">
                <label for="f-email">Email <span class="req" aria-hidden="true">*</span></label>
                <input type="email" id="f-email" name="email" autocomplete="email" required
                       value="<?= e($values['email'] ?? '') ?>"<?= isset($errors['email']) ? ' aria-invalid="true" aria-describedby="err-email"' : '' ?>>
<?php if (isset($errors['email'])): ?>
                <span class="field__error" id="err-email"><?= e($errors['email']) ?></span>
<?php endif; ?>
            </div>
            <div class="field">
                <label for="f-phone">Phone</label>
                <input type="tel" id="f-phone" name="phone" autocomplete="tel" value="<?= e($values['phone'] ?? '') ?>">
            </div>
        </div>

        <div class="form__row">
            <div class="field<?= isset($errors['market']) ? ' has-error' : '' ?>">
                <label for="f-market">Country <span class="req" aria-hidden="true">*</span></label>
                <select id="f-market" name="market" required>
<?php foreach ($marketOptions as $mk => $label): ?>
                    <option value="<?= e($mk) ?>"<?= ($values['market'] ?? $defaultMarket) === $mk ? ' selected' : '' ?>><?= e($label) ?></option>
<?php endforeach; ?>
                </select>
<?php if (isset($errors['market'])): ?>
                <span class="field__error" id="err-market"><?= e($errors['market']) ?></span>
<?php endif; ?>
            </div>
            <div class="field">
                <label for="f-discipline">Discipline</label>
                <select id="f-discipline" name="discipline">
                    <option value="">Not sure yet</option>
<?php foreach ($disciplines as $id => $s): ?>
                    <option value="<?= e($s['name']) ?>"<?= ($values['discipline'] ?? '') === $s['name'] ? ' selected' : '' ?>><?= e($s['nav']) ?></option>
<?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form__row">
            <div class="field">
                <label for="f-engagement">How you would like to work with us</label>
                <select id="f-engagement" name="engagement">
<?php foreach ($engagements as $id => $label): ?>
                    <option value="<?= e($label) ?>"<?= ($values['engagement'] ?? '') === $label ? ' selected' : '' ?>><?= e($label) ?></option>
<?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="f-site">Site or facility</label>
                <input type="text" id="f-site" name="site" placeholder="Building type, town or city" value="<?= e($values['site'] ?? '') ?>">
            </div>
        </div>

        <div class="field<?= isset($errors['message']) ? ' has-error' : '' ?>">
            <label for="f-message">The requirement <span class="req" aria-hidden="true">*</span></label>
            <textarea id="f-message" name="message" rows="6" required
                      placeholder="What the system has to do, the temperatures involved, the building, and when it is needed."
                      <?= isset($errors['message']) ? ' aria-invalid="true" aria-describedby="err-message"' : '' ?>><?= e($values['message'] ?? '') ?></textarea>
<?php if (isset($errors['message'])): ?>
            <span class="field__error" id="err-message"><?= e($errors['message']) ?></span>
<?php endif; ?>
        </div>

        <div class="field field--check<?= isset($errors['consent']) ? ' has-error' : '' ?>">
            <label for="f-consent">
                <input type="checkbox" id="f-consent" name="consent" value="1"<?= !empty($values['consent']) ? ' checked' : '' ?>>
                <span>I agree that Rotash Power Projects may use these details to reply to this enquiry. <span class="req" aria-hidden="true">*</span></span>
            </label>
<?php if (isset($errors['consent'])): ?>
            <span class="field__error" id="err-consent"><?= e($errors['consent']) ?></span>
<?php endif; ?>
        </div>

        <button type="submit" class="btn btn--primary btn--lg" data-submit-btn>Send enquiry</button>
        <p class="form__note">We aim to respond within <?= e(RESPONSE_TARGET) ?>. Your details are used only to answer this enquiry.</p>
    </form>
<?php endif; ?>
</div>
