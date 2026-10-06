<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'key'         => '404',
    'title'       => 'Page Not Found | Rotash Power Projects',
    'description' => 'The page you requested could not be found. Return to Rotash Power Projects — international HVAC and engineering services.',
];
http_response_code(404);

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="/assets/img/commercial_refrigeration_hero.png" alt="" fetchpriority="high">
    </div>
    <div class="container page-hero__inner" style="padding-top: 60px;">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Error 404</p>
            <h1 class="heading-1">This page doesn't exist</h1>
            <p class="lede lede--on-dark">The link may be out of date. Use the navigation, jump back to the homepage, or switch to your market.</p>
            <div class="hero__actions" style="margin-top: 32px;">
                <a class="btn btn--primary" href="/">Back to homepage</a>
                <a class="btn btn--on-dark" href="/contact/">Contact us</a>
            </div>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="grid grid--3">
            <a class="card card--hover" href="/services/"><h2 class="card__title">Services</h2><p class="card__copy">HVAC, refrigeration, ventilation, maintenance and project delivery.</p></a>
            <a class="card card--hover" href="/projects/"><h2 class="card__title">Projects</h2><p class="card__copy">Engineering case studies by market, sector and service.</p></a>
            <a class="card card--hover" href="/locations/"><h2 class="card__title">Locations</h2><p class="card__copy">Offices and contact details for every market.</p></a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
