<?php
declare(strict_types=1);

/* ============================================================
   Sitemap generator — run:  php sitemap.php > sitemap.xml
   Emits every route for every market with xhtml:link hreflang
   annotations. New markets in $MARKETS appear automatically.
   ============================================================ */

require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

header('Content-Type: application/xml; charset=utf-8');

$lastmod = date('Y-m-d');

/** Absolute URL for a route in a market, always slash-terminated (matches canonical). */
$loc_for = static function (string $prefix, string $route): string {
    $path = $prefix . $route;
    if ($path === '') {
        return SITE_DOMAIN . '/';
    }
    if (!str_ends_with($path, '/')) {
        $path .= '/';
    }
    return SITE_DOMAIN . '/' . ltrim($path, '/');
};

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"'
   . ' xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

foreach ($ROUTES as $route => $key) {
    foreach ($MARKETS as $code => $m) {
        if (!page_exists($code, $route)) {
            continue;
        }

        echo "  <url>\n";
        echo '    <loc>' . htmlspecialchars($loc_for($m['prefix'], $route), ENT_XML1) . "</loc>\n";
        echo '    <lastmod>' . $lastmod . "</lastmod>\n";
        echo '    <changefreq>' . ($route === '' ? 'weekly' : 'monthly') . "</changefreq>\n";
        echo '    <priority>' . ($route === '' ? '1.0' : '0.7') . "</priority>\n";

        $alternates = array_filter(
            array_keys($MARKETS),
            static fn (string $ac): bool => page_exists($ac, $route)
        );
        if (count($alternates) >= 2) {
            foreach ($alternates as $ac) {
                echo '    <xhtml:link rel="alternate" hreflang="'
                   . htmlspecialchars($MARKETS[$ac]['hreflang'], ENT_XML1)
                   . '" href="' . htmlspecialchars($loc_for($MARKETS[$ac]['prefix'], $route), ENT_XML1) . "\"/>\n";
            }
        }
        echo "  </url>\n";
    }
}

echo "</urlset>\n";
