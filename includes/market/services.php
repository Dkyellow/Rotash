<?php
/**
 * Market services page, shared by every country site.
 * Expects: $mc, $MK, $MC.
 */
global $FAQ;

$mc = $mc ?? current_market_code();
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$ph = [
    'eyebrow' => 'Services · ' . $MK['name'],
    'title'   => 'What we deliver in ' . $MK['name'],
    'lede'    => $MC['services_note'],
    'image'   => $MC['hero']['image'],
    'alt'     => $MC['hero']['alt'],
];
require __DIR__ . '/../sections/page-hero.php';
?>

<nav class="contents" aria-label="Services on this page">
    <div class="container contents__inner">
        <p class="contents__label">On this page</p>
        <ul class="contents__list">
<?php foreach (services_for_market($mc) as $id => $s): ?>
            <li><a href="#<?= e($id) ?>"><?= e($s['nav']) ?><?php if ($s['kind'] === 'specialist'): ?><span class="contents__tag">Specialist</span><?php endif; ?></a></li>
<?php endforeach; ?>
            <li><a href="#method">How we work</a></li>
            <li><a href="#faq">Questions</a></li>
        </ul>
    </div>
</nav>

<?php
$discipline_head = [
    'eyebrow' => 'Capabilities',
    'title'   => 'Disciplines available in ' . $MK['name'],
    'copy'    => 'Each discipline below is delivered by the ' . $MK['name'] . ' team, with the same survey, specification and commissioning discipline used across the group.',
];
require __DIR__ . '/../sections/disciplines.php';
?>

<?php
$method = [
    'eyebrow' => 'Delivery',
    'title'   => 'One lifecycle, whichever discipline you engage',
    'copy'    => 'The same four stages on every job: survey, specify, install and commission against drawings, then hand over with documentation and a maintenance regime.',
    'cta'     => ['label' => 'See it applied', 'href' => '/' . $mc . '/projects/'],
];
require __DIR__ . '/../sections/method.php';
?>

<section class="section section--white" id="faq">
    <div class="container container--content">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow">Questions</p>
            <h2 class="display-lg">Straight answers</h2>
        </div>
        <div class="faq">
<?php foreach ($FAQ as $i => $f): ?>
            <details class="faq__item reveal" data-delay="<?= $i % 3 ?>"<?= $i === 0 ? ' open' : '' ?>>
                <summary class="faq__q"><?= e($f['q']) ?><span class="faq__mark" aria-hidden="true"></span></summary>
                <div class="faq__a"><p><?= e($f['a']) ?></p></div>
            </details>
<?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Let’s discuss your requirement.',
    'copy'    => 'The facility, the duty, the constraint and the timeline. The ' . $MK['name'] . ' team will take it from there.',
    'primary' => ['label' => 'Request a consultation', 'href' => '/' . $mc . '/contact/'],
    'secondary' => ['label' => 'View services', 'href' => '/' . $mc . '/services/'],
];
require __DIR__ . '/../sections/cta.php';
?>
