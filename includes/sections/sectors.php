<?php
/**
 * Sector grid — the industries the work is done for, with a
 * photograph and an icon for each.
 * Expects: $sectors (optional override), $sector_head (optional)
 */
$code   = current_market_code();
$sectors = $sectors ?? industries_for_market($code);
$sector_head = $sector_head ?? [];
$i = 0;
?>
<section class="section section--white" id="sectors">
    <div class="container">
<?php if ($sector_head): ?>
        <div class="section-head section-head--center reveal">
<?php if (!empty($sector_head['eyebrow'])): ?>
            <p class="eyebrow"><?= e($sector_head['eyebrow']) ?></p>
<?php endif; ?>
            <h2 class="display-lg"><?= e($sector_head['title']) ?></h2>
<?php if (!empty($sector_head['copy'])): ?>
            <p><?= e($sector_head['copy']) ?></p>
<?php endif; ?>
        </div>
<?php endif; ?>
        <div class="sector-grid">
<?php foreach ($sectors as $s): $i++; ?>
            <article class="sector reveal" data-delay="<?= $i % 3 ?>">
<?php if (!empty($s['photo'])): ?>
                <div class="sector__media">
                    <?= img($s['photo'], $s['alt'] ?? '', '', false, '(max-width: 720px) 100vw, (max-width: 1180px) 50vw, 33vw') ?>
                    <span class="icon-badge icon-badge--float"><?= icon($s['icon'] ?? 'building') ?></span>
                </div>
<?php else: ?>
                <div class="sector__media sector__media--icon">
                    <span class="icon-badge"><?= icon($s['icon'] ?? 'building') ?></span>
                </div>
<?php endif; ?>
                <div class="sector__body">
                    <p class="sector__index"><?= str_pad((string) $i, 2, '0', STR_PAD_LEFT) ?></p>
                    <h3 class="sector__name"><?= e($s['name']) ?></h3>
                    <p class="sector__summary"><?= e($s['summary']) ?></p>
                    <ul class="sector__demands">
<?php foreach ($s['demands'] as $d): ?>
                        <li><?= e($d) ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
