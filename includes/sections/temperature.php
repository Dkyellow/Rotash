<?php
/**
 * Temperature scale — the bands the disciplines are specified against.
 * Expects: $temperature = ['eyebrow','title','copy']
 */
global $TEMP_BANDS;
$temperature = array_merge([
    'eyebrow' => 'The bands we work to',
    'title'   => 'Temperature is the specification',
    'copy'    => 'Most refrigeration work is decided by a temperature band, a duty and a product. These are the ranges the disciplines are routinely specified and serviced against.',
], $temperature ?? []);
?>
<section class="section section--ink">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--on-dark"><?= e($temperature['eyebrow']) ?></p>
            <h2 class="display-lg"><?= e($temperature['title']) ?></h2>
            <p class="section-head__on-dark"><?= e($temperature['copy']) ?></p>
        </div>
        <ol class="temp-scale reveal">
<?php foreach ($TEMP_BANDS as $band): ?>
            <li class="temp-band temp-band--<?= e($band['tone']) ?>">
                <p class="temp-band__range"><?= e($band['range']) ?></p>
                <p class="temp-band__label"><?= e($band['label']) ?></p>
                <p class="temp-band__use"><?= e($band['use']) ?></p>
            </li>
<?php endforeach; ?>
        </ol>
    </div>
</section>
