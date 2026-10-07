<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'services',
    'title'       => 'HVAC & Refrigeration Services in South Africa | Rotash Power Projects',
    'description' => 'Commercial refrigeration, HVAC, air conditioning, ventilation, mechanical services and planned maintenance delivered across South Africa by Rotash Power Projects.',
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
            <p class="eyebrow eyebrow--on-dark">Services · South Africa</p>
            <h1 class="heading-1">HVAC & refrigeration services in South Africa</h1>
            <p class="lede lede--on-dark">Everything the South African operation delivers — from cold rooms to complete building climate systems, under one contract.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Local capability</p>
            <h2 class="display-lg">Services available in South Africa</h2>
            <p>Delivered directly by the SA teams from Queenstown, East London and Mthatha.</p>
        </div>
        <div class="grid grid--3">
<?php
$zaList = array_values(array_filter($SERVICES, fn($s) => in_array('south-africa', $s['markets'], true)));
foreach ($zaList as $i => $s): ?>
            <article class="card card--hover svc-card reveal" id="za-<?= e($s['id']) ?>" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <a class="btn-link" href="/south-africa/contact/">Enquire — SA team <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Delivery</p>
                <h2 class="display-lg">Cold-chain integrity through every phase</h2>
                <div class="prose mt-6">
                    <p>Refrigeration and climate works in live environments are sequenced so product temperature and operations are never exposed. Cutovers are staged, capacity is kept available and verification happens before anything is signed off.</p>
                </div>
                <a class="btn btn--secondary mt-8" href="/south-africa/projects/">SA case studies</a>
            </div>
            <ol class="process reveal" data-delay="1">
                <li class="process__item"><span class="process__num">01</span><div><h3 class="process__title">Survey & load assessment</h3><p class="process__copy">Ambient conditions, product loads, usage cycles and existing plant documented on site.</p></div></li>
                <li class="process__item"><span class="process__num">02</span><div><h3 class="process__title">Design & specification</h3><p class="process__copy">Plant selected for South African conditions and the real duty — with maintainability built in.</p></div></li>
                <li class="process__item"><span class="process__num">03</span><div><h3 class="process__title">Install & commission</h3><p class="process__copy">Phased installation, leak testing, charge optimisation and temperature verification.</p></div></li>
                <li class="process__item"><span class="process__num">04</span><div><h3 class="process__title">Handover & maintain</h3><p class="process__copy">Documentation, operator training and planned maintenance to protect continuity.</p></div></li>
            </ol>
        </div>
    </div>
</section>

<section class="section section--navy">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow eyebrow--on-dark">Related</p>
            <h2 class="display-lg">See the work and the sectors</h2>
        </div>
        <div class="grid grid--2">
            <a class="card card--dark reveal" href="/south-africa/industries/">
                <h3 class="card__title">SA industries</h3>
                <p class="card__copy">Which sectors the South African operation engineers for, and what each demands.</p>
            </a>
            <a class="card card--dark reveal" data-delay="1" href="/south-africa/projects/">
                <h3 class="card__title">SA projects</h3>
                <p class="card__copy">Case studies by scope, challenge, engineering solution and outcome.</p>
            </a>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Scope your South African project.',
    'copy'    => 'Tell us the facility, the load and the timeline — the SA team will take it from there.',
]; ?>
<?php require __DIR__ . '/../../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
