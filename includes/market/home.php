<?php
/**
 * Market home page — shared by every country site.
 * Expects: $mc (market code), $MK (market record), $MC (market copy).
 */
$mc = $mc ?? current_market_code();
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$hero = $MC['hero'];
require __DIR__ . '/../sections/hero.php';

$facts = $MC['facts'];
require __DIR__ . '/../sections/facts.php';
?>

<!-- Local introduction -->
<section class="section section--white">
    <div class="container">
        <div class="grid grid--split">
            <div class="reveal">
                <p class="eyebrow"><?= e($MC['intro']['eyebrow']) ?></p>
                <h2 class="display-lg"><?= e($MC['intro']['title']) ?></h2>
            </div>
            <div class="prose reveal" data-delay="1">
<?php foreach ($MC['intro']['paragraphs'] as $p): ?>
                <p><?= e($p) ?></p>
<?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Disciplines -->
<?php
$discipline_head = [
    'eyebrow' => 'Services · ' . $MK['name'],
    'title'   => $MC['focus']['title'],
    'copy'    => $MC['focus']['copy'],
];
require __DIR__ . '/../sections/disciplines.php';
?>

<!-- Method -->
<?php
$method = [
    'eyebrow' => 'How we work',
    'title'   => 'One method, in your market',
    'copy'    => 'The same four stages on every job, in every country: survey the real duty, specify to it, install to the drawing, and prove performance before handover.',
    'cta'     => ['label' => 'See the work', 'href' => '/' . $mc . '/projects/'],
];
require __DIR__ . '/../sections/method.php';
?>

<!-- Sectors -->
<?php
$sector_head = [
    'eyebrow' => 'Sectors · ' . $MK['name'],
    'title'   => 'Sectors we engineer for here',
    'copy'    => 'The sectors this operation is asked to engineer for, and what each one demands from its plant.',
];
require __DIR__ . '/../sections/sectors.php';
?>

<!-- Selected work -->
<section class="section section--pale">
    <div class="container">
        <div class="section-head__row section-head reveal">
            <div>
                <p class="eyebrow">Projects · <?= e($MK['name']) ?></p>
                <h2 class="display-lg">Case studies</h2>
                <p>Project records published once the client has confirmed them.</p>
            </div>
            <a class="btn btn--secondary" href="/<?= e($mc) ?>/projects/">All <?= e($MK['name']) ?> projects</a>
        </div>
<?php
$cases = array_values(array_filter($PROJECTS, fn($p) => $p['market'] === $mc));
$empty_copy = [
    'title' => 'Case studies for this market are being verified',
    'copy'  => 'We publish project records once the client has confirmed the detail. In the meantime, tell us about your project and the team here will scope it properly.',
];
require __DIR__ . '/../sections/cases.php';
?>
    </div>
</section>

<!-- Coverage -->
<section class="section section--ink">
    <div class="container">
        <div class="grid grid--split">
            <div class="reveal">
                <p class="eyebrow eyebrow--on-dark"><?= e($MC['coverage']['title']) ?></p>
                <h2 class="display-lg">Where this team works</h2>
            </div>
            <ul class="coverage-list reveal" data-delay="1">
<?php foreach ($MC['coverage']['items'] as $item): ?>
                <li><?= e($item) ?></li>
<?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php
$cta = [
    'title'   => 'Let’s discuss your requirement.',
    'copy'    => 'The facility, the duty, the constraint and the timeline — the ' . $MK['name'] . ' team will take it from there.',
    'primary' => ['label' => 'Request a consultation', 'href' => '/' . $mc . '/contact/'],
    'secondary' => ['label' => 'View services', 'href' => '/' . $mc . '/services/'],
];
require __DIR__ . '/../sections/cta.php';
?>
