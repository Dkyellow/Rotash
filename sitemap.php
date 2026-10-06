<?php
declare(strict_types=1);

/* ============================================================
   Sitemap generator — run:  php sitemap.php > sitemap.xml
   Emits every route for every market with xhtml:link hreflang
   annotations. New markets in $MARKETS appear automatically.
   ============================================================ */

require __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=utf-8');

$lastmod = date('Y-m-d');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"'
   . ' xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

foreach ($ROUTES as $route => $key) {
    foreach ($MARKETS as $code => $m) {
        $loc = SITE_DOMAIN . $m['prefix'] . $route;

        echo "  <url>\n";
        echo '    <loc>' . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        echo '    <lastmod>' . $lastmod . "</lastmod>\n";
        echo '    <changefreq>' . ($route === '' ? 'weekly' : 'monthly') . "</changefreq>\n";
        echo '    <priority>' . ($route === '' ? '1.0' : '0.7') . "</priority>\n";
        foreach ($MARKETS as $am) {
            echo '    <xhtml:link rel="alternate" hreflang="'
               . htmlspecialchars($am['hreflang'], ENT_XML1)
               . '" href="' . htmlspecialchars(SITE_DOMAIN . $am['prefix'] . $route, ENT_XML1) . "\"/>\n";
        }
        echo "  </url>\n";
    }
}

echo "</urlset>\n";
