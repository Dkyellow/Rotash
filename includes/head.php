<?php
/**
 * <head> + document open.
 * Expects $page: title, description, key (nav active), optional image.
 * Emits canonical, hreflang cluster, Open Graph, and JSON-LD
 * (Organization, WebSite, LocalBusiness, BreadcrumbList). Add extra
 * JSON-LD blocks by pushing to $page['jsonld'][].
 */
$m        = market(current_market_code());
$code     = current_market_code();
$page   += ['title' => SITE_NAME, 'description' => '', 'key' => '', 'image' => '/assets/img/og-default.jpg', 'jsonld' => [], 'canonical' => '', 'breadcrumbs' => true];
$canonical = $page['canonical'] !== '' ? $page['canonical'] : absolute_url($code, ltrim(relative_route(), '/'));
$ogImage   = SITE_DOMAIN . $page['image'];

$ld = [
    jsonld_organization(),
    jsonld_website(),
];
$crumbs = [];
if (($page['breadcrumbs'] ?? true) !== false) {
    $crumbs = breadcrumbs();
    $ld[] = jsonld_breadcrumbs($crumbs);
}
$lb = jsonld_localbusiness($code);
if ($lb) {
    $ld[] = $lb;
}
foreach (jsonld_services($code) as $svc) {
    $ld[] = $svc;
}
$ld = array_merge($ld, $page['jsonld']);
?><!DOCTYPE html>
<html lang="<?= e($m['lang']) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page['title']) ?></title>
    <meta name="description" content="<?= e($page['description']) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
<?php foreach (hreflang_links() as $lang => $url): ?>
    <link rel="alternate" hreflang="<?= e($lang) ?>" href="<?= e($url) ?>">
<?php endforeach; ?>
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
    <meta property="og:title" content="<?= e($page['title']) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="<?= e(str_replace('-', '_', $m['lang'])) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#172D46">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">
    <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preload" as="image" href="<?= e($page['image']) ?>" fetchpriority="high">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script>document.documentElement.classList.add('js');</script>
    <script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
<body class="page-<?= e($page['key'] ?: 'default') ?>" data-market="<?= e($code) ?>">
