<?php require __DIR__ . '/../includes/bootstrap.php';

$page = [
    'key'         => 'about',
    'title'       => 'About Rotash Power Projects — International HVAC & Engineering',
    'description' => 'The story, engineering philosophy and capabilities behind Rotash Power Projects — a Rotash Group company delivering HVAC and mechanical engineering in the United Kingdom and South Africa.',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero__media">
        <img src="/assets/img/engineer-industrial.jpg" alt="" fetchpriority="high">
    </div>
    <?php require __DIR__ . '/../includes/breadcrumbs.php'; ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
            <p class="eyebrow eyebrow--on-dark">About</p>
            <h1 class="heading-1">An engineering company, built to perform</h1>
            <p class="lede lede--on-dark">Rotash Power Projects is the HVAC and engineering business of <?= e(PARENT_GROUP) ?> — delivering climate and building-services engineering in the United Kingdom and South Africa under one technical standard.</p>
            <div class="page-hero__meta">
                <div class="page-hero__meta-item"><strong>Parent group</strong> <?= e(PARENT_GROUP) ?></div>
                <div class="page-hero__meta-item"><strong>Markets</strong> United Kingdom · South Africa</div>
                <div class="page-hero__meta-item"><strong>Discipline</strong> HVAC · Mechanical engineering · Climate control</div>
            </div>
        </div>
    </div>
</section>

<!-- Company story -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Our story</p>
                <h2 class="display-lg">From a regional engineering operation to an international platform</h2>
            </div>
            <div class="prose reveal" data-delay="1">
                <p>Rotash Power Projects grew out of hands-on engineering work — installing, commissioning and maintaining the systems that keep buildings and businesses running. That practical foundation still shapes how the company operates: drawings before decisions, testing before claims.</p>
                <p>Today the business delivers HVAC, refrigeration and mechanical services across two countries, with Eastern Cape operations in Queenstown, East London and Mthatha serving the South African market and a United Kingdom operation serving British clients.</p>
                <p>Both operate as one company with one standard of delivery — and both are part of <?= e(PARENT_GROUP) ?>, the parent organisation coordinating the group's international growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Group hierarchy -->
<section class="section section--pale">
    <div class="container container--content">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow">Corporate structure</p>
            <h2 class="display-lg">One group, one operating company, multiple markets</h2>
        </div>
        <div class="hierarchy reveal">
            <div class="hierarchy__node hierarchy__node--root">
                <p class="hierarchy__label">Parent</p>
                <p class="hierarchy__name"><?= e(PARENT_GROUP) ?></p>
            </div>
            <div class="hierarchy__link"><svg width="16" height="28" viewBox="0 0 16 28" aria-hidden="true"><path d="M8 0v22M2 16l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></div>
            <div class="hierarchy__node hierarchy__node--mid">
                <p class="hierarchy__label">Operating company</p>
                <p class="hierarchy__name">Rotash Power Projects</p>
            </div>
            <div class="hierarchy__link"><svg width="16" height="28" viewBox="0 0 16 28" aria-hidden="true"><path d="M8 0v22M2 16l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></div>
            <div class="hierarchy__markets">
                <a class="hierarchy__market" href="/uk/">United Kingdom</a>
                <a class="hierarchy__market" href="/south-africa/">South Africa</a>
            </div>
        </div>
    </div>
</section>

<!-- Engineering philosophy -->
<section class="section section--navy">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark">Engineering philosophy</p>
                <h2 class="display-lg">Performance is engineered, not promised</h2>
            </div>
            <div class="prose reveal" data-delay="1" style="color: rgba(255,255,255,0.78);">
                <p style="color: rgba(255,255,255,0.78);">We do not start with equipment. We start with the duty: what the space needs, how it is used, what it costs to run and what failure would mean. Only then do we select systems.</p>
                <p style="color: rgba(255,255,255,0.78);">Every installation is built to the drawing, commissioned against the brief and handed over with documentation the operator can actually use. If it cannot be measured, verified and maintained, it is not finished.</p>
            </div>
        </div>
        <div class="value-grid mt-10">
            <div class="value reveal"><p class="value__num">01</p><h3 class="value__title">Survey first</h3><p class="value__copy">Real loads and constraints established on site before any equipment is selected.</p></div>
            <div class="value reveal" data-delay="1"><p class="value__num">02</p><h3 class="value__title">Specify to duty</h3><p class="value__copy">Systems sized for the building and climate — not for a catalogue headline.</p></div>
            <div class="value reveal" data-delay="2"><p class="value__num">03</p><h3 class="value__title">Prove performance</h3><p class="value__copy">Balancing, testing and verification recorded before the job is called complete.</p></div>
            <div class="value reveal" data-delay="3"><p class="value__num">04</p><h3 class="value__title">Design for maintenance</h3><p class="value__copy">Access, spares and controls considered so the operator can run it for years.</p></div>
        </div>
    </div>
</section>

<!-- Capabilities -->
<section class="section section--white">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Capabilities</p>
                <h2 class="display-lg">What we are equipped to deliver</h2>
                <p>A full project lifecycle in-house — from survey through to long-term maintenance.</p>
            </div>
            <a class="btn btn--secondary" href="/services/">All services</a>
        </div>
        <div class="grid grid--3">
            <div class="card card--hover reveal"><h3 class="card__title">Design & specification</h3><p class="card__copy">Load assessment, system selection, distribution design and controls strategy for new build and refurbishment.</p></div>
            <div class="card card--hover reveal" data-delay="1"><h3 class="card__title">Installation & project delivery</h3><p class="card__copy">Site installation managed against drawings and programmes, coordinated with other trades.</p></div>
            <div class="card card--hover reveal" data-delay="2"><h3 class="card__title">Commissioning & handover</h3><p class="card__copy">Balancing, performance verification, documentation and operator training at handover.</p></div>
            <div class="card card--hover reveal"><h3 class="card__title">Maintenance & response</h3><p class="card__copy">Planned preventative maintenance, fault response and system optimisation across the installed base.</p></div>
            <div class="card card--hover reveal" data-delay="1"><h3 class="card__title">Commercial refrigeration</h3><p class="card__copy">Cold rooms, display refrigeration and cold-chain systems for retail and food environments.</p></div>
            <div class="card card--hover reveal" data-delay="2"><h3 class="card__title">Mechanical services</h3><p class="card__copy">Coordinated building mechanical services — plant, distribution and interfaces with other disciplines.</p></div>
        </div>
    </div>
</section>

<!-- Quality, safety, professionalism -->
<section class="section section--pale">
    <div class="container">
        <div class="grid grid--2 grid--loose items-start">
            <div class="reveal">
                <p class="eyebrow">Quality & safety</p>
                <h2 class="display-lg">Professionalism is a process, not a posture</h2>
                <div class="prose mt-6">
                    <p>Quality is controlled the only way it can be: against drawings, checklists and test records — with defects closed before handover, not after the invoice.</p>
                    <p>Safety is planned into the works, including live-environment constraints in retail, hospitality and occupied buildings.</p>
                </div>
                <!-- TODO(accreditations): insert verified UK and South African accreditations,
                     memberships and certifications once documented (e.g. Gas Safe, CHAS, builder
                     plumbers, ISO). Do not publish unverified certification claims. -->
            </div>
            <div class="reveal" data-delay="1">
                <img src="/assets/img/engineering-work.jpg" alt="Engineering work in an industrial environment" loading="lazy" style="border-radius: 12px;">
            </div>
        </div>
    </div>
</section>

<!-- International presence -->
<section class="section section--white">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">International presence</p>
            <h2 class="display-lg">Two live markets, built for expansion</h2>
            <p>The platform is designed to grow: new countries plug into the same engineering standard, the same delivery process and the same digital presence.</p>
        </div>
        <div class="grid grid--2">
            <div class="card reveal"><span class="market-card__flag">Live</span><h3 class="card__title mt-6">United Kingdom</h3><p class="card__copy">HVAC and building services engineering for British commercial and industrial clients.</p></div>
            <div class="card reveal" data-delay="1"><span class="market-card__flag">Live</span><h3 class="card__title mt-6">South Africa</h3><p class="card__copy">Climate control, commercial refrigeration and mechanical services from Eastern Cape operations.</p></div>
        </div>
    </div>
</section>

<?php $cta = [
    'title'   => 'Work with an engineering partner.',
    'copy'    => 'Discuss your building, your loads and your constraints with the team that will engineer them.',
]; ?>
<?php require __DIR__ . '/../includes/cta-band.php'; ?>
<?php require __DIR__ . '/../includes/footer.php'; ?>
