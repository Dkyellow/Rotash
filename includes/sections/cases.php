<?php
/**
 * Case studies — drawn technical records, not photography.
 * Expects: $cases (array), $show_filters (bool), $empty_copy (array)
 */
$cases       = $cases ?? [];
$show_filters = $show_filters ?? false;
$filter_groups = $filter_groups ?? ['country', 'sector', 'service'];
$empty_copy  = $empty_copy ?? [
    'title' => 'Case studies for this market are being verified',
    'copy'  => 'We publish project records once the client has confirmed the detail, so nothing on this site is presented as our work without the client’s agreement. Tell us about your project and the team will scope it properly.',
];
$usedMarkets = array_values(array_unique(array_column($cases, 'market')));
$usedSectors = array_values(array_unique(array_column($cases, 'sector')));
$usedServices = [];
foreach ($cases as $c) {
    foreach ($c['services'] as $s) {
        $usedServices[$s] = true;
    }
}
?>
<div class="case-list">
<?php if ($show_filters && $cases): ?>
    <div class="filters reveal" data-filters>
<?php if (in_array('country', $filter_groups, true)): ?>
        <div class="filter-group">
            <span class="filter-group__label">Country</span>
            <div class="chips">
                <button type="button" class="chip is-active" data-filter="country" data-value="all" aria-pressed="true">All</button>
<?php foreach ($usedMarkets as $mc): ?>
                <button type="button" class="chip" data-filter="country" data-value="<?= e($mc) ?>" aria-pressed="false"><?= e($MARKETS[$mc]['name']) ?></button>
<?php endforeach; ?>
            </div>
        </div>
<?php endif; ?>
        <div class="filter-group">
            <span class="filter-group__label">Sector</span>
            <div class="chips">
                <button type="button" class="chip is-active" data-filter="sector" data-value="all" aria-pressed="true">All</button>
<?php foreach ($usedSectors as $sc): ?>
                <button type="button" class="chip" data-filter="sector" data-value="<?= e($sc) ?>" aria-pressed="false"><?= e($INDUSTRIES[$sc]['name']) ?></button>
<?php endforeach; ?>
            </div>
        </div>
        <div class="filter-group">
            <span class="filter-group__label">Discipline</span>
            <div class="chips">
                <button type="button" class="chip is-active" data-filter="service" data-value="all" aria-pressed="true">All</button>
<?php foreach (array_keys($usedServices) as $sv): ?>
                <button type="button" class="chip" data-filter="service" data-value="<?= e($sv) ?>" aria-pressed="false"><?= e($SERVICES[$sv]['nav']) ?></button>
<?php endforeach; ?>
            </div>
        </div>
    </div>
    <p class="filter-status" data-filter-status role="status" aria-live="polite"></p>
    <p class="filter-empty" data-filter-empty hidden>No case studies match that combination yet. Try another filter, or ask the team directly.</p>
<?php endif; ?>

<?php if (!$cases): ?>
    <div class="notice reveal">
        <h3 class="notice__title"><?= e($empty_copy['title']) ?></h3>
        <p class="notice__copy"><?= e($empty_copy['copy']) ?></p>
        <a class="btn btn--primary" href="<?= e(mp('contact/')) ?>">Talk to the team</a>
    </div>
<?php else: ?>
    <div data-project-list>
<?php foreach ($cases as $i => $p): ?>
        <article class="case reveal<?= $i % 2 ? ' case--flip' : '' ?>"
                 data-project
                 data-country="<?= e($p['market']) ?>"
                 data-sector="<?= e($p['sector']) ?>"
                 data-services="<?= e(implode(' ', $p['services'])) ?>">
            <div class="case__media"><?= schematic($p['graphic'] ?? 'cold-room') ?></div>
            <div class="case__body">
                <p class="case__meta"><?= e($INDUSTRIES[$p['sector']]['name'] ?? $p['sector']) ?> · <?= e(strtoupper($MARKETS[$p['market']]['name'])) ?></p>
                <h3 class="case__title"><?= e($p['title']) ?></h3>
                <dl class="spec">
                    <div class="spec__row"><dt class="spec__key">Location</dt><dd class="spec__val"><?= e($p['location']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Client</dt><dd class="spec__val"><?= e($p['client']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Sector</dt><dd class="spec__val"><?= e($INDUSTRIES[$p['sector']]['name'] ?? $p['sector']) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Disciplines</dt><dd class="spec__val"><?= e(implode(' · ', array_map(fn($s) => $SERVICES[$s]['nav'] ?? $s, $p['services']))) ?></dd></div>
                    <div class="spec__row"><dt class="spec__key">Scope</dt><dd class="spec__val"><?= e($p['scope']) ?></dd></div>
                </dl>
                <div class="case__detail">
                    <div><p class="label">Challenge</p><p class="case__copy"><?= e($p['challenge']) ?></p></div>
                    <div><p class="label">Engineering solution</p><p class="case__copy"><?= e($p['solution']) ?></p></div>
                    <div><p class="label">Execution</p><p class="case__copy"><?= e($p['execution']) ?></p></div>
                </div>
                <p class="case__result"><strong>Outcome</strong> <?= e($p['outcome']) ?></p>
            </div>
        </article>
<?php endforeach; ?>
    </div>
<?php endif; ?>
</div>
