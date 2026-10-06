<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'projects',
    'title'       => 'Engineering Projects & Case Studies | Rotash Power Projects',
    'description' => 'Selected HVAC, refrigeration and mechanical engineering projects — documented by location, sector, scope, challenge, engineering solution and outcome.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Projects</p>
            <h1 class="heading-1">Engineering case studies</h1>
            <p class="lede lede--on-dark">Each project documented the way engineering should be: the scope, the constraint we faced, the solution we engineered and what it delivered.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Selected work</p>
            <h2 class="display-lg">Projects by market, sector and service</h2>
            <!-- TODO: replace placeholder records in data/projects.php with confirmed,
                 client-approved case studies (real client names, locations, outcomes). -->
        </div>

        <div class="filters reveal" data-filters>
            <div class="filter-group">
                <span class="filter-group__label">Country</span>
                <div class="chips">
                    <button type="button" class="chip is-active" data-filter="country" data-value="all">All</button>
<?php foreach (['uk', 'south-africa'] as $code): ?>
                    <button type="button" class="chip" data-filter="country" data-value="<?= e($code) ?>"><?= e($MARKETS[$code]['name']) ?></button>
<?php endforeach; ?>
                </div>
            </div>
            <div class="filter-group">
                <span class="filter-group__label">Industry</span>
                <div class="chips">
                    <button type="button" class="chip is-active" data-filter="sector" data-value="all">All</button>
<?php
$usedSectors = array_values(array_unique(array_column($PROJECTS, 'sector')));
foreach ($usedSectors as $sid): ?>
                    <button type="button" class="chip" data-filter="sector" data-value="<?= e($sid) ?>"><?= e($INDUSTRIES[$sid]['name']) ?></button>
<?php endforeach; ?>
                </div>
            </div>
            <div class="filter-group">
                <span class="filter-group__label">Service</span>
                <div class="chips">
                    <button type="button" class="chip is-active" data-filter="service" data-value="all">All</button>
<?php
$usedServices = [];
foreach ($PROJECTS as $p) foreach ($p['services'] as $s) $usedServices[$s] = true;
foreach (array_keys($usedServices) as $sid): ?>
                    <button type="button" class="chip" data-filter="service" data-value="<?= e($sid) ?>"><?= e($SERVICES[$sid]['name']) ?></button>
<?php endforeach; ?>
                </div>
            </div>
        </div>

        <p class="filter-empty" data-filter-empty hidden>No projects match that combination yet — try another filter.</p>

        <div data-project-list>
<?php foreach ($PROJECTS as $i => $p): ?>
            <?php $sectorName = $INDUSTRIES[$p['sector']]['name'] ?? $p['sector']; ?>
            <article class="case reveal<?= $i % 2 ? ' case--flip' : '' ?>"
                     data-project
                     data-country="<?= e($p['market']) ?>"
                     data-sector="<?= e($p['sector']) ?>"
                     data-services="<?= e(implode(' ', $p['services'])) ?>">
                <div class="case__media"><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy"></div>
                <div class="case__body">
                    <p class="case__sector"><?= e($sectorName) ?> · <?= e(strtoupper($MARKETS[$p['market']]['name'])) ?><?= $p['placeholder'] ? ' · DRAFT' : '' ?></p>
                    <h3 class="case__title"><?= e($p['title']) ?></h3>
                    <dl class="spec">
                        <div class="spec__row"><dt class="spec__key">Project</dt><dd class="spec__val"><?= e($p['title']) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Location</dt><dd class="spec__val"><?= e($p['location']) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Client</dt><dd class="spec__val"><?= e($p['client']) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Sector</dt><dd class="spec__val"><?= e($sectorName) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Services</dt><dd class="spec__val"><?= e(implode(' · ', array_map(fn($s) => $SERVICES[$s]['name'] ?? $s, $p['services']))) ?></dd></div>
                    </dl>
                    <div class="stack-3">
                        <div><p class="spec__key" style="margin-bottom: 4px;">Challenge</p><p class="card__copy"><?= e($p['challenge']) ?></p></div>
                        <div><p class="spec__key" style="margin-bottom: 4px;">Engineering solution</p><p class="card__copy"><?= e($p['solution']) ?></p></div>
                        <div><p class="spec__key" style="margin-bottom: 4px;">Execution</p><p class="card__copy"><?= e($p['execution']) ?></p></div>
                    </div>
                    <p class="case__result"><strong>Outcome —</strong> <?= e($p['outcome']) ?></p>
                </div>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => "Your project, documented the same way.",
    'copy'    => 'Scope, constraint, solution, outcome — we start by understanding all four.',
]; ?>
<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
