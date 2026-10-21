<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'about',
    'title'       => 'About Rotash Power Projects | Our Engineering Approach',
    'description' => 'The engineering story behind Rotash Power Projects: three countries, three disciplines, and how the company works with clients and main contractors.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'About us',
    'title'   => 'A cooling company built on the work, not on the marketing',
    'lede'    => 'Rotash Power Projects is the refrigeration, air conditioning and medical cold chain business of the ' . PARENT_GROUP . '. We started by installing, commissioning and maintaining plant in live facilities — and that is still how we are measured.',
    'image'   => '/assets/img/site-works.jpg',
    'alt'     => 'Engineers on a building site during coordinated construction works',
    'meta'    => [
        'Parent group' => PARENT_GROUP,
        'Markets'      => 'Zimbabwe · South Africa · United Kingdom',
        'Disciplines'  => 'Refrigeration · Air conditioning · Medical cold chain',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<!-- Story -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--split">
            <div class="reveal">
                <p class="eyebrow">Our story</p>
                <h2 class="display-lg">From a hands-on engineering operation to three countries</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p>The business grew out of hands-on work: surveying installations, installing plant, commissioning it, and then spending years servicing what had been built. That practical foundation still decides how the company operates — drawings before decisions, verification before claims.</p>
                <p>Today the work runs from three countries. The South African operation, established around three offices in the Eastern Cape — Queenstown, East London and Mthatha — carries commercial refrigeration, air conditioning and medical cold chain. The Zimbabwe operation works from Harare, and the United Kingdom operation delivers air conditioning and building services to British clients.</p>
                <p>All three are part of <?= e(PARENT_GROUP) ?>, the parent organisation coordinating the group, and all three are run to one engineering standard: the same survey, the same specification discipline, the same commissioning records and the same maintenance expectation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Principles -->
<section class="section section--ink">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--on-dark">Engineering principles</p>
            <h2 class="display-lg">Four rules we do not bend</h2>
            <p class="section-head__on-dark">These are not values on a wall. They are the criteria the work is checked against before it is handed over.</p>
        </div>
        <div class="principle-grid">
<?php
$principles = [
    ['Survey before specifying', 'Real loads, real usage patterns and real constraints are established on site. Nothing is selected from a catalogue before the duty is known.'],
    ['Specify to the duty', 'Plant is sized for the building, the climate and the operating budget — including the ambient conditions the system will actually work in.'],
    ['Prove performance', 'Balancing, leak testing, temperature verification and commissioning records are produced before a job is called complete.'],
    ['Design for maintenance', 'Access, spares, controls and service routes are designed in, so the operator can keep the system running for years.'],
];
foreach ($principles as $i => $p): ?>
            <article class="principle reveal" data-delay="<?= $i % 4 ?>">
                <p class="principle__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="principle__title"><?= e($p[0]) ?></h3>
                <p class="principle__copy"><?= e($p[1]) ?></p>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Engagement models -->
<?php
$engagement = [
    'eyebrow' => 'Client and subcontracting relationships',
    'title'   => 'Who we work for, and how we are appointed',
    'copy'    => 'Rotash Power Projects works directly for owners and operators, and as a subcontractor to main contractors and equipment manufacturers. Both arrangements are described below, so there is no ambiguity about what we have agreed to deliver.',
];
require __DIR__ . '/../includes/sections/engagement.php';
?>

<!-- Group structure -->
<section class="section section--pale">
    <div class="container container--content">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow">Corporate structure</p>
            <h2 class="display-lg">One group, one operating company, three markets</h2>
        </div>
        <div class="hierarchy reveal">
            <div class="hierarchy__node hierarchy__node--root">
                <p class="hierarchy__label">Parent group</p>
                <p class="hierarchy__name"><?= e(PARENT_GROUP) ?></p>
            </div>
            <div class="hierarchy__link" aria-hidden="true">
                <svg width="16" height="28" viewBox="0 0 16 28"><path d="M8 0v22M2 16l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
            </div>
            <div class="hierarchy__node hierarchy__node--mid">
                <p class="hierarchy__label">Operating company</p>
                <p class="hierarchy__name">Rotash Power Projects</p>
            </div>
            <div class="hierarchy__link" aria-hidden="true">
                <svg width="16" height="28" viewBox="0 0 16 28"><path d="M8 0v22M2 16l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
            </div>
            <div class="hierarchy__markets">
<?php foreach (['zimbabwe', 'south-africa', 'uk'] as $mc):
    $mk = market($mc);
?>
                <a class="hierarchy__market" href="<?= e($mk['prefix']) ?>">
                    <span class="hierarchy__market-name"><?= e($mk['name']) ?></span>
                    <span class="hierarchy__market-note"><?= e($mk['region']) ?></span>
                </a>
<?php endforeach; ?>
            </div>
        </div>
        <p class="hierarchy__note">Accreditations, registrations and certification records are published on the group’s own documentation and are added to this site as each is verified. No certification is claimed here until it is documented.</p>
    </div>
</section>

<!-- Offices -->
<?php
$offices = ['zimbabwe', 'south-africa', 'uk'];
$office_head = [
    'eyebrow' => 'Where we are',
    'title'   => 'Three countries, three local teams',
    'copy'    => 'Each market carries its own contact routes, so you deal with the team that will carry out the work.',
];
require __DIR__ . '/../includes/sections/offices.php';
?>

<?php
$cta = [
    'title'   => 'Tell us what has to keep running.',
    'copy'    => 'The facility, the duty, the constraint and the timeline — the team for your market will take it from there.',
];
require __DIR__ . '/../includes/sections/cta.php';
?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
