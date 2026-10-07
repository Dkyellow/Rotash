<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'insights',
    'title'       => 'Insights — HVAC & Engineering Perspectives | Rotash Power Projects',
    'description' => 'Technical articles and operating perspectives from Rotash Power Projects on HVAC specification, maintenance, commissioning and building performance.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="/assets/img/data-centre.jpg" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Insights</p>
            <h1 class="heading-1">Engineering perspectives</h1>
            <p class="lede lede--on-dark">Practical writing on specification, maintenance and delivery — from the people doing the work, across both markets.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Latest</p>
            <h2 class="display-lg">Articles & perspectives</h2>
            <!-- Individual article routes (/insights/<slug>/) get added to $ROUTES
                 in includes/config.php when written content is ready. -->
            <p>Written content in preparation — the structure below is live and ready for articles.</p>
        </div>
        <div class="grid grid--2">
<?php foreach ($INSIGHTS as $i => $a): ?>
            <article class="insight reveal" data-delay="<?= $i % 2 ?>">
                <p class="insight__meta">
                    <span><?= e($a['category']) ?></span>
                    <span><?= e($MARKETS[$a['market']]['name']) ?></span>
                    <span><?= date('d M Y', strtotime($a['date'])) ?></span>
                </p>
                <h3 class="insight__title"><?= e($a['title']) ?></h3>
                <p class="insight__excerpt"><?= e($a['excerpt']) ?></p>
                <p class="insight__foot text-muted body-sm"><?= e($a['read']) ?> · Article in preparation</p>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--pale">
    <div class="container container--content">
        <div class="grid grid--2 grid--loose items-center">
            <div class="reveal">
                <p class="eyebrow">Stay informed</p>
                <h2 class="display-lg">Engineering notes, occasionally</h2>
                <p class="mt-6" style="color: var(--navy-2);">No newsletters for the sake of it — when we publish something worth reading, it will be here first.</p>
            </div>
            <div class="reveal" data-delay="1" style="display: flex; gap: 16px; flex-wrap: wrap;">
                <a class="btn btn--primary" href="/contact/">Talk to an engineer</a>
                <a class="btn btn--secondary" href="/projects/">Browse case studies</a>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
