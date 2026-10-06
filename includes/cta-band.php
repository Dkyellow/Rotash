<?php
/**
 * Shared final CTA band.
 * Override text per page by setting $cta = ['title'=>..,'copy'=>..,'primary'=>..] before include.
 */
$cta = array_merge([
    'title'   => "Let's discuss your next project.",
    'copy'    => 'Tell us about the building, the requirement and the constraints — we will tell you how we would engineer it.',
    'primary' => 'Request a Consultation',
], $cta ?? []);
?>
<section class="section section--navy cta-band">
    <div class="container cta-band__inner">
        <div class="cta-band__text">
            <p class="eyebrow eyebrow--on-dark">Start a conversation</p>
            <h2 class="display-lg cta-band__title"><?= e($cta['title']) ?></h2>
            <p class="cta-band__copy"><?= e($cta['copy']) ?></p>
        </div>
        <div class="cta-band__actions">
            <a class="btn btn--primary" href="<?= e(mp('contact/')) ?>"><?= e($cta['primary']) ?></a>
            <a class="btn btn--on-dark" href="<?= e(mp('services/')) ?>">View our services</a>
        </div>
    </div>
</section>
