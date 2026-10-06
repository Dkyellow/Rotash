<?php
declare(strict_types=1);

/* ============================================================
   Shared helpers: escaping, routing, canonical/hreflang,
   breadcrumbs, structured data.
   ============================================================ */

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/**
 * Normalised current path, e.g. "/uk/services/" or "/".
 * Strips index.php and query strings so URLs stay canonical.
 */
function current_path(): string
{
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $path = str_replace('index.php', '', $path);
    if (!str_ends_with($path, '/') && !str_contains(basename($path), '.')) {
        $path .= '/';
    }
    return $path;
}

/** Market code for the current URL ('global' when outside a market prefix). */
function current_market_code(): string
{
    global $MARKETS;
    $path = current_path();
    foreach ($MARKETS as $code => $m) {
        if ($m['prefix'] !== '' && str_starts_with($path, $m['prefix'])) {
            return $code;
        }
    }
    return 'global';
}

function market(string $code): array
{
    global $MARKETS;
    return $MARKETS[$code];
}

/** Route path relative to the current market prefix ("/services/"). */
function relative_route(): string
{
    global $MARKETS;
    $prefix = $MARKETS[current_market_code()]['prefix'];
    $path = current_path();
    $rel = $prefix !== '' ? substr($path, strlen($prefix)) : $path;
    return '/' . $rel;
}

/** Root-relative URL inside the current market: mp('services/') -> '/uk/services/'. */
function mp(string $route = ''): string
{
    global $MARKETS;
    return '/' . ltrim($MARKETS[current_market_code()]['prefix'] . $route, '/');
}

/** Root-relative URL for a specific market. */
function market_url(string $code, string $route = ''): string
{
    global $MARKETS;
    return '/' . ltrim($MARKETS[$code]['prefix'] . $route, '/');
}

/** Absolute canonical URL for a route in a market. */
function absolute_url(string $code, string $route): string
{
    global $MARKETS;
    $url  = SITE_DOMAIN . $MARKETS[$code]['prefix'] . $route;
    $path = parse_url($url, PHP_URL_PATH) ?: '/';
    if ($path !== '/' && !str_ends_with($path, '/')) {
        $url .= '/';
    } elseif ($path === '/') {
        $url = SITE_DOMAIN . '/';
    }
    return $url;
}

/**
 * hreflang cluster for the current page across every market.
 * Future locales appear automatically once added to $MARKETS.
 */
function hreflang_links(): array
{
    global $MARKETS, $ROUTES;
    $rel = ltrim(relative_route(), '/');
    if (!array_key_exists($rel, $ROUTES)) {
        return [];
    }
    $links = [];
    foreach ($MARKETS as $code => $m) {
        $links[$m['hreflang']] = absolute_url($code, $rel);
    }
    return $links;
}

/** Breadcrumbs for the current page: [ ['label'=>..,'url'=>..], ... ] ending at current. */
function breadcrumbs(): array
{
    global $NAV, $MARKETS;
    $code  = current_market_code();
    $m     = $MARKETS[$code];
    $rel   = ltrim(relative_route(), '/');
    $crumbs = [];

    if ($code !== 'global') {
        $crumbs[] = ['label' => $m['name'], 'url' => $m['prefix']];
    } else {
        $crumbs[] = ['label' => 'Home', 'url' => '/'];
    }

    if ($rel !== '') {
        foreach ($NAV as $item) {
            if ($item['path'] === $rel) {
                $crumbs[] = ['label' => $item['label'], 'url' => mp($item['path'])];
                break;
            }
        }
    } else {
        $crumbs[count($crumbs) - 1]['url'] = null; // current page
    }

    // Mark last crumb as current
    $last = count($crumbs) - 1;
    if ($rel === '') {
        $crumbs[$last]['url'] = null;
    } else {
        $crumbs[$last]['url'] = null;
    }
    return $crumbs;
}

/** JSON-LD: Organization (global identity, published on every page). */
function jsonld_organization(): array
{
    return [
        '@type' => 'Organization',
        '@id'   => SITE_DOMAIN . '/#organization',
        'name'  => SITE_NAME,
        'legalName' => PARENT_GROUP,
        'url'   => SITE_DOMAIN . '/',
        'logo'  => SITE_DOMAIN . '/assets/img/logo.png',
        'parentOrganization' => [
            '@type' => 'Organization',
            'name'  => PARENT_GROUP,
        ],
    ];
}

/**
 * JSON-LD: LocalBusiness for a single market office block.
 * Offices come from data/offices.php — each market carries its own
 * address, phone, hours and geo; never merged across borders.
 */
function jsonld_localbusiness(array $office): array
{
    $data = [
        '@type'    => 'LocalBusiness',
        '@id'      => SITE_DOMAIN . '/' . $office['market_code'] . '/#office',
        'name'     => $office['name'],
        'url'      => SITE_DOMAIN . $office['market_prefix'],
        'email'    => $office['email'],
        'telephone'=> $office['phone'],
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $office['locations'][0]['address'],
            'addressLocality' => $office['locations'][0]['city'],
            'addressRegion'   => $office['locations'][0]['region'],
            'addressCountry'  => $office['country_code'],
        ],
        'areaServed' => $office['service_areas'],
        'openingHours' => $office['hours_schema'],
        'parentOrganization' => ['@type' => 'Organization', 'name' => SITE_NAME],
    ];
    if (!empty($office['geo'])) {
        $data['geo'] = [
            '@type'     => 'GeoCoordinates',
            'latitude'  => $office['geo']['lat'],
            'longitude' => $office['geo']['lng'],
        ];
    }
    return $data;
}
