<?php
/** Breadcrumb trail + BreadcrumbList JSON-LD. Call after head include. */
$crumbs   = breadcrumbs();
$positions = [];
foreach ($crumbs as $i => $c) {
    $positions[] = [
        '@type'    => 'ListItem',
        'position' => $i + 1,
        'name'     => $c['label'],
        'item'     => $c['url'] !== null ? SITE_DOMAIN . $c['url'] : null,
    ];
}
$positions = array_map(function ($p) {
    if ($p['item'] === null) unset($p['item']);
    return $p;
}, $positions);
$ld = ['@type' => 'BreadcrumbList', 'itemListElement' => $positions];
?>
    <script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES) ?></script>
    <nav class="breadcrumbs" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumbs__list">
<?php foreach ($crumbs as $i => $c): ?>
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
