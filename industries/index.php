<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'industries',
    'title'       => 'Industries We Serve — Commercial, Industrial & Critical Sectors | Rotash',
    'description' => 'HVAC and engineering capability structured around the sectors that need it: commercial buildings, retail, hospitality, industrial facilities, healthcare, offices, education and data centres.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Industries</p>
            <h1 class="heading-1">Engineering that understands the sector</h1>
            <p class="lede lede--on-dark">A shop floor, an operating theatre and a hotel bedroom impose completely different demands on air and temperature. We design to the sector's reality, not a generic load.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Sectors</p>
            <h2 class="display-lg">Industries we serve</h2>
            <!-- Sector list is gated per market in data/industries.php.
                 Sector-specific landing pages (/uk/industries/<sector>/) can be
                 enabled once confirmed with the client. -->
            <p>Capability areas across our operating markets — United Kingdom and South Africa.</p>
        </div>
        <div class="industry-grid reveal">
<?php foreach ($INDUSTRIES as $ind): ?>
            <div class="industry-cell">
                <h3 class="industry-cell__name"><?= e($ind['name']) ?></h3>
                <p class="industry-cell__copy"><?= e($ind['short']) ?></p>
                <span class="industry-cell__arrow body-xs"><?= e(implode(' · ', array_map(fn($c) => $MARKETS[$c]['name'], $ind['markets']))) ?></span>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2" style="gap: 60px; align-items: start;">
            <div class="reveal">
                <p class="eyebrow">Why sector knowledge matters</p>
                <h2 class="display-lg">Different duty. Different design.</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p><strong>Retail and hospitality</strong> run on comfort and presentation — quiet plant, stable display temperatures, no disruption to trading.</p>
                <p><strong>Industrial and manufacturing</strong> run on process: extraction, ventilation and climate that keep production moving.</p>
                <p><strong>Healthcare and education</strong> run on air quality and reliability, where ventilation performance is not negotiable.</p>
                <p><strong>Offices and commercial buildings</strong> run on cost: comfort people accept, at a running cost the operator can defend.</p>
            </div>
        </div>
        <div class="mt-10 reveal" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a class="btn btn--primary" href="/contact/">Discuss your sector</a>
            <a class="btn btn--secondary" href="/projects/">See sector projects</a>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Tell us what the building has to do.',
    'copy'    => 'The sector, the occupancy, the constraints — we will engineer to them.',
]; ?>
<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
