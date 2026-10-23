<?php
/**
 * Hero, the primary page opening.
 * Expects: $hero = ['eyebrow', 'title' (html allowed), 'lede', 'image',
 *                     'alt', 'actions' => [['label','href','style']], 'strip']
 */
$hero = array_merge([
    'eyebrow' => '',
    'title'   => '',
    'lede'    => '',
    'image'   => '/assets/img/hero-technician.jpg',
    'alt'     => '',
    'actions' => [],
    'strip'   => null,
    'meta'    => [],
], $hero ?? []);
?>
<section class="hero">
    <div class="hero__media">
        <?= img($hero['image'], $hero['alt'], '', true, '100vw') ?>
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
<?php if ($hero['eyebrow'] !== ''): ?>
            <p class="eyebrow eyebrow--on-dark"><?= e($hero['eyebrow']) ?></p>
<?php endif; ?>
            <h1 class="display-hero"><?= $hero['title'] ?></h1>
<?php if ($hero['lede'] !== ''): ?>
            <p class="lede lede--on-dark"><?= e($hero['lede']) ?></p>
<?php endif; ?>
<?php if ($hero['actions']): ?>
            <div class="hero__actions">
<?php foreach ($hero['actions'] as $a): ?>
                <a class="btn btn--<?= e($a['style'] ?? 'primary') ?> btn--lg" href="<?= e($a['href']) ?>"><?= e($a['label']) ?></a>
<?php endforeach; ?>
            </div>
<?php endif; ?>
        </div>
<?php if ($hero['meta']): ?>
        <dl class="hero__meta">
<?php foreach ($hero['meta'] as $k => $v): ?>
            <div class="hero__meta-item"><dt><?= e($k) ?></dt><dd><?= e($v) ?></dd></div>
<?php endforeach; ?>
        </dl>
<?php endif; ?>
    </div>
<?php if ($hero['strip']): ?>
    <div class="hero__strip">
        <div class="container hero__strip-inner">
            <span class="hero__strip-label"><?= e($hero['strip']['label']) ?></span>
            <div class="hero__strip-markets">
<?php foreach ($hero['strip']['items'] as $item): ?>
<?php if (!empty($item['href'])): ?>
                <a class="hero__strip-link" href="<?= e($item['href']) ?>"><i class="dot" aria-hidden="true"></i><?= e($item['label']) ?></a>
<?php else: ?>
                <span><i class="dot" aria-hidden="true"></i><?= e($item['label']) ?></span>
<?php endif; ?>
<?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
</section>
