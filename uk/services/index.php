<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'services',
    'title'       => 'HVAC Services in the UK — Design, Installation & Maintenance | Rotash',
    'description' => 'UK HVAC services: system design, air conditioning, ventilation, heating and cooling, mechanical services, commissioning and planned maintenance for British buildings.',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Services · United Kingdom</p>
            <h1 class="heading-1">HVAC services for UK buildings</h1>
            <p class="lede lede--on-dark">Everything the UK operation delivers — scoped, programmed and commissioned by one accountable team.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">UK capability</p>
            <h2 class="display-lg">Services available in the United Kingdom</h2>
            <p>Each category below is delivered directly by the UK team. Availability is confirmed per market — this list is what the UK operation presents today.</p>
        </div>
        <div class="grid grid--3">
<?php
$ukList = array_values(array_filter($SERVICES, fn($s) => in_array('uk', $s['markets'], true)));
foreach ($ukList as $i => $s): ?>
            <article class="card card--hover svc-card reveal" id="uk-<?= e($s['id']) ?>" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <a class="btn-link" href="/uk/contact/">Enquire — UK team <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
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
                <h2 class="display-lg">From survey to signed handover</h2>
                <div class="prose mt-6">
                    <p>UK projects follow the group lifecycle with local programming: surveys scheduled around building access, installation phased around occupancy, commissioning proven before sign-off.</p>
                </div>
                <a class="btn btn--secondary mt-8" href="/uk/projects/">UK case studies</a>
            </div>
            <ol class="process reveal" data-delay="1">
                <li class="process__item"><span class="process__num">01</span><div><h3 class="process__title">Survey & brief</h3><p class="process__copy">Site survey, existing plant review and duty confirmation with the building operator.</p></div></li>
                <li class="process__item"><span class="process__num">02</span><div><h3 class="process__title">Design & specification</h3><p class="process__copy">Equipment selection and distribution design issued for coordination with other trades.</p></div></li>
                <li class="process__item"><span class="process__num">03</span><div><h3 class="process__title">Install & commission</h3><p class="process__copy">Phased installation with balancing, testing and performance verification recorded.</p></div></li>
                <li class="process__item"><span class="process__num">04</span><div><h3 class="process__title">Handover & maintain</h3><p class="process__copy">O&M documentation, training and planned maintenance options at handover.</p></div></li>
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
            <a class="card card--dark reveal" href="/uk/industries/">
                <h3 class="card__title">UK industries</h3>
                <p class="card__copy">Which UK sectors we engineer for, and what each demands from its systems.</p>
            </a>
            <a class="card card--dark reveal" data-delay="1" href="/uk/projects/">
                <h3 class="card__title">UK projects</h3>
                <p class="card__copy">Case studies by scope, challenge, engineering solution and outcome.</p>
            </a>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Scope your UK project.',
    'copy'    => 'Send the building type, location and timeline — the UK team will respond within one business day.',
]; ?>
<?php require __DIR__ . '/../../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
