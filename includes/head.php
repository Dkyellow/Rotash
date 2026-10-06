<?php
/**
 * <head> + document open.
 * Expects $page: title, description, key (nav active), optional image.
 * Emits canonical, hreflang cluster, Open Graph, and JSON-LD
 * (Organization + per-market LocalBusiness). Add extra JSON-LD
 * blocks by pushing to $page['jsonld'][].
 */
$m    = market(current_market_code());
$page += ['title' => SITE_NAME, 'description' => '', 'key' => '', 'image' => '/assets/img/commercial_refrigeration_hero.png', 'jsonld' => []];
$canonical = absolute_url(current_market_code(), ltrim(relative_route(), '/'));
$ogImage   = SITE_DOMAIN . $page['image'];

$ld = [jsonld_organization(), [
    '@type'    => 'WebSite',
    '@id'      => SITE_DOMAIN . '/#website',
    'url'      => SITE_DOMAIN . '/',
    'name'     => SITE_NAME,
    'inLanguage' => $m['lang'],
]];

if (current_market_code() !== 'global' && isset($OFFICES[current_market_code()])) {
    $ld[] = jsonld_localbusiness($OFFICES[current_market_code()]);
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
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
    <meta property="og:title" content="<?= e($page['title']) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#00053D">
    <link rel="icon" type="image/png" href="/assets/img/logo.png">
    <link rel="apple-touch-icon" href="/assets/img/logo.png">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
<body class="page-<?= e($page['key'] ?: 'default') ?>" data-market="<?= e($m['code']) ?>">
