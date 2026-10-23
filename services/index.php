<?php require __DIR__ . '/../includes/bootstrap.php';

global $FAQ;

$faqLd = [
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(fn($f) => [
        '@type'          => 'Question',
        'name'           => $f['q'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
    ], $FAQ),
];

$page = [
    'key'         => 'services',
    'title'       => 'Refrigeration, Air Conditioning and Cold Chain Services | Rotash',
    'description' => 'Commercial refrigeration, air conditioning, ventilation and specialist medical refrigeration. Designed, installed, commissioned and maintained.',
    'image'       => '/assets/img/og-default.jpg',
    'jsonld'      => [$faqLd],
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'Services',
    'title'   => 'Refrigeration, air conditioning and medical cold chain',
    'lede'    => 'Three disciplines, each with a defined capability, delivered by one team under one method. Select a discipline to see what it covers.',
    'image'   => '/assets/img/hero-cold-rooms.jpg',
    'alt'     => 'Cold room doors in a refrigerated storage facility lit in blue',
    'meta'    => [
        'Disciplines'  => 'Refrigeration · Air conditioning · Medical cold chain',
        'Delivery'     => 'Survey · Specification · Installation · Commissioning · Maintenance',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<!-- In-page contents -->
<nav class="contents" aria-label="Services on this page">
    <div class="container contents__inner">
        <p class="contents__label">On this page</p>
        <ul class="contents__list">
<?php foreach (services_for_market(current_market_code()) as $id => $s): ?>
            <li><a href="#<?= e($id) ?>"><?= e($s['nav']) ?><?php if ($s['kind'] === 'specialist'): ?><span class="contents__tag">Specialist</span><?php endif; ?></a></li>
<?php endforeach; ?>
            <li><a href="#method">How we work</a></li>
            <li><a href="#faq">Questions</a></li>
        </ul>
    </div>
</nav>

<?php
$discipline_head = [
    'eyebrow' => 'Capabilities',
    'title'   => 'What each discipline covers',
    'copy'    => 'Refrigeration and air conditioning are the core of the business. Medical refrigeration is run as a specialist service, with the control regime and the documentation that clinical cold chain requires.',
];
require __DIR__ . '/../includes/sections/disciplines.php';
?>

<!-- Method -->
<?php
$method = [
    'eyebrow' => 'Delivery',
    'title'   => 'One lifecycle, whichever discipline you engage',
    'copy'    => 'Maintenance without installation knowledge fixes symptoms. Installation without design knowledge guesses. Running the whole lifecycle means every stage informs the next, and the handover is documented.',
    'cta'     => ['label' => 'See it applied', 'href' => mp('projects/')],
];
require __DIR__ . '/../includes/sections/method.php';
?>

<!-- FAQ -->
<section class="section section--white" id="faq">
    <div class="container container--content">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow">Questions</p>
            <h2 class="display-lg">Straight answers</h2>
        </div>
        <div class="faq">
<?php foreach ($FAQ as $i => $f): ?>
            <details class="faq__item reveal" data-delay="<?= $i % 3 ?>"<?= $i === 0 ? ' open' : '' ?>>
                <summary class="faq__q"><?= e($f['q']) ?><span class="faq__mark" aria-hidden="true"></span></summary>
                <div class="faq__a"><p><?= e($f['a']) ?></p></div>
            </details>
<?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Let’s discuss the requirement.',
    'copy'    => 'The facility, the temperature or the comfort duty, and the constraint you are working inside. That is enough for us to be useful.',
];
require __DIR__ . '/../includes/sections/cta.php';
?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
