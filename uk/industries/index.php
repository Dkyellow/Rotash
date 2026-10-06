<?php require __DIR__ . '/../../includes/bootstrap.php';

$page = [
    'key'         => 'industries',
    'title'       => 'UK Industries — Sectors We Serve | Rotash Power Projects UK',
    'description' => 'HVAC and building services engineering for UK commercial buildings, offices, retail, hospitality, healthcare, education, data centres and industrial facilities.',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1600&q=80" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">Industries · United Kingdom</p>
            <h1 class="heading-1">UK sectors, engineered to their duty</h1>
            <p class="lede lede--on-dark">From occupied offices to critical facilities — the sector sets the requirements, and the system is built around them.</p>
        </div>
    </div>
</section>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Sectors</p>
            <h2 class="display-lg">UK industries we serve</h2>
            <!-- TODO(UK): confirm which sectors the UK operation actively serves;
                 remove any that do not apply before launch. -->
            <p>Capability areas presented by the UK operation.</p>
        </div>
        <div class="industry-grid reveal">
<?php foreach ($INDUSTRIES as $ind): if (!in_array('uk', $ind['markets'], true)) continue; ?>
            <div class="industry-cell">
                <h3 class="industry-cell__name"><?= e($ind['name']) ?></h3>
                <p class="industry-cell__copy"><?= e($ind['short']) ?></p>
                <span class="industry-cell__arrow body-xs">United Kingdom</span>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2" style="gap: 60px; align-items: start;">
            <div class="reveal">
                <p class="eyebrow">UK context</p>
                <h2 class="display-lg">Built around occupancy and running cost</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p><strong>Occupied buildings</strong> are the UK norm — so phasing, noise and continuity drive the programme as much as the specification does.</p>
                <p><strong>Running cost</strong> sits behind most replacement decisions: efficiency gains have to be real and verifiable, not assumed.</p>
                <p><strong>Reliability</strong> is planned in through maintainable layouts, accessible plant and maintenance regimes the operator can sustain.</p>
            </div>
        </div>
        <div class="mt-10 reveal" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a class="btn btn--primary" href="/uk/contact/">Discuss your sector</a>
            <a class="btn btn--secondary" href="/uk/projects/">UK case studies</a>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Which sector is your building in?',
    'copy'    => 'Tell us the sector and the constraint — we will engineer around both.',
]; ?>
<?php require __DIR__ . '/../../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
