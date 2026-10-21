<?php
/**
 * Discipline blocks — refrigeration, air conditioning and medical
 * refrigeration, filtered to the disciplines the current market offers.
 * Expects: $disciplines (optional override), $discipline_head (optional)
 */
$code       = current_market_code();
$disciplines = $disciplines ?? services_for_market($code);
$discipline_head = $discipline_head ?? [];
$i = 0;
?>
<section class="section section--white" id="disciplines">
    <div class="container">
<?php if ($discipline_head): ?>
        <div class="section-head section-head--center reveal">
<?php if (!empty($discipline_head['eyebrow'])): ?>
            <p class="eyebrow"><?= e($discipline_head['eyebrow']) ?></p>
<?php endif; ?>
            <h2 class="display-lg"><?= e($discipline_head['title']) ?></h2>
<?php if (!empty($discipline_head['copy'])): ?>
            <p><?= e($discipline_head['copy']) ?></p>
<?php endif; ?>
        </div>
<?php endif; ?>
        <div class="disciplines">
<?php foreach ($disciplines as $id => $s):
    $i++;
    $markets = array_map(fn($c) => $MARKETS[$c]['name'], $s['markets']);
    $alt = $s['alt'] ?? '';
?>
            <article class="discipline<?= $s['kind'] === 'specialist' ? ' discipline--specialist' : '' ?>" id="<?= e($id) ?>">
                <header class="discipline__head">
                    <div class="discipline__top">
                        <span class="icon-badge"><?= icon($s['icon'] ?? 'ruler') ?></span>
                        <p class="discipline__index"><?= str_pad((string) $i, 2, '0', STR_PAD_LEFT) ?></p>
                    </div>
                    <h3 class="display-md"><?= e($s['name']) ?></h3>
<?php if ($s['kind'] === 'specialist'): ?>
                    <p class="chip chip--specialist">Specialist service</p>
<?php endif; ?>
                    <p class="discipline__summary"><?= e($s['summary']) ?></p>
                    <p class="discipline__detail"><?= e($s['detail']) ?></p>
<?php if (!empty($s['photo'])): ?>
                    <figure class="discipline__photo">
                        <?= img($s['photo'], $alt, '', false, '(max-width: 960px) 100vw, 38vw') ?>
                    </figure>
<?php endif; ?>
                    <p class="discipline__foot"><span class="label">Delivered in</span> <?= e(implode(' · ', $markets)) ?></p>
                </header>
                <ul class="capabilities">
<?php foreach ($s['capabilities'] as $cap): ?>
                    <li class="capability">
                        <h4 class="capability__name"><?= e($cap['name']) ?></h4>
                        <p class="capability__copy"><?= e($cap['copy']) ?></p>
                    </li>
<?php endforeach; ?>
                </ul>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
