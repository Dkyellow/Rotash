<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'contact',
    'title'       => 'Contact Rotash Power Projects South Africa — HVAC Enquiries',
    'description' => 'Contact the South African team of Rotash Power Projects — Queenstown, East London and Mthatha offices, phone, email and business hours. Choose your market for the correct details.',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Contact · South Africa</p>
            <h1 class="heading-1">Speak to the SA team</h1>
            <p class="lede lede--on-dark">Choose your location for the right contact details, then tell us about the facility — we respond within one business day.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-panel reveal">
                <div>
                    <p class="eyebrow">Step 01</p>
                    <h2 class="display-md">Where are you contacting us from?</h2>
                </div>
                <div class="market-switch" data-market-switch>
                    <button type="button" class="market-switch__btn" data-switch-market="uk">United Kingdom</button>
                    <button type="button" class="market-switch__btn is-active" data-switch-market="south-africa">South Africa</button>
                    <button type="button" class="market-switch__btn" data-switch-market="global">Other / International</button>
                </div>

<?php foreach (['south-africa', 'uk', 'global'] as $code): $o = $OFFICES[$code]; ?>
                <div class="contact-panel__card" data-market-panel="<?= e($code) ?>"<?= $code !== 'south-africa' ? ' hidden' : '' ?>>
                    <h3><?= e($o['name']) ?></h3>
                    <div class="stack-3">
                        <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $o['phone'])) ?>"><?= e($o['phone']) ?></a></p>
                        <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($o['email']) ?>"><?= e($o['email']) ?></a></p>
                        <p class="office__line"><strong>Hours</strong> <?= e($o['hours_label']) ?></p>
<?php if (!empty($o['whatsapp'])): ?>
                        <p class="office__line"><strong>WhatsApp</strong> <a href="https://wa.me/<?= e($o['whatsapp']) ?>" target="_blank" rel="noopener">+<?= e($o['phone']) ?></a></p>
<?php endif; ?>
                    </div>
<?php if ($o['locations']): ?>
                    <hr class="divider" style="margin: 20px 0;">
                    <div class="stack-3">
<?php foreach ($o['locations'] as $loc): ?>
                        <p class="office__line"><strong>Office</strong> <?= e($loc['address']) ?></p>
<?php endforeach; ?>
                    </div>
<?php endif; ?>
<?php if (!empty($o['todo'])): ?>
                    <!-- TODO(UK): <?= e($o['todo']) ?> -->
                    <p class="body-sm text-muted mt-6">UK office details are being finalised — enquiries route to the group team until published.</p>
<?php endif; ?>
                </div>
<?php endforeach; ?>

                <div class="card--info">
                    <p class="body-sm"><strong>Switch any time.</strong> You always choose which market's team you deal with — nothing is decided for you.</p>
                </div>
            </div>

            <div class="contact-panel__card reveal" data-delay="1" style="padding: 40px;">
                <p class="eyebrow">Step 02</p>
                <h2 class="display-md" style="margin-bottom: 24px;">Tell us about the project</h2>

                <!-- TODO(form): wire to PHP handler (mail()/SMTP + honeypot) before launch. -->
                <form class="form" id="enquiry-form" method="post" action="#enquiry-form" novalidate data-enquiry-form>
                    <div class="form__row">
                        <div class="field">
                            <label for="f-name">Name <span class="req">*</span></label>
                            <input type="text" id="f-name" name="name" autocomplete="name" required>
                            <span class="field__error">Please enter your name.</span>
                        </div>
                        <div class="field">
                            <label for="f-company">Company</label>
                            <input type="text" id="f-company" name="company" autocomplete="organization">
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="field">
                            <label for="f-email">Email <span class="req">*</span></label>
                            <input type="email" id="f-email" name="email" autocomplete="email" required>
                            <span class="field__error">Please enter a valid email address.</span>
                        </div>
                        <div class="field">
                            <label for="f-phone">Phone</label>
                            <input type="tel" id="f-phone" name="phone" autocomplete="tel">
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="field">
                            <label for="f-country">Country</label>
                            <select id="f-country" name="country" data-country-select>
                                <option value="south-africa" selected>South Africa</option>
                                <option value="uk">United Kingdom</option>
                                <option value="other">Other / International</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="f-service">Service required</label>
                            <select id="f-service" name="service">
<?php foreach ($SERVICES as $s): if (!in_array('south-africa', $s['markets'], true)) continue; ?>
                                <option value="<?= e($s['id']) ?>"><?= e($s['name']) ?></option>
<?php endforeach; ?>
                                <option value="other">Other / Not sure yet</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="f-type">Project type</label>
                        <select id="f-type" name="project_type">
                            <option value="new-installation">New installation</option>
                            <option value="replacement">Replacement / Upgrade</option>
                            <option value="maintenance">Maintenance contract</option>
                            <option value="design">Design / Consultancy</option>
                            <option value="emergency">Emergency / Fault response</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="f-message">Message <span class="req">*</span></label>
                        <textarea id="f-message" name="message" rows="5" required placeholder="Facility type, location, timeline, and what the system needs to do."></textarea>
                        <span class="field__error">Please tell us a little about the project.</span>
                    </div>
                    <button type="submit" class="btn btn--primary btn--lg" data-submit-btn>Discuss Your Project</button>
                    <p class="form__note">We respond within one business day. Your details are used only to answer your enquiry.</p>
                    <p class="form__success" data-form-success role="status">Thank you — your enquiry has been recorded. The SA team will respond within one business day.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
