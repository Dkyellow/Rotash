<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'industries',
    'title'       => 'Sectors We Serve | Rotash Power Projects',
    'description' => 'Retail, healthcare, hospitality, industrial, commercial and education sectors, and what each one demands from its cooling system.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';

$ph = [
    'eyebrow' => 'Sectors',
    'title'   => 'Engineering that understands the sector',
    'lede'    => 'A retail floor, a pharmacy and a cold store make completely different demands on a cooling system. We design to what the sector actually needs from the plant, not to a generic load.',
    'image'   => '/assets/img/logistics-warehouse.jpg',
    'alt'     => 'Racked storage aisles inside a large distribution warehouse',
    'meta'    => [
        'Sectors' => '6 sectors served',
        'Markets' => 'Zimbabwe · South Africa · United Kingdom',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<?php
$sector_head = [
    'eyebrow' => 'Sectors',
    'title'   => 'Where the work is done',
    'copy'    => 'The six sectors below are the ones the business is regularly asked to engineer for. Each one lists what it genuinely demands, which is where the design decisions start.',
];
require __DIR__ . '/../includes/sections/sectors.php';
?>

<!-- What sector knowledge changes -->
<section class="section section--ink">
    <div class="container">
        <div class="grid grid--split">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">Why it matters</p>
                <h2 class="display-lg">Different duty. Different design.</h2>
            </div>
            <div class="prose prose--on-dark reveal" data-delay="1">
                <p><strong>Retail and food service</strong> run on product temperature and trading hours. The plant has to work around a shop floor that never closes, and the display cases have to sell as well as hold cold.</p>
                <p><strong>Healthcare and clinical</strong> run on a defined temperature band, a monitoring regime and a documentation trail. The control system matters as much as the cabinet, and the capacity has to carry a buffer when a delivery is late.</p>
                <p><strong>Hospitality</strong> runs kitchen refrigeration and guest comfort on the same clock, through the same building, at the same peak hour.</p>
                <p><strong>Industrial and logistics</strong> run on throughput. Capacity, redundancy and cutover planning decide whether stock and dispatch keep moving while the system is replaced.</p>
                <p><strong>Commercial buildings</strong> run on comfort and running cost, the two things an operator has to defend to the people who own the building.</p>
                <p><strong>Education and public sector</strong> run on ventilation performance and value over a long maintenance cycle, with equipment that has to be serviceable by whoever holds the contract.</p>
            </div>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Which sector is your building in?',
    'copy'    => 'Tell us the sector and the constraint you are working inside. We will engineer around both.',
];
require __DIR__ . '/../includes/sections/cta.php';
?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
