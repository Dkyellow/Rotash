<?php
/**
 * Engagement models — how the company works with clients, including
 * work delivered as a subcontractor.
 * Expects: $engagement = ['eyebrow','title','copy']
 */
global $ENGAGEMENT_MODELS;
$engagement = array_merge([
    'eyebrow' => 'How we work with clients',
    'title'   => 'Appointed directly, or as a subcontractor',
    'copy'    => 'Rotash Power Projects contracts in two ways, and both are ordinary parts of the business. Whichever route you are on, the same engineers, the same method and the same standard of work apply.',
    'id'      => 'engagement',
], $engagement ?? []);
?>
<section class="section section--pale" id="<?= e($engagement['id']) ?>">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow"><?= e($engagement['eyebrow']) ?></p>
            <h2 class="display-lg"><?= e($engagement['title']) ?></h2>
            <p><?= e($engagement['copy']) ?></p>
        </div>
        <div class="engagement-grid">
<?php foreach ($ENGAGEMENT_MODELS as $i => $model): ?>
            <article class="engagement reveal" data-delay="<?= $i % 4 ?>">
                <span class="icon-badge"><?= icon($model['icon'] ?? 'users') ?></span>
                <p class="engagement__index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
                <h3 class="engagement__name"><?= e($model['name']) ?></h3>
                <p class="engagement__summary"><?= e($model['summary']) ?></p>
                <p class="engagement__detail"><?= e($model['detail']) ?></p>
                <p class="label engagement__label">What this covers</p>
                <ul class="engagement__list">
<?php foreach ($model['owns'] as $own): ?>
                    <li><?= e($own) ?></li>
<?php endforeach; ?>
                </ul>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
