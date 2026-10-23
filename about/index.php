<?php require __DIR__ . '/../includes/bootstrap.php';
$page = [
    'key'         => 'about',
    'title'       => 'About Rotash Power Projects | Our Story and Vision',
    'description' => 'Learn about Rotash Power Projects, our engineering story, mission, vision and operating markets in Zimbabwe, South Africa and the United Kingdom.',
    'image'       => '/assets/img/site-works.jpg',
];
require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
$ph = [
    'eyebrow' => 'About Rotash',
    'title'   => 'Engineering cooling systems that keep people and operations moving.',
    'lede'    => 'Rotash Power Projects is a refrigeration and air conditioning engineering company built around practical work, clear responsibility and solutions that fit the facility.',
    'image'   => '/assets/img/site-works.jpg',
    'alt'     => 'Engineers working on a commercial building site',
    'meta'    => [
        'Founded' => '2016',
        'Markets' => 'Zimbabwe · South Africa · United Kingdom',
    ],
];
require __DIR__ . '/../includes/sections/page-hero.php';
?>

<section class="section section--white about-story">
    <div class="container editorial__grid">
        <div class="editorial__copy">
            <p class="eyebrow">Our story</p>
            <h2 class="display-lg">A hands-on company with a clear standard.</h2>
            <p>Rotash grew from practical refrigeration and air conditioning work in live facilities. Surveying, installing, commissioning and maintaining systems remains the foundation of how the company operates.</p>
            <p>Since 2016, the business has developed across Zimbabwe, South Africa and the United Kingdom. Every project starts with understanding the building, the equipment and the people who rely on it.</p>
        </div>
        <figure class="editorial__image"><img src="/assets/img/hero-technician.jpg" alt="Technician servicing commercial cooling equipment" loading="lazy"></figure>
    </div>
</section>

<section class="section about-pillars">
    <div class="container">
        <div class="section-head section-head--center">
            <p class="eyebrow">What guides us</p>
            <h2 class="display-lg">Mission and vision</h2>
        </div>
        <div class="about-pillars__grid">
            <article class="about-pillar"><span class="about-pillar__number">01</span><h3>Our mission</h3><p>To deliver dependable refrigeration and air conditioning solutions that are practical to operate, maintain and trust.</p></article>
            <article class="about-pillar"><span class="about-pillar__number">02</span><h3>Our vision</h3><p>To be a respected cooling engineering partner across our markets, known for useful work, honest communication and lasting performance.</p></article>
        </div>
    </div>
</section>

<?php
$offices = ['zimbabwe', 'south-africa', 'uk'];
$office_head = [
    'eyebrow' => 'Where we are',
    'title'   => 'Our operating markets',
    'copy'    => 'Choose a market to see its services, contact route and current availability.',
];
require __DIR__ . '/../includes/sections/offices.php';
?>

<?php
$cta = [
    'title'   => 'Let us discuss your cooling requirement.',
    'copy'    => 'Tell us about the facility, the system and what needs to keep running.',
];
require __DIR__ . '/../includes/sections/cta.php';
require __DIR__ . '/../includes/footer.php';
