<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'key'         => '404',
    'title'       => 'Page not found | Rotash Power Projects',
    'description' => 'The page you requested could not be found. Navigate to our refrigeration, air conditioning and medical cold chain services, or contact the team directly.',
    'image'       => '/assets/img/og-default.jpg',
    'canonical'   => SITE_DOMAIN . '/',
    'breadcrumbs' => false,
];
http_response_code(404);

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<section class="section section--white error-page">
    <div class="container">
        <div class="error-page__inner">
            <p class="eyebrow">Error 404</p>
            <h1 class="display-lg">This page is not here</h1>
            <p class="lede">The link may be out of date, or the page may have moved as the site was restructured. Use the links below, or go straight to the team.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="<?= e(mp('')) ?>">Back to the homepage</a>
                <a class="btn btn--secondary btn--lg" href="<?= e(mp('services/')) ?>">Our services</a>
                <a class="btn btn--secondary btn--lg" href="<?= e(mp('contact/')) ?>">Contact us</a>
            </div>
        </div>
        <div class="grid grid--3 mt-10">
<?php
$links = [
    ['Services', mp('services/'), 'Refrigeration, air conditioning and medical cold chain — what each discipline covers.'],
    ['Sectors', mp('industries/'), 'The industries we engineer for, and what each one demands from its plant.'],
    ['Projects', mp('projects/'), 'Case studies documented by scope, constraint, solution, execution and outcome.'],
];
foreach ($links as $i => $l): ?>
            <a class="card card--hover reveal" data-delay="<?= $i ?>" href="<?= e($l[1]) ?>">
                <h2 class="card__title"><?= e($l[0]) ?></h2>
                <p class="card__copy"><?= e($l[2]) ?></p>
            </a>
<?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
