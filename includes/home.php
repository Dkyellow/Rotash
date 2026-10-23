<?php
/* Shared landing-page composition for the group and each market home. */
$homeCode = $homeCode ?? current_market_code();
$isGlobal = $homeCode === 'global';
$homeMarket = $isGlobal ? null : ($MARKET_CONTENT[$homeCode] ?? null);
$homeHeroImage = $isGlobal ? '/assets/img/hero-technician.jpg' : ($homeMarket['hero']['image'] ?? '/assets/img/hero-technician.jpg');
$homeHeroAlt = $isGlobal ? 'Technician servicing commercial air-conditioning equipment' : ($homeMarket['hero']['alt'] ?? 'Rotash Power Projects engineering work');
$homeLede = $isGlobal ? 'Practical cooling solutions for commercial, industrial and residential environments.' : ($homeMarket['hero']['lede'] ?? 'Practical cooling solutions, with project scope confirmed for your market.');
$homeContact = $isGlobal ? '/contact/' : '/' . $homeCode . '/contact/';
$homeServices = $isGlobal ? '/services/' : '/' . $homeCode . '/services/';
$homeAbout = $isGlobal ? '/about/' : '/about/';
$homeHeroCopy = $isGlobal
    ? 'From commercial refrigeration and bottle coolers to medical refrigerator servicing, Rotash supports cooling requirements across a range of operating environments.'
    : ($homeMarket['focus']['copy'] ?? 'Cooling requirements are assessed by the group team and routed according to the confirmed project scope.');
$homeExperience = [
    'global' => [
        'title' => 'Trusted in live operating environments.',
        'copy' => ['Rotash is currently subcontracting on work for South African Breweries in the Eastern Cape involving cold rooms and bottle coolers.', 'Seattle Coffee Company has been identified as a client. Rotash also delivers work through SDS associated with Burger King, Hungry Lion, KFC, Debonairs Pizza and Distell refrigeration equipment.'],
    ],
    'south-africa' => [
        'title' => 'Cooling experience in the Eastern Cape.',
        'copy' => ['Rotash is currently subcontracting on work for South African Breweries in the Eastern Cape involving cold rooms and bottle coolers.', 'Medical refrigerator installation, servicing and repairs for clinics and hospitals across the Eastern Cape are a confirmed capability.'],
    ],
    'zimbabwe' => [
        'title' => 'A clear route for Zimbabwe enquiries.',
        'copy' => ['Harare is the local market reference for Zimbabwe enquiries. The group team confirms the facility, service requirement and practical scope before work is proposed.', 'This keeps the first conversation useful without implying a local office or universal availability that has not been confirmed.'],
    ],
    'uk' => [
        'title' => 'A measured approach for UK projects.',
        'copy' => ['UK enquiries are assessed against the confirmed service scope, project location and contact arrangement.', 'The public site does not claim a UK office or nationwide coverage. Availability is confirmed for each project before proposal.'],
    ],
];
$experience = $homeExperience[$homeCode] ?? $homeExperience['global'];

$serviceCards = [];
if ($isGlobal) {
    $serviceCards = [
        ['refrigeration', 'Commercial & Industrial Refrigeration', '/assets/img/discipline-refrigeration.jpg'],
        ['refrigeration', 'Cold Rooms & Bottle Coolers', '/assets/img/hero-cold-rooms.jpg'],
        ['air-conditioning', 'Air Conditioning', '/assets/img/discipline-air-conditioning.jpg'],
        ['medical-refrigeration', 'Medical Refrigeration', '/assets/img/discipline-medical.jpg'],
    ];
} else {
    foreach (services_for_market($homeCode) as $sid => $service) {
        $serviceCards[] = [$sid, $service['name'], $service['photo']];
    }
}
?>
<section class="home-hero">
  <div class="container home-hero__inner">
    <p class="eyebrow">Rotash Power Projects · Since 2016</p>
    <h1 class="display-hero">Refrigeration &amp; Air Conditioning<br><em>Engineered for Your Needs.</em></h1>
    <p class="home-hero__lede"><?= e($homeLede) ?></p>
    <div class="hero__actions"><a class="btn btn--primary" href="<?= e($homeServices) ?>">Explore services <span aria-hidden="true">↗</span></a><a class="btn btn--secondary" href="<?= e($homeContact) ?>">Discuss your requirements</a></div>
    <figure class="home-hero__visual"><?= img($homeHeroImage, $homeHeroAlt, '', true, '(max-width: 800px) 100vw, 1000px') ?></figure>
  </div>
</section>
<section class="feature-panel section--ink"><div class="container feature-panel__grid"><div class="feature-panel__logos"><span>Commercial</span><span>Industrial</span><span>Medical</span><span>Residential</span></div><figure class="feature-panel__image"><?= img($homeCode === 'uk' ? '/assets/img/commercial-buildings.jpg' : '/assets/img/hero-cold-rooms.jpg','Rotash cooling engineering environment','',false,'(max-width: 800px) 100vw, 42vw') ?></figure><div class="feature-panel__copy"><p class="eyebrow eyebrow--on-dark">Built around the operation</p><h2 class="display-lg">Cooling solutions built around real operational needs.</h2><p><?= e($homeHeroCopy) ?></p><a class="btn btn--primary" href="<?= e($homeAbout) ?>">How we work <span aria-hidden="true">↗</span></a></div></div></section>
<section class="section facts-home"><div class="container"><dl class="fact-strip">
<?php if ($isGlobal): ?><div class="fact"><dd class="fact__value">2016</dd><dt class="fact__label">Year founded</dt></div><div class="fact"><dd class="fact__value">3</dd><dt class="fact__label">Operating markets</dt><dd class="fact__note">Zimbabwe · South Africa · UK</dd></div><div class="fact"><dd class="fact__value">East Cape</dd><dt class="fact__label">Medical refrigeration</dt><dd class="fact__note">Installation, servicing and repairs for clinics and hospitals</dd></div>
<?php elseif ($homeCode === 'south-africa'): ?><div class="fact"><dd class="fact__value">East Cape</dd><dt class="fact__label">Confirmed region</dt><dd class="fact__note">Commercial and medical refrigeration experience</dd></div><div class="fact"><dd class="fact__value">Cold rooms</dd><dt class="fact__label">Core experience</dt><dd class="fact__note">Cold rooms and bottle coolers through subcontracting work</dd></div><div class="fact"><dd class="fact__value">Medical</dd><dt class="fact__label">Specialist support</dt><dd class="fact__note">Clinics and hospitals across the Eastern Cape</dd></div>
<?php elseif ($homeCode === 'zimbabwe'): ?><div class="fact"><dd class="fact__value">Harare</dd><dt class="fact__label">Local market reference</dt><dd class="fact__note">Zimbabwe enquiries are routed through the group team</dd></div><div class="fact"><dd class="fact__value">Cooling</dd><dt class="fact__label">Core enquiry</dt><dd class="fact__note">Refrigeration and air conditioning requirements</dd></div><div class="fact"><dd class="fact__value">2016</dd><dt class="fact__label">Founded</dt><dd class="fact__note">Rotash Power Projects</dd></div>
<?php else: ?><div class="fact"><dd class="fact__value">UK</dd><dt class="fact__label">Market</dt><dd class="fact__note">Air conditioning and building-services enquiries</dd></div><div class="fact"><dd class="fact__value">Scope-led</dd><dt class="fact__label">Availability</dt><dd class="fact__note">Service area and project scope confirmed per enquiry</dd></div><div class="fact"><dd class="fact__value">2016</dd><dt class="fact__label">Founded</dt><dd class="fact__note">Rotash Power Projects</dd></div><?php endif; ?>
    </dl></div></section>
<section class="section services-home"><div class="container"><div class="section-head section-head--center"><p class="eyebrow">What we do<?= $isGlobal ? '' : ' · ' . e(market($homeCode)['name']) ?></p><h2 class="display-lg">Refrigeration &amp; Air Conditioning Services</h2><p>One accountable team for systems that need to keep products, people and facilities at the right temperature.</p></div><div class="service-cards">
<?php foreach ($serviceCards as $card): ?><a class="service-card" href="<?= e($homeServices) ?>#<?= e($card[0]) ?>"><figure><?= img($card[2],$card[1],'',false,'(max-width: 700px) 100vw, 25vw') ?></figure><span><?= e($card[1]) ?></span><b aria-hidden="true">↗</b></a><?php endforeach; ?></div></div></section>
<section class="section editorial"><div class="container editorial__grid"><div class="editorial__copy"><p class="eyebrow">The Rotash approach</p><h2 class="display-lg">Practical cooling for demanding environments.</h2><p><?= e($homeCode === 'south-africa' ? 'Commercial, industrial and medical refrigeration work is scoped around the actual facility, its operating environment and the service requirement.' : 'We work from the real duty: the building, the product, the people using it and the constraints around it. That keeps the solution useful long after installation.') ?></p><ul class="check-list"><li>Commercial refrigeration and cold-room applications</li><li>Installation, servicing and repairs</li><li><?= $homeCode === 'south-africa' ? 'Medical refrigerator support in the Eastern Cape' : 'Service scope confirmed for the project and market' ?></li></ul><a class="btn-link" href="<?= e($homeServices) ?>">See all capabilities <span aria-hidden="true">→</span></a></div><figure class="editorial__image"><?= img($homeCode === 'zimbabwe' ? '/assets/img/hero-condenser.jpg' : '/assets/img/site-works.jpg','Rotash engineering work in an operating environment','',false,'(max-width: 800px) 100vw, 50vw') ?></figure></div></section>
<section class="section regions"><div class="container"><div class="section-head section-head--center"><p class="eyebrow">Where we operate</p><h2 class="display-lg">Our operating markets</h2><p>Regional pages keep the scope and contact route clear. Availability is confirmed with each enquiry.</p></div><div class="region-grid"><?php foreach ([['Zimbabwe','/zimbabwe/','Refrigeration and air conditioning'],['South Africa','/south-africa/','Eastern Cape commercial and medical refrigeration'],['United Kingdom','/uk/','Air conditioning and building services']] as $i => $r): ?><a class="region-card" href="<?= e($r[1]) ?>"><span class="region-card__number">0<?= $i + 1 ?></span><h3><?= e($r[0]) ?></h3><p><?= e($r[2]) ?></p><span class="arrow" aria-hidden="true">↗</span></a><?php endforeach; ?></div></div></section>
<section class="enquiry-banner"><div class="container enquiry-banner__inner"><div><p class="eyebrow eyebrow--on-dark">Start a conversation</p><h2 class="display-lg">Tell us about your cooling requirements.</h2><p>Share the facility, the duty and the constraint. We will route it to the right team.</p></div><a class="btn btn--primary" href="<?= e($homeContact) ?>">Make an enquiry <span aria-hidden="true">↗</span></a></div></section>
<section class="section experience"><div class="container editorial__grid editorial__grid--reverse"><div class="editorial__copy"><p class="eyebrow">Selected experience</p><h2 class="display-lg"><?= e($experience['title']) ?></h2><?php foreach ($experience['copy'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?><a class="btn-link" href="<?= e($homeContact) ?>">Discuss a requirement <span aria-hidden="true">→</span></a></div><figure class="editorial__image"><div class="experience-stack"><img src="<?= e($homeCode === 'south-africa' ? '/assets/img/hero-cold-rooms.jpg' : '/assets/img/logistics-warehouse.jpg') ?>" alt="Commercial cooling environment"><span>Experience<br><strong>without overclaiming.</strong></span></div></figure></div></section>
<section class="final-cta"><div class="container"><p class="eyebrow">Ready when you are</p><h2 class="display-lg">Let’s discuss your next cooling project.</h2><div><a class="btn btn--primary" href="<?= e($homeContact) ?>">Contact Rotash</a><a class="btn btn--secondary" href="<?= e($homeServices) ?>">Explore services</a></div></div></section>
