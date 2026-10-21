<?php
/**
 * Office and contact cards.
 * Expects: $offices (array of market codes to show), $office_head (optional)
 */
$offices = $offices ?? ['zimbabwe', 'south-africa', 'uk'];
$office_head = $office_head ?? [];
?>
<section class="section section--white" id="locations">
    <div class="container">
<?php if ($office_head): ?>
        <div class="section-head section-head--center reveal">
<?php if (!empty($office_head['eyebrow'])): ?>
            <p class="eyebrow"><?= e($office_head['eyebrow']) ?></p>
<?php endif; ?>
            <h2 class="display-lg"><?= e($office_head['title']) ?></h2>
<?php if (!empty($office_head['copy'])): ?>
            <p><?= e($office_head['copy']) ?></p>
<?php endif; ?>
        </div>
<?php endif; ?>
        <div class="office-grid">
<?php foreach ($offices as $mc):
    $o = office($mc);
    $mk = market($mc);
    $cp = contact_point($mc);
?>
            <article class="office-card reveal">
                <header class="office-card__head">
                    <p class="office-card__country"><?= e($mk['name']) ?></p>
                    <h3 class="office-card__region"><?= e($mk['region']) ?></h3>
                </header>
                <p class="office-card__summary"><?= e($mk['summary']) ?></p>

<?php if ($cp['pending']): ?>
                <div class="office-card__pending">
                    <p class="label">Contact</p>
                    <p><?= e($cp['note']) ?></p>
                    <p class="office-card__routing">
                        <a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a>
                        <a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a>
                    </p>
                </div>
<?php else: ?>
                <dl class="office-card__lines">
<?php foreach ($cp['offices'] as $loc): ?>
                    <div><dt><?= e($loc['city']) ?></dt><dd><?= e($loc['address']) ?></dd></div>
<?php endforeach; ?>
                    <div><dt>Phone</dt><dd><a href="tel:<?= e(tel_href($cp['phone'])) ?>"><?= e($cp['phone']) ?></a></dd></div>
                    <div><dt>Email</dt><dd><a href="mailto:<?= e($cp['email']) ?>"><?= e($cp['email']) ?></a></dd></div>
<?php if ($cp['hours'] !== ''): ?>
                    <div><dt>Hours</dt><dd><?= e($cp['hours']) ?></dd></div>
<?php endif; ?>
                </dl>
<?php endif; ?>
                <a class="office-card__link btn-link" href="<?= e(market_url($mc, 'contact/')) ?>">Contact <?= e($mk['name']) ?> <svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
