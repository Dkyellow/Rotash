<?php
/**
 * Final call to action.
 * Expects: $cta = ['eyebrow','title','copy','primary','secondary']
 */
$cta = array_merge([
    'eyebrow'  => 'Start a conversation',
    'title'    => 'Tell us what has to keep running.',
    'copy'     => 'Describe the facility, the temperature or the comfort requirement, and the team for your market will come back with how they would engineer it.',
    'primary'  => ['label' => 'Request a consultation', 'href' => mp('contact/')],
    'secondary' => ['label' => 'See our services', 'href' => mp('services/')],
], $cta ?? []);
?>
<section class="section section--ink cta-band">
    <div class="container cta-band__inner">
        <div class="cta-band__text">
            <p class="eyebrow eyebrow--on-dark"><?= e($cta['eyebrow']) ?></p>
            <h2 class="display-lg cta-band__title"><?= e($cta['title']) ?></h2>
            <p class="cta-band__copy"><?= e($cta['copy']) ?></p>
        </div>
        <div class="cta-band__actions">
            <a class="btn btn--primary btn--lg" href="<?= e($cta['primary']['href']) ?>"><?= e($cta['primary']['label']) ?></a>
            <a class="btn btn--on-dark btn--lg" href="<?= e($cta['secondary']['href']) ?>"><?= e($cta['secondary']['label']) ?></a>
        </div>
    </div>
</section>
