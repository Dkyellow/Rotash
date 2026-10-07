<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'home',
    'title'       => 'HVAC & Engineering Services in South Africa | Rotash Power Projects',
    'description' => 'HVAC, commercial refrigeration and mechanical engineering across South Africa — design, installation, commissioning and maintenance from Eastern Cape operations in Queenstown, East London and Mthatha.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
$za = $OFFICES['south-africa'];
?>

<!-- HERO -->
<section class="hero">
    <div class="hero__media">
        <img src="/assets/img/retail-interior.jpg" alt="" fetchpriority="high">
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
            <p class="eyebrow eyebrow--on-dark">Rotash Power Projects · South Africa</p>
            <h1 class="display-hero">HVAC & refrigeration<br>engineering across South Africa.</h1>
            <p class="lede lede--on-dark">Climate control, commercial refrigeration and mechanical services for retail, hospitality and industrial operations — delivered from the Eastern Cape, held to one group engineering standard.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="/south-africa/contact/">Request a Consultation</a>
                <a class="btn btn--on-dark btn--lg" href="/south-africa/services/">South Africa services</a>
            </div>
        </div>
    </div>
    <div class="hero__strip">
        <div class="container hero__strip-inner">
            <span class="hero__strip-label">Operations</span>
            <div class="hero__strip-markets">
                <span><i class="dot"></i>Queenstown (Komani)</span>
                <span><i class="dot"></i>East London</span>
                <span><i class="dot"></i>Mthatha</span>
            </div>
        </div>
    </div>
</section>

<!-- ZA INTRODUCTION -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">The South Africa operation</p>
                <h2 class="display-lg">Engineering built on cold-chain reality</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p>The South African operation runs from the Eastern Cape, with teams based in Queenstown (Komani), East London and Mthatha. The work started in commercial refrigeration — cold rooms, display cases and the systems that keep stock sellable — and has grown into full climate and mechanical services.</p>
                <p>That background shapes how we approach everything: temperature stability, plant reliability and maintenance access are not features, they are the job.</p>
                <p>Retail floors, hotel kitchens, warehouses and offices all get the same process — survey first, engineer to the duty, install to the drawing, prove it before handover.</p>
            </div>
        </div>
    </div>
</section>

<!-- ZA SERVICES -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Services · South Africa</p>
                <h2 class="display-lg">What we deliver locally</h2>
                <p>From walk-in cold rooms to full building climate systems.</p>
            </div>
            <a class="btn btn--secondary" href="/south-africa/services/">All SA services</a>
        </div>
        <div class="grid grid--3">
<?php
$zaServices = ['commercial-refrigeration', 'air-conditioning', 'hvac', 'ventilation', 'maintenance', 'mechanical-services'];
foreach ($zaServices as $i => $id): $s = $SERVICES[$id]; ?>
            <article class="card card--hover svc-card reveal" data-delay="<?= $i % 3 ?>">
                <p class="card__index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="card__title"><?= e($s['name']) ?></h3>
                <p class="card__copy"><?= e($s['short']) ?></p>
                <a class="btn-link" href="/south-africa/contact/">Discuss with the SA team <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ZA APPROACH -->
<section class="section section--navy">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">How we work locally</p>
                <h2 class="display-lg">Keeping operations running while we work</h2>
                <div class="prose mt-6">
                    <p style="color: rgba(255,255,255,0.78);">Stores trade, kitchens cook and warehouses dispatch while we install. Works are sequenced around operations — staged cutovers, out-of-hours commissioning and redundant capacity where the job demands it.</p>
                </div>
                <a class="btn btn--on-dark mt-8" href="/south-africa/projects/">SA case studies</a>
            </div>
            <ol class="process reveal" data-delay="1" style="border-top-color: rgba(255,255,255,0.16);">
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">01</span><div><h3 class="process__title">Survey on site</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Loads, ambient conditions, existing plant and stock/occupancy constraints recorded first.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">02</span><div><h3 class="process__title">Engineer to the duty</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Plant sized for South African ambient conditions and real usage — not catalogue figures.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">03</span><div><h3 class="process__title">Install around operations</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Phased execution with cutovers planned so trading, cooking or dispatch continues.</p></div></li>
                <li class="process__item" style="border-bottom-color: rgba(255,255,255,0.16);"><span class="process__num" style="color: #fff;">04</span><div><h3 class="process__title">Verify & maintain</h3><p class="process__copy" style="color: rgba(255,255,255,0.75);">Temperature and performance verified at handover, then protected by planned maintenance.</p></div></li>
            </ol>
        </div>
    </div>
</section>

<!-- ZA INDUSTRIES -->
<section class="section section--white">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Industries · South Africa</p>
                <h2 class="display-lg">Sectors we engineer for locally</h2>
            </div>
            <a class="btn btn--secondary" href="/south-africa/industries/">All SA industries</a>
        </div>
        <div class="industry-grid reveal">
<?php foreach ($INDUSTRIES as $ind): if (!in_array('south-africa', $ind['markets'], true)) continue; ?>
            <div class="industry-cell">
                <h3 class="industry-cell__name"><?= e($ind['name']) ?></h3>
                <p class="industry-cell__copy"><?= e($ind['short']) ?></p>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ZA PROJECTS -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Projects · South Africa</p>
                <h2 class="display-lg">SA engineering case studies</h2>
            </div>
            <a class="btn btn--secondary" href="/south-africa/projects/">All SA projects</a>
        </div>
<?php
$zaProjects = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === 'south-africa'));
$flip = false;
foreach ($zaProjects as $p): ?>
        <article class="case reveal<?= $flip ? ' case--flip' : '' ?>">
            <div class="case__media"><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy"></div>
            <div class="case__body">
                <p class="case__sector"><?= e($INDUSTRIES[$p['sector']]['name']) ?> · SOUTH AFRICA<?= $p['placeholder'] ? ' · DRAFT' : '' ?></p>
                <h3 class="case__title"><?= e($p['title']) ?></h3>
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

<!-- ZA CONTACT -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Contact · South Africa</p>
                <h2 class="display-lg">Speak to the SA team</h2>
                <div class="prose mt-6">
                    <p>Direct lines to the Eastern Cape teams — phone, email and office addresses below.</p>
                </div>
                <div class="stack-3 mt-8">
                    <p class="office__line"><strong>Phone</strong> <a href="tel:<?= e(preg_replace('/\s+/', '', $za['phone'])) ?>"><?= e($za['phone']) ?></a></p>
                    <p class="office__line"><strong>Email</strong> <a href="mailto:<?= e($za['email']) ?>"><?= e($za['email']) ?></a></p>
                    <p class="office__line"><strong>Hours</strong> <?= e($za['hours_label']) ?></p>
                </div>
                <a class="btn btn--primary mt-8" href="/south-africa/contact/">Request a Consultation</a>
            </div>
            <div class="grid stack-3 reveal" data-delay="1">
<?php foreach ($za['locations'] as $loc): ?>
                <div class="office">
                    <h3 class="office__city"><?= e($loc['city']) ?></h3>
                    <p class="office__line"><strong>Address</strong> <?= e($loc['address']) ?></p>
                    <p class="office__map"><a class="btn-link" target="_blank" rel="noopener" href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($loc['address']) ?>">View on map <svg width="14" height="14" viewBox="0 0 14 14"><path d="M2 7h9M7.5 3.5 11 7l-3.5 3.5" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></a></p>
                </div>
<?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => "Let's discuss your South African project.",
    'copy'    => 'Store, plant or facility — tell us what has to keep running, and we will engineer around it.',
]; ?>
<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
