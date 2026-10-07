<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'home',
    'title'       => 'HVAC & Engineering Services in the UK | Rotash Power Projects',
    'description' => 'HVAC design, installation, commissioning and maintenance for commercial and industrial buildings across the United Kingdom. The UK operation of Rotash Power Projects.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero__media">
        <img src="/assets/img/uk-buildings.jpg" alt="" fetchpriority="high">
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
            <p class="eyebrow eyebrow--on-dark">Rotash Power Projects · United Kingdom</p>
            <h1 class="display-hero">HVAC & engineering<br>for UK buildings.</h1>
            <p class="lede lede--on-dark">Design, installation, commissioning and maintenance of climate and mechanical systems for commercial and industrial clients across the United Kingdom — delivered by the UK team, to one group engineering standard.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="/uk/contact/">Request a Consultation</a>
                <a class="btn btn--on-dark btn--lg" href="/uk/services/">UK services</a>
            </div>
        </div>
    </div>
    <div class="hero__strip">
        <div class="container hero__strip-inner">
            <span class="hero__strip-label">This site</span>
            <div class="hero__strip-markets">
                <span><i class="dot"></i>United Kingdom · en-GB</span>
                <span><i class="dot"></i>Part of <?= e(PARENT_GROUP) ?></span>
            </div>
        </div>
    </div>
</section>

<!-- UK INTRODUCTION -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">The UK operation</p>
                <h2 class="display-lg">Building services engineering, delivered locally</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p>The United Kingdom operation of Rotash Power Projects handles HVAC and mechanical building services for British clients — from surveys and system design through installation, commissioning and planned maintenance.</p>
                <p>UK projects run through the same process as every Rotash market: establish the duty, engineer to it, install to the drawing and prove performance at handover. Local delivery, group standard.</p>
                <p>Whether the building is an occupied office, a retail environment or an industrial facility, the work is scoped around how the space is actually used — and what it costs to run.</p>
            </div>
        </div>
        <div class="stat-strip mt-10 reveal" style="border-top-color: var(--gray-light);">
            <!-- Facts limited to what is verifiable today. TODO(UK): add verified
                 UK metrics (projects delivered, years trading, accreditations)
                 once documented. -->
            <div class="stat" style="border-right-color: var(--gray-light);"><p class="stat__value" style="color: var(--navy);">UK</p><p class="stat__label" style="color: var(--gray-medium);">Dedicated market operation</p></div>
            <div class="stat" style="border-right-color: var(--gray-light);"><p class="stat__value" style="color: var(--navy);">en-GB</p><p class="stat__label" style="color: var(--gray-medium);">Localised site & documentation</p></div>
            <div class="stat" style="border-right-color: var(--gray-light);"><p class="stat__value" style="color: var(--navy);">Group</p><p class="stat__label" style="color: var(--gray-medium);">One engineering standard across markets</p></div>
            <div class="stat"><p class="stat__value" style="color: var(--navy);">1 day</p><p class="stat__label" style="color: var(--gray-medium);">Enquiry response target</p></div>
        </div>
    </div>
</section>

<!-- UK SERVICES -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Services · United Kingdom</p>
                <h2 class="display-lg">What we deliver in the UK</h2>
                <p>Full project lifecycle in one contract — no gaps between designer, installer and maintainer.</p>
            </div>
            <a class="btn btn--secondary" href="/uk/services/">All UK services</a>
        </div>
        <div class="grid grid--3">
<?php
$ukServices = ['hvac', 'air-conditioning', 'ventilation', 'heating-cooling', 'mechanical-services', 'maintenance'];
foreach ($ukServices as $i => $id): $s = $SERVICES[$id]; ?>
            <article class="card card--hover svc-card reveal" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <a class="btn-link" href="/uk/contact/">Discuss with the UK team <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- UK APPROACH -->
<section class="section section--navy">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">How we work in the UK</p>
                <h2 class="display-lg">Programme discipline on live buildings</h2>
                <div class="prose mt-6">
                    <p style="color: rgba(255,255,255,0.78);">Most UK work happens in buildings that stay operational during the works. Phasing, access, noise and continuity get planned before plant arrives — not negotiated on the day.</p>
                </div>
                <a class="btn btn--on-dark mt-8" href="/uk/projects/">UK case studies</a>
            </div>
            <ol class="process reveal" data-delay="1" style="border-top-color: rgba(255,255,255,0.16);">
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">01</span><div><h3 class="process__title">Survey & constraint mapping</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Existing plant, building fabric, access windows and occupancy patterns documented first.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">02</span><div><h3 class="process__title">Design & phasing plan</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">System specification alongside a works programme that keeps the building running.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">03</span><div><h3 class="process__title">Install & commission</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Staged installation with balancing, testing and verification recorded floor by floor.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">04</span><div><h3 class="process__title">Handover & maintain</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Documentation, operator training and planned maintenance to hold performance.</p></div></li>
            </ol>
        </div>
    </div>
</section>

<!-- UK INDUSTRIES -->
<section class="section section--white">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Industries · United Kingdom</p>
                <h2 class="display-lg">UK sectors we engineer for</h2>
            </div>
            <a class="btn btn--secondary" href="/uk/industries/">All UK industries</a>
        </div>
        <div class="industry-grid reveal">
<?php foreach ($INDUSTRIES as $ind): if (!in_array('uk', $ind['markets'], true)) continue; ?>
            <div class="industry-cell">
                <h3 class="industry-cell__name"><?= e($ind['name']) ?></h3>
                <p class="industry-cell__copy"><?= e($ind['short']) ?></p>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- UK PROJECTS -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Projects · United Kingdom</p>
                <h2 class="display-lg">UK engineering case studies</h2>
                <!-- TODO(UK projects): confirm and publish delivered UK work. -->
            </div>
            <a class="btn btn--secondary" href="/uk/projects/">All UK projects</a>
        </div>
<?php
$ukProjects = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === 'uk'));
foreach ($ukProjects as $i => $p): ?>
        <article class="case reveal">
            <div class="case__media"><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy"></div>
            <div class="case__body">
                <p class="case__sector"><?= e($INDUSTRIES[$p['sector']]['name']) ?> · UNITED KINGDOM<?= $p['placeholder'] ? ' · DRAFT' : '' ?></p>
                <h3 class="case__title"><?= e($p['title']) ?></h3>
                <dl class="spec">
                    <div class="spec__row"><dt class="spec__key">Location</dt><dd class="spec__val"><?= e($p['location']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Scope</dt><dd class="spec__val"><?= e($p['scope']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Services</dt><dd class="spec__val"><?= e(implode(' · ', array_map(fn($s) => $SERVICES[$s]['name'] ?? $s, $p['services']))) ?></dd></div>
                </dl>
                <p class="case__result"><strong>Outcome —</strong> <?= e($p['outcome']) ?></p>
            </div>
        </article>
<?php endforeach; ?>
    </div>
</section>

<!-- UK CONTACT -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Contact · United Kingdom</p>
                <h2 class="display-lg">Speak to the UK team</h2>
                <div class="prose mt-6">
                    <p>Tell us about the building and the requirement — you will get an engineer's response, not a sales script.</p>
                </div>
                <!-- TODO(UK): verified UK phone, address and hours replace group
                     details below once supplied. -->
                <div class="stack-3 mt-8">
                    <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $OFFICES['uk']['phone'])) ?>"><?= e($OFFICES['uk']['phone']) ?></a></p>
                    <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($OFFICES['uk']['email']) ?>"><?= e($OFFICES['uk']['email']) ?></a></p>
                    <p class="office__line"><strong>Hours</strong> <?= e($OFFICES['uk']['hours_label']) ?></p>
                </div>
                <a class="btn btn--primary mt-8" href="/uk/contact/">Request a Consultation</a>
            </div>
            <div class="card reveal" data-delay="1">
                <p class="eyebrow">Accreditations</p>
                <h3 class="card__title">Verified credentials, published here</h3>
                <!-- TODO(UK): insert verified UK accreditations/memberships
                     (e.g. Gas Safe registration, CHAS, SafeContractor, ISO)
                     once documentation is supplied. Nothing is claimed today. -->
                <p class="card__copy">UK accreditations, memberships and certification records will be published on this page as they are verified. No certification is claimed on this site until it is documented.</p>
            </div>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => "Let's discuss your UK project.",
    'copy'    => 'Building type, location, timeline — the UK team will take it from there.',
]; ?>
<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
