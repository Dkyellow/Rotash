<?php
/**
 * Market projects page, shared by every country site.
 * Expects: $mc, $MK, $MC.
 */
$mc = $mc ?? current_market_code();
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$ph = [
    'eyebrow' => 'Projects · ' . $MK['name'],
    'title'   => 'Case studies from ' . $MK['name'],
    'lede'    => 'Each record sets out the scope, the constraint, the engineering solution, how it was executed and what it delivered. Records are published once the client has confirmed them.',
    'image'   => $MC['hero']['image'],
    'alt'     => $MC['hero']['alt'],
];
require __DIR__ . '/../sections/page-hero.php';
?>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Selected work</p>
            <h2 class="display-lg"><?= e($MK['name']) ?> case studies</h2>
            <p>Filter by sector or discipline.</p>
        </div>
<?php
$cases = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === $mc));
$show_filters = true;
$filter_groups = ['sector', 'service'];
$empty_copy = [
    'title' => 'Case studies for this market are being verified',
    'copy'  => 'We publish project records once the client has confirmed the detail. In the meantime, tell us about your project and the team here will scope it properly.',
];
require __DIR__ . '/../sections/cases.php';
?>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Your project, documented the same way.',
    'copy'    => 'Scope, constraint, solution and outcome. We start by establishing all four.',
    'primary' => ['label' => 'Request a consultation', 'href' => '/' . $mc . '/contact/'],
    'secondary' => ['label' => 'View services', 'href' => '/' . $mc . '/services/'],
];
require __DIR__ . '/../sections/cta.php';
?>
