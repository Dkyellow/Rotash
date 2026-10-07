<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'locations',
    'title'       => 'Our Locations — United Kingdom & South Africa | Rotash Power Projects',
    'description' => 'Rotash Power Projects office locations and contact details in the United Kingdom and South Africa, with local phone, email and business hours for each market.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="/assets/img/uk-buildings.jpg" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Locations</p>
            <h1 class="heading-1">Local teams. One standard.</h1>
            <p class="lede lede--on-dark">Contact details, offices and business hours for each market — always the team closest to your project.</p>
        </div>
    </div>
</section>

<?php foreach (['uk', 'south-africa'] as $code): $o = $OFFICES[$code]; $mk = $MARKETS[$code]; ?>
<section class="section <?= $code === 'uk' ? 'section--white' : 'section--pale' ?>">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Market</p>
                <h2 class="display-lg"><?= e($mk['name']) ?></h2>
                <p><?= $code === 'uk'
                    ? 'HVAC and building services engineering for clients across the United Kingdom.'
                    : 'Climate control, commercial refrigeration and mechanical services from Eastern Cape operations.' ?></p>
            </div>
            <a class="btn btn--secondary" href="<?= e($mk['prefix']) ?>contact/">Contact <?= e($mk['name']) ?></a>
        </div>

        <div class="grid grid--<?= $code === 'uk' ? '2' : '3' ?>">
<?php foreach ($o['locations'] as $loc): ?>
            <div class="office reveal">
                <span class="market-card__flag"><?= e($mk['name']) ?></span>
                <h3 class="office__city"><?= e($loc['city']) ?></h3>
                <p class="office__line"><strong>Address</strong> <?= e($loc['address']) ?></p>
<?php if (!empty($loc['region'])): ?>
                <p class="office__line"><strong>Region</strong> <?= e($loc['region']) ?></p>
<?php endif; ?>
                <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $o['phone'])) ?>"><?= e($o['phone']) ?></a></p>
                <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($o['email']) ?>"><?= e($o['email']) ?></a></p>
                <p class="office__line"><strong>Hours</strong> <?= e($o['hours_label']) ?></p>
<?php if (empty($loc['todo'])): ?>
                <p class="office__map"><a class="btn-link" target="_blank" rel="noopener" href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($loc['address']) ?>">View on map <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a></p>
<?php else: ?>
                <!-- TODO(UK): map link activates once the verified address is in data/offices.php -->
                <p class="office__map body-sm text-muted">Map published once the office address is confirmed.</p>
<?php endif; ?>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>
<?php endforeach; ?>

<section class="section section--navy">
    <div class="container">
        <div class="grid grid--2">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">Global</p>
                <h3 class="display-md">Headed by <?= e(PARENT_GROUP) ?></h3>
                <p class="card__copy" style="color: rgba(255,255,255,0.75); margin-top: 12px;">Group enquiries and international projects: <a href="mailto:<?= e($OFFICES['global']['email']) ?>" style="color: #fff; text-decoration: underline;"><?= e($OFFICES['global']['email']) ?></a></p>
            </div>
            <div class="reveal" data-delay="1">
                <p class="eyebrow eyebrow--on-dark">Not sure who to contact?</p>
                <h3 class="display-md">Use the location selector</h3>
                <p class="card__copy" style="color: rgba(255,255,255,0.75); margin-top: 12px;">Switch markets from the navigation at any time — you always choose which team you talk to.</p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
