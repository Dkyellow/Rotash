<?php require __DIR__ . '/includes/bootstrap.php';

$page = [
    'key'         => 'home',
    'title'       => 'Refrigeration & Air Conditioning Services | Rotash Power Projects',
    'description' => 'Rotash Power Projects designs, installs and maintains refrigeration and air-conditioning systems for commercial and industrial clients — commercial refrigeration in South Africa, air conditioning across the UK and South Africa.',
];

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<!-- 01 — HERO -->
<section class="hero">
    <div class="hero__media">
        <img src="/assets/img/commercial_refrigeration_hero.png" alt="" fetchpriority="high">
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
            <p class="eyebrow eyebrow--on-dark">Refrigeration & Air Conditioning</p>
            <h1 class="display-hero">Refrigeration &amp; air conditioning.<br>Engineered to perform.</h1>
            <p class="lede lede--on-dark">Commercial refrigeration for South Africa. Air conditioning for buildings across the United Kingdom and South Africa. Designed, installed and maintained — backed by <?= e(PARENT_GROUP) ?>.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="/contact/">Request a Consultation</a>
                <a class="btn btn--on-dark btn--lg" href="/services/">Explore our capabilities</a>
            </div>
        </div>
    </div>
    <div class="hero__strip">
        <div class="container hero__strip-inner">
            <span class="hero__strip-label">Operating in</span>
            <div class="hero__strip-markets">
                <span><i class="dot"></i>United Kingdom</span>
                <span><i class="dot"></i>South Africa</span>
            </div>
        </div>
    </div>
</section>

<!-- 02 — CORE SERVICES -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Core services</p>
                <h2 class="display-lg">Refrigeration and air conditioning</h2>
                <p>Our two principal services — surveyed, designed, installed, commissioned and maintained by one accountable team.</p>
            </div>
            <a class="btn btn--secondary" href="/services/">All services</a>
        </div>
        <div class="grid grid--2">
<?php foreach (['commercial-refrigeration', 'air-conditioning'] as $i => $id): $s = $SERVICES[$id]; ?>
            <article class="card card--hover svc-card reveal" data-delay="<?= $i ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <p class="card__foot body-sm text-muted">Available in: <?= e(implode(', ', array_map(fn($c) => $MARKETS[$c]['name'], $s['markets']))) ?></p>
                <a class="btn-link" href="/services/#<?= e($s['id']) ?>">Explore <?= e(strtolower($s['name'])) ?> <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 03 — WHO WE ARE -->
<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Who we are</p>
            <h2 class="display-lg">The refrigeration and air-conditioning company of <?= e(PARENT_GROUP) ?></h2>
            <p>Rotash Power Projects designs, installs and maintains temperature-control systems for commercial and industrial clients — operating in the United Kingdom and South Africa's Eastern Cape under one technical standard.</p>
        </div>
        <div class="grid grid--2">
            <a class="market-card reveal" href="/uk/">
                <div class="market-card__media">
                    <img src="/assets/img/uk-buildings.jpg" alt="Modern commercial buildings in the United Kingdom" loading="lazy">
                </div>
                <div class="market-card__body">
                    <span class="market-card__flag">United Kingdom · en-GB</span>
                    <h3 class="display-md">Air conditioning for buildings across the United Kingdom</h3>
                    <p class="card__copy">Design, installation, commissioning and maintenance of air-conditioning and climate systems for commercial and industrial buildings across the United Kingdom.</p>
                    <div class="market-card__foot"><span class="btn-link">Visit the UK site <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></span></div>
                </div>
            </a>
            <a class="market-card reveal" data-delay="1" href="/south-africa/">
                <div class="market-card__media">
                    <img src="/assets/img/retail-interior.jpg" alt="Commercial retail environment with display refrigeration in South Africa" loading="lazy">
                </div>
                <div class="market-card__body">
                    <span class="market-card__flag">South Africa · en-ZA</span>
                    <h3 class="display-md">Refrigeration and air conditioning across South Africa</h3>
                    <p class="card__copy">Commercial refrigeration, air conditioning and climate control delivered from Eastern Cape operations in Queenstown, East London and Mthatha.</p>
                    <div class="market-card__foot"><span class="btn-link">Visit the South Africa site <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></span></div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- 04 — SERVICE CAPABILITIES -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Capabilities</p>
                <h2 class="display-lg">What that covers</h2>
                <p>Confirmed refrigeration and air-conditioning capability — from the cold room to the condenser.</p>
            </div>
            <a class="btn btn--secondary" href="/services/">All services</a>
        </div>
        <div class="grid grid--3">
<?php
$racCapabilities = [
    ['Walk-in cold rooms',      'Cold rooms for retail and food environments — specified, installed and commissioned to hold temperature.', 'South Africa', '/services/#commercial-refrigeration'],
    ['Display refrigeration',   'Reach-in and display cases that keep product temperature stable through trading hours.', 'South Africa', '/services/#commercial-refrigeration'],
    ['Cold-chain systems',      'Integrated back-of-house cooling that keeps the cold chain intact from store to dispatch.', 'South Africa', '/services/#commercial-refrigeration'],
    ['Split, multi-split & VRF','Room and floor-by-floor air-conditioning systems specified to the building and its duty.', 'United Kingdom · South Africa', '/services/#air-conditioning'],
    ['Packaged cooling',        'Packaged air-conditioning solutions for spaces and duties where they fit best.', 'United Kingdom · South Africa', '/services/#air-conditioning'],
    ['Installation & maintenance','Survey, installation, commissioning and planned maintenance across both disciplines as one lifecycle.', 'United Kingdom · South Africa', '/services/'],
];
foreach ($racCapabilities as $i => [$capTitle, $capCopy, $capMarkets, $capHref]):
?>
            <article class="card card--hover svc-card reveal" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($capTitle) ?></h3>
                <p class="card__copy"><?= e($capCopy) ?></p>
                <p class="card__foot body-sm text-muted"><?= e($capMarkets) ?></p>
                <a class="btn-link" href="<?= e($capHref) ?>">Discuss this capability <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 05 — ENGINEERED FOR PERFORMANCE -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Engineered for performance</p>
                <h2 class="display-lg">How we work</h2>
                <div class="prose mt-6">
                    <p>A cooling system is only as good as the process behind it. We treat every project as an engineering problem: understand the duty, specify to the duty, install to the drawing, and prove performance before handover.</p>
                    <p>That discipline is what turns plant into reliable performance — stable temperatures, predictable running costs and systems that can be maintained by the people who operate them.</p>
                </div>
                <a class="btn btn--secondary mt-8" href="/about/">Our engineering philosophy</a>
            </div>
            <ol class="process reveal" data-delay="1">
                <li class="process__item">
                    <span class="process__num">01</span>
                    <div><h3 class="process__title">Survey & brief</h3><p class="process__copy">We establish the real duty — loads, usage patterns, constraints and existing plant — before anything is specified.</p></div>
                </li>
                <li class="process__item">
                    <span class="process__num">02</span>
                    <div><h3 class="process__title">Design & specification</h3><p class="process__copy">System selection, distribution and controls are engineered to the building, the climate and the operating budget.</p></div>
                </li>
                <li class="process__item">
                    <span class="process__num">03</span>
                    <div><h3 class="process__title">Installation & commissioning</h3><p class="process__copy">Controlled execution against drawings, with balancing, testing and verification recorded at every stage.</p></div>
                </li>
                <li class="process__item">
                    <span class="process__num">04</span>
                    <div><h3 class="process__title">Handover & support</h3><p class="process__copy">Documentation, training and planned maintenance that keep the system performing long after practical completion.</p></div>
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- 06 — INDUSTRIES -->
<section class="section section--navy">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow eyebrow--on-dark">Industries</p>
                <h2 class="display-lg">Sectors we cool</h2>
                <p>Different sectors impose different demands on temperature, air and reliability. We design to the sector, not to a template.</p>
            </div>
            <a class="btn btn--on-dark" href="/industries/">All industries</a>
        </div>
        <div class="grid grid--4">
<?php
$homeIndustries = ['retail', 'hospitality', 'healthcare', 'industrial-facilities', 'commercial-buildings', 'offices', 'education', 'data-centres'];
foreach ($homeIndustries as $i => $id):
    $ind = $INDUSTRIES[$id];
?>
            <a class="card card--dark reveal minh-180" data-delay="<?= $i % 4 ?>" href="/industries/">
                <h3 class="card__title"><?= e($ind['name']) ?></h3>
                <p class="card__copy"><?= e($ind['short']) ?></p>
            </a>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 07 — FEATURED PROJECTS -->
<section class="section section--white">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Selected work</p>
                <h2 class="display-lg">Featured projects</h2>
                <p>Verified case studies — scope, challenge, solution and outcome.</p>
            </div>
            <a class="btn btn--secondary" href="/projects/">All projects</a>
        </div>
<?php
$featured = ['mainstream-supermarket-refrigeration'];
$projectsBySlug = array_column($PROJECTS, null, 'slug');
$flip = false;
foreach ($featured as $slug):
    if (!isset($projectsBySlug[$slug])) continue;
    $p = $projectsBySlug[$slug];
    $sectorName = $INDUSTRIES[$p['sector']]['name'] ?? $p['sector'];
?>
        <article class="case reveal<?= $flip ? ' case--flip' : '' ?>">
            <div class="case__media"><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy"></div>
            <div class="case__body">
                <p class="case__sector"><?= e($sectorName) ?> · <?= e(strtoupper($MARKETS[$p['market']]['name'])) ?></p>
                <h3 class="case__title"><?= e($p['title']) ?></h3>
                <p class="card__copy"><?= e($p['challenge']) ?></p>
                <dl class="spec">
                    <div class="spec__row"><dt class="spec__key">Location</dt><dd class="spec__val"><?= e($p['location']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Scope</dt><dd class="spec__val"><?= e($p['scope']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Services</dt><dd class="spec__val"><?= e(implode(' · ', array_map(fn($s) => $SERVICES[$s]['name'] ?? $s, $p['services']))) ?></dd></div>
                </dl>
                <p class="case__result"><strong>Outcome —</strong> <?= e($p['outcome']) ?></p>
            </div>
        </article>
<?php $flip = !$flip; endforeach; ?>
    </div>
</section>

<!-- 08 — WHY ROTASH -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Why Rotash</p>
            <h2 class="display-lg">Built on technical judgement, delivered with discipline</h2>
        </div>
        <div class="value-grid">
            <div class="value reveal"><p class="value__num">01</p><h3 class="value__title">Technical expertise</h3><p class="value__copy">Engineers who size, select and sequence systems — not salespeople reading datasheets.</p></div>
            <div class="value reveal" data-delay="1"><p class="value__num">02</p><h3 class="value__title">Quality</h3><p class="value__copy">Work installed to drawings, tested against the brief and documented at handover.</p></div>
            <div class="value reveal" data-delay="2"><p class="value__num">03</p><h3 class="value__title">Reliability</h3><p class="value__copy">Systems designed for maintainability, with planned maintenance to protect uptime.</p></div>
            <div class="value reveal" data-delay="3"><p class="value__num">04</p><h3 class="value__title">Professional execution</h3><p class="value__copy">Clear programmes, site discipline and single-point accountability from survey to sign-off.</p></div>
        </div>
    </div>
</section>

<!-- 09 — LOCATIONS -->
<section class="section section--white">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Locations</p>
                <h2 class="display-lg">Where to find us</h2>
                <p>Local presence in each market — with contact details specific to your region.</p>
            </div>
            <a class="btn btn--secondary" href="/locations/">All locations</a>
        </div>
        <div class="grid grid--2">
<?php foreach (['uk', 'south-africa'] as $code): $o = $OFFICES[$code]; ?>
            <div class="office reveal">
                <span class="market-card__flag"><?= e($MARKETS[$code]['name']) ?></span>
                <h3 class="office__city"><?= e($o['name']) ?></h3>
<?php foreach ($o['locations'] as $loc): ?>
                <p class="office__line"><strong>Office</strong> <?= e($loc['address']) ?></p>
<?php endforeach; ?>
                <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $o['phone'])) ?>"><?= e($o['phone']) ?></a></p>
                <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($o['email']) ?>"><?= e($o['email']) ?></a></p>
                <p class="office__map"><a class="btn-link" href="<?= e($MARKETS[$code]['prefix'] ?: '/') ?>contact/">Contact this office <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a></p>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 10 — FINAL CTA -->
<?php require __DIR__ . '/includes/cta-band.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
