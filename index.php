<?php require __DIR__ . '/includes/bootstrap.php';

$page = [
    'key'         => 'home',
    'title'       => 'Refrigeration, Air Conditioning & Cold Chain | Rotash',
    'description' => 'Rotash Power Projects designs, installs and maintains refrigeration, air conditioning and medical cold chain systems in Zimbabwe, South Africa and the UK.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero = [
    'eyebrow' => 'Rotash Power Projects · ' . PARENT_GROUP,
    'title'   => 'Refrigeration, air conditioning<br>and medical cold chain.',
    'lede'    => 'A specialist cooling company operating from Zimbabwe, South Africa and the United Kingdom. Surveyed, designed, installed, commissioned and maintained — by the same engineers, to the same standard.',
    'image'   => '/assets/img/hero-technician.jpg',
    'alt'     => 'Engineer servicing a packaged air-conditioning unit on a rooftop plant deck',
    'actions' => [
        ['label' => 'Request a consultation', 'href' => mp('contact/'), 'style' => 'primary'],
        ['label' => 'See what we deliver',    'href' => mp('services/'), 'style' => 'on-dark'],
    ],
    'strip' => [
        'label' => 'Operating in',
        'items' => [
            ['label' => 'Zimbabwe',     'href' => '/zimbabwe/'],
            ['label' => 'South Africa', 'href' => '/south-africa/'],
            ['label' => 'United Kingdom', 'href' => '/uk/'],
        ],
    ],
];
require __DIR__ . '/includes/sections/hero.php';

require __DIR__ . '/includes/sections/facts.php';
?>

<!-- Disciplines -->
<?php
$discipline_head = [
    'eyebrow' => 'What we do',
    'title'   => 'Three disciplines, one accountable team',
    'copy'    => 'Refrigeration and air conditioning are the core of the business. Medical refrigeration is run as a specialist service in its own right, because the consequence of getting it wrong is not a failed specification — it is a lost batch of vaccine or a compromised clinical sample.',
];
require __DIR__ . '/includes/sections/disciplines.php';
?>

<!-- Method -->
<?php
$method = [
    'eyebrow' => 'How we work',
    'title'   => 'One method, from survey to handover',
    'copy'    => 'A cooling system is only as good as the process behind it. Every job — every discipline, every country — runs through the same four stages, and every stage is recorded.',
    'cta'     => ['label' => 'See the work', 'href' => mp('projects/')],
];
require __DIR__ . '/includes/sections/method.php';
?>

<!-- Temperature scale -->
<?php
$temperature = [
    'eyebrow' => 'The bands we work to',
    'title'   => 'Temperature is the specification',
    'copy'    => 'Refrigeration work is decided by a temperature band, a duty and a product. These are the ranges our disciplines are routinely specified, installed and serviced against.',
];
require __DIR__ . '/includes/sections/temperature.php';
?>

<!-- Engagement models -->
<?php
$engagement = [
    'eyebrow' => 'How we work with clients',
    'title'   => 'Appointed directly, or as a subcontractor',
    'copy'    => 'We hold direct contracts with owners and operators, and we are also appointed by main contractors and manufacturers to deliver a refrigeration or air-conditioning package inside a programme someone else has set. Both are ordinary parts of this business.',
];
require __DIR__ . '/includes/sections/engagement.php';
?>

<!-- Sectors -->
<?php
$sector_head = [
    'eyebrow' => 'Sectors',
    'title'   => 'Engineered to the sector, not to a template',
    'copy'    => 'A retail floor, a pharmacy and a cold store make completely different demands on a cooling system. We design to what the sector actually needs from the plant.',
];
require __DIR__ . '/includes/sections/sectors.php';
?>

<!-- Selected work -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Selected work</p>
                <h2 class="display-lg">Project records</h2>
                <p>Each project is documented the way engineering should be: the scope, the constraint, the solution, the execution and the outcome. We publish a record once the client has confirmed it.</p>
            </div>
            <a class="btn btn--secondary" href="<?= e(mp('projects/')) ?>">All case studies</a>
        </div>
<?php
$cases = array_slice($PROJECTS, 0, 1);
require __DIR__ . '/includes/sections/cases.php';
?>
    </div>
</section>

<!-- Offices -->
<?php
$offices = ['zimbabwe', 'south-africa', 'uk'];
$office_head = [
    'eyebrow' => 'Where we are',
    'title'   => 'Local teams in three countries',
    'copy'    => 'Offices, contact routes and the countries each team covers. You always deal with the team that will carry out the work.',
];
require __DIR__ . '/includes/sections/offices.php';
?>

<?php require __DIR__ . '/includes/sections/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
