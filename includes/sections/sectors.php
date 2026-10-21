<?php
/**
 * Sector grid — the industries the work is done for, and what each
 * demands from a cooling system.
 * Expects: $sectors (optional override), $sector_head (optional)
 */
$code   = current_market_code();
$sectors = $sectors ?? industries_for_market($code);
$sector_head = $sector_head ?? [];
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
<?php $i = 0; foreach ($sectors as $s): $i++; ?>
            <article class="sector reveal" data-delay="<?= $i % 3 ?>">
                <p class="sector__index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="sector__name"><?= e($s['name']) ?></h3>
                <p class="sector__summary"><?= e($s['summary']) ?></p>
                <ul class="sector__demands">
<?php foreach ($s['demands'] as $d): ?>
                    <li><?= e($d) ?></li>
<?php endforeach; ?>
                </ul>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
