<?php
/**
 * Interior page hero.
 * Expects: $ph = ['eyebrow', 'title', 'lede', 'image', 'alt', 'meta' => [k=>v]]
 */
$ph = array_merge([
    'eyebrow' => '',
    'title'   => '',
    'lede'    => '',
    'image'   => '/assets/img/hero-technician.jpg',
    'alt'     => '',
    'meta'    => [],
], $ph ?? []);
?>
<section class="page-hero">
    <div class="page-hero__media">
        <?= img($ph['image'], $ph['alt'], '', true, '100vw') ?>
    </div>
    <?php if (($page['breadcrumbs'] ?? true) !== false) { require __DIR__ . '/../breadcrumbs.php'; } ?>
    <div class="container page-hero__inner">
        <div class="page-hero__content">
<?php if ($ph['eyebrow'] !== ''): ?>
            <p class="eyebrow eyebrow--on-dark"><?= e($ph['eyebrow']) ?></p>
<?php endif; ?>
            <h1 class="heading-1"><?= e($ph['title']) ?></h1>
<?php if ($ph['lede'] !== ''): ?>
            <p class="lede lede--on-dark"><?= e($ph['lede']) ?></p>
<?php endif; ?>
<?php if ($ph['meta']): ?>
            <dl class="page-hero__meta">
<?php foreach ($ph['meta'] as $k => $v): ?>
                <div class="page-hero__meta-item"><dt><?= e($k) ?></dt><dd><?= e($v) ?></dd></div>
<?php endforeach; ?>
            </dl>
<?php endif; ?>
        </div>
    </div>
</section>
