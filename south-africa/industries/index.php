<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'industries',
    'title'       => 'Industries We Serve in South Africa | Rotash Power Projects',
    'description' => 'HVAC, refrigeration and mechanical engineering for South African retail, hospitality, industrial, commercial, healthcare and manufacturing operations.',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Industries · South Africa</p>
            <h1 class="heading-1">Sectors that cannot afford downtime</h1>
            <p class="lede lede--on-dark">Retail, hospitality, industrial and commercial operations across the Eastern Cape and beyond — engineered for continuity.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Sectors</p>
            <h2 class="display-lg">Industries we serve in South Africa</h2>
            <!-- TODO(ZA): confirm which sectors the SA operation actively serves;
                 remove any that do not apply before launch. -->
            <p>Capability areas presented by the South African operation.</p>
        </div>
        <div class="industry-grid reveal">
<?php foreach ($INDUSTRIES as $ind): if (!in_array('south-africa', $ind['markets'], true)) continue; ?>
            <div class="industry-cell">
                <h3 class="industry-cell__name"><?= e($ind['name']) ?></h3>
                <p class="industry-cell__copy"><?= e($ind['short']) ?></p>
                <span class="industry-cell__arrow body-xs">South Africa</span>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2" style="gap: 60px; align-items: start;">
            <div class="reveal">
                <p class="eyebrow">Local context</p>
                <h2 class="display-lg">Designed for the conditions we actually have</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p><strong>Ambient extremes</strong> punish undersized plant. Equipment is selected for South African summer conditions, not temperate assumptions.</p>
                <p><strong>Supply continuity</strong> makes resilience and serviceability part of the design conversation from day one.</p>
                <p><strong>Stock protection</strong> in retail and food environments means temperature stability is verified, documented and maintained.</p>
            </div>
        </div>
        <div class="mt-10 reveal" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a class="btn btn--primary" href="/south-africa/contact/">Discuss your sector</a>
            <a class="btn btn--secondary" href="/south-africa/projects/">SA case studies</a>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Which sector do you operate in?',
    'copy'    => 'Tell us the operation and the constraint — we will engineer around both.',
]; ?>
<?php require __DIR__ . '/../../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
