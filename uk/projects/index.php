<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'projects',
    'title'       => 'UK Case Studies — Air Conditioning & Building Services | Rotash Power Projects',
    'description' => 'Case studies of air-conditioning and building-services work delivered in the United Kingdom — scope, challenge, engineering solution, execution and outcome. UK records are published only once confirmed.',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="/assets/img/uk-buildings.jpg" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Projects · United Kingdom</p>
            <h1 class="heading-1">UK engineering case studies</h1>
            <p class="lede lede--on-dark">Work delivered in the United Kingdom, documented by scope, constraint, solution and outcome.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Selected UK work</p>
            <h2 class="display-lg">Projects · United Kingdom</h2>
        </div>

<?php $ukProjectsBase = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === 'uk')); ?>
<?php if (empty($ukProjectsBase)): ?>
        <div class="card reveal">
            <h3 class="card__title">UK case studies are being confirmed</h3>
            <p class="card__copy">Delivered UK work will be published here once the records are verified with our clients. Tell us about the building and the requirement in the meantime — the UK team responds within one business day.</p>
            <div class="hero__actions mt-6">
                <a class="btn btn--primary" href="/uk/contact/">Talk to the UK team</a>
                <a class="btn btn--secondary" href="/projects/">See group case studies</a>
            </div>
        </div>
<?php else: ?>
        <div class="filters reveal" data-filters>
            <div class="filter-group">
                <span class="filter-group__label">Industry</span>
                <div class="chips">
                    <button type="button" class="chip is-active" data-filter="sector" data-value="all">All</button>
<?php
$ukProjectsBase = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === 'uk'));
$ukSectors = array_values(array_unique(array_column($ukProjectsBase, 'sector')));
foreach ($ukSectors as $sid): ?>
                    <button type="button" class="chip" data-filter="sector" data-value="<?= e($sid) ?>"><?= e($INDUSTRIES[$sid]['name']) ?></button>
<?php endforeach; ?>
                </div>
            </div>
            <div class="filter-group">
                <span class="filter-group__label">Service</span>
                <div class="chips">
                    <button type="button" class="chip is-active" data-filter="service" data-value="all">All</button>
<?php
$ukSvc = [];
foreach ($ukProjectsBase as $p) foreach ($p['services'] as $s) $ukSvc[$s] = true;
foreach (array_keys($ukSvc) as $sid): ?>
                    <button type="button" class="chip" data-filter="service" data-value="<?= e($sid) ?>"><?= e($SERVICES[$sid]['name']) ?></button>
<?php endforeach; ?>
                </div>
            </div>
        </div>

        <p class="filter-empty" data-filter-empty hidden>No projects match that combination yet — try another filter.</p>

        <div data-project-list>
<?php foreach ($ukProjectsBase as $i => $p): ?>
            <article class="case reveal<?= $i % 2 ? ' case--flip' : '' ?>"
                     data-project data-country="<?= e($p['market']) ?>"
                     data-sector="<?= e($p['sector']) ?>" data-services="<?= e(implode(' ', $p['services'])) ?>">
                <div class="case__media"><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy"></div>
                <div class="case__body">
                    <p class="case__sector"><?= e($INDUSTRIES[$p['sector']]['name']) ?> · UNITED KINGDOM</p>
                    <h3 class="case__title"><?= e($p['title']) ?></h3>
                    <dl class="spec">
                        <div class="spec__row"><dt class="spec__key">Location</dt><dd class="spec__val"><?= e($p['location']) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Client</dt><dd class="spec__val"><?= e($p['client']) ?></dd></div>
                        <div class="spec__row"><dt class="spec__key">Scope</dt><dd class="spec__val"><?= e($p['scope']) ?></dd></div>
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
<?php endif; ?>
    </div>
</section>

<?php $cta = [
    'title'   => 'Your UK air-conditioning project, engineered the same way.',
    'copy'    => 'Share the building and the brief — the UK team will respond within one business day.',
]; ?>
<?php require __DIR__ . '/../../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
