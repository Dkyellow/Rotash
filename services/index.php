<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'services',
    'title'       => 'HVAC & Engineering Services | Rotash Power Projects',
    'description' => 'HVAC systems, air conditioning, ventilation, refrigeration, mechanical services, maintenance and end-to-end engineering project delivery — internationally, from Rotash Power Projects.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Services</p>
            <h1 class="heading-1">HVAC & engineering services</h1>
            <p class="lede lede--on-dark">A complete building-climate capability — design, installation, commissioning, refrigeration and long-term maintenance — delivered to one engineering standard in every market.</p>
        </div>
    </div>
</section>

<!-- Service categories -->
<section class="section section--white" id="services">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Capabilities</p>
            <h2 class="display-lg">Service categories</h2>
            <!-- Each category is structured to become its own SEO landing page
                 (e.g. /uk/services/hvac/) once confirmed for that market.
                 Availability is controlled per market in data/services.php. -->
            <p>Every engagement combines the categories below into a single scoped programme — survey, design, install, commission, maintain.</p>
        </div>
        <div class="grid grid--3">
<?php foreach (array_values($SERVICES) as $i => $s): ?>
            <article class="card card--hover svc-card reveal" id="<?= e($s['id']) ?>" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <p class="card__foot body-sm text-muted">Markets: <?= e(implode(', ', array_map(fn($c) => $MARKETS[$c]['name'], $s['markets']))) ?></p>
                <a class="btn-link" href="/contact/">Discuss this service <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Delivery lifecycle -->
<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Delivery</p>
                <h2 class="display-lg">One lifecycle, whichever service you engage</h2>
                <div class="prose mt-6">
                    <p>Maintenance without installation knowledge fixes symptoms. Installation without design knowledge guesses. We run the full lifecycle so every stage informs the next.</p>
                </div>
                <a class="btn btn--secondary mt-8" href="/projects/">See it applied in projects</a>
            </div>
            <ol class="process reveal" data-delay="1">
                <li class="process__item"><span class="process__num">01</span><div><h3 class="process__title">Survey & brief</h3><p class="process__copy">Site conditions, loads, existing plant and operational constraints documented first.</p></div></li>
                <li class="process__item"><span class="process__num">02</span><div><h3 class="process__title">Design & specification</h3><p class="process__copy">System selection and distribution engineered to the duty and the budget.</p></div></li>
                <li class="process__item"><span class="process__num">03</span><div><h3 class="process__title">Install & commission</h3><p class="process__copy">Controlled installation, balancing and verification against the brief.</p></div></li>
                <li class="process__item"><span class="process__num">04</span><div><h3 class="process__title">Maintain & optimise</h3><p class="process__copy">Planned maintenance and performance review to protect the asset over its life.</p></div></li>
            </ol>
        </div>
    </div>
</section>

<!-- Market routing -->
<section class="section section--navy">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow eyebrow--on-dark">By market</p>
            <h2 class="display-lg">Services are scoped per country</h2>
            <p>Each market page lists what is offered locally, with local contact details and delivery context.</p>
        </div>
        <div class="grid grid--2">
            <a class="card card--dark reveal" href="/uk/services/">
                <p class="card__index" style="color: rgba(255,255,255,0.55);">United Kingdom</p>
                <h3 class="card__title">Services in the UK</h3>
                <p class="card__copy">HVAC, ventilation, air conditioning, mechanical services and maintenance for British buildings.</p>
                <span class="btn-link btn-link--on-dark mt-6" style="display: inline-flex;">UK services <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></span>
            </a>
            <a class="card card--dark reveal" data-delay="1" href="/south-africa/services/">
                <p class="card__index" style="color: rgba(255,255,255,0.55);">South Africa</p>
                <h3 class="card__title">Services in South Africa</h3>
                <p class="card__copy">Climate control, commercial refrigeration, ventilation and maintenance across the Eastern Cape and beyond.</p>
                <span class="btn-link btn-link--on-dark mt-6" style="display: inline-flex;">South Africa services <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></span>
            </a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
