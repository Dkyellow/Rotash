<?php
/**
 * Breadcrumb trail + BreadcrumbList JSON-LD. Call after head include.
 */
$crumbs = breadcrumbs();
$ld = jsonld_breadcrumbs($crumbs);
?>
    <script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES) ?></script>
    <nav class="breadcrumbs" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumbs__list">
<?php foreach ($crumbs as $c): ?>
                <li class="breadcrumbs__item">
<?php if ($c['url'] !== null): ?>
                    <a href="<?= e($c['url']) ?>"><?= e($c['label']) ?></a>
<?php else: ?>
                    <span aria-current="page"><?= e($c['label']) ?></span>
<?php endif; ?>
                </li>
<?php endforeach; ?>
            </ol>
        </div>
    </nav>
