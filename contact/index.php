<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'contact',
    'title'       => 'Contact Rotash Power Projects — Request a Consultation',
    'description' => 'Discuss your HVAC or engineering project with Rotash Power Projects. Choose your market — United Kingdom or South Africa — for the right local contact details.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Contact</p>
            <h1 class="heading-1">Let's discuss your project</h1>
            <p class="lede lede--on-dark">Choose your market, and you will deal directly with the team that will deliver the work.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="contact-grid">
            <!-- Left: market selection + local details -->
            <div class="contact-panel reveal">
                <div>
                    <p class="eyebrow">Step 01</p>
                    <h2 class="display-md">Where are you contacting us from?</h2>
                </div>
                <div class="market-switch" data-market-switch>
                    <button type="button" class="market-switch__btn is-active" data-switch-market="uk">United Kingdom</button>
                    <button type="button" class="market-switch__btn" data-switch-market="south-africa">South Africa</button>
                    <button type="button" class="market-switch__btn" data-switch-market="global">Other / International</button>
                </div>

<?php foreach (['uk', 'south-africa', 'global'] as $code): $o = $OFFICES[$code]; ?>
                <div class="contact-panel__card" data-market-panel="<?= e($code) ?>"<?= $code !== 'uk' ? ' hidden' : '' ?>>
                    <h3><?= e($o['name']) ?></h3>
                    <div class="stack-3">
                        <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $o['phone'])) ?>"><?= e($o['phone']) ?></a></p>
                        <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($o['email']) ?>"><?= e($o['email']) ?></a></p>
                        <p class="office__line"><strong>Hours</strong> <?= e($o['hours_label']) ?></p>
                    </div>
<?php if ($o['locations']): ?>
                    <hr class="divider mt-6" style="margin-bottom: 20px;">
                    <div class="stack-3">
<?php foreach ($o['locations'] as $loc): ?>
                        <p class="office__line"><strong>Office</strong> <?= e($loc['address']) ?></p>
<?php endforeach; ?>
                    </div>
<?php endif; ?>
<?php if (!empty($o['todo'])): ?>
                    <!-- TODO(UK): <?= e($o['todo']) ?> -->
                    <p class="body-sm text-muted mt-6">Local office details are being finalised — enquiries are handled by the group team in the meantime.</p>
<?php endif; ?>
                </div>
<?php endforeach; ?>

                <div class="card--info">
                    <p class="body-sm"><strong>Prefer to write?</strong> Email the team directly and include your building type, location and timeline — it lets us respond with something useful on the first reply.</p>
                </div>
            </div>

            <!-- Right: enquiry form -->
            <div class="contact-panel__card reveal" data-delay="1" style="padding: 40px;">
                <p class="eyebrow">Step 02</p>
                <h2 class="display-md" style="margin-bottom: 24px;">Tell us about the project</h2>

                <!-- TODO(form): wire action to a PHP handler (mail()/SMTP + honeypot + rate limit)
                     before launch. Currently handled client-side as a demonstration. -->
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
                                <option value="uk" selected>United Kingdom</option>
                                <option value="south-africa">South Africa</option>
                                <option value="other">Other / International</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="f-service">Service required</label>
                            <select id="f-service" name="service">
<?php foreach ($SERVICES as $s): ?>
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
                        <textarea id="f-message" name="message" rows="5" required placeholder="Building type, location, timeline, and what the system needs to do."></textarea>
                        <span class="field__error">Please tell us a little about the project.</span>
                    </div>
                    <button type="submit" class="btn btn--primary btn--lg" data-submit-btn>Discuss Your Project</button>
                    <p class="form__note">We respond within one business day. Your details are used only to answer your enquiry.</p>
                    <p class="form__success" data-form-success role="status">Thank you — your enquiry has been recorded. The team for your selected market will respond within one business day.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
