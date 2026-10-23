<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'projects',
    'title'       => 'Project Case Studies | Rotash Power Projects',
    'description' => 'Refrigeration, air conditioning and medical cold chain project records, documented by scope, constraint, solution, execution and outcome.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'Projects',
    'title'   => 'Project records, documented the way engineering should be',
    'lede'    => 'Every record below sets out the scope, the constraint we were working against, the solution we engineered, how it was executed and what it delivered.',
    'image'   => '/assets/img/hero-cold-rooms.jpg',
    'alt'     => 'Cold room doors in a refrigerated storage facility lit in blue',
    'meta'    => [
        'Published' => 'Confirmed with the client',
        'Coverage'  => 'Zimbabwe · South Africa · United Kingdom',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Selected work</p>
            <h2 class="display-lg">Case studies</h2>
            <p>Filter by country, sector or discipline. Records are published once the client has confirmed the details, and are shown as technical drawings rather than photography so nothing here can be mistaken for work we have not done.</p>
        </div>

<?php
$cases = $PROJECTS;
$show_filters = true;
require __DIR__ . '/../includes/sections/cases.php';
?>
    </div>
</section>

<!-- Publishing policy -->
<section class="section section--pale">
    <div class="container container--content">
        <div class="grid grid--split items-start">
            <div class="reveal">
                <p class="eyebrow">Our publishing rule</p>
                <h2 class="display-lg">Why some work is not shown yet</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p>Case studies are published with the client’s agreement. Where a project is complete but the client has not yet confirmed the record, or where a location, scope or outcome is still being verified, it stays off the site rather than being published approximately.</p>
                <p>That means the list is shorter than the work we have done. It also means that everything on it is accurate, which is the point.</p>
                <p>If you want the detail of a specific project, ask. Where the record is signed off, we will walk you through the scope, the constraint and the outcome in detail.</p>
            </div>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Your project, documented the same way.',
    'copy'    => 'Scope, constraint, solution and outcome. We start by establishing all four.',
];
require __DIR__ . '/../includes/sections/cta.php';
?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
