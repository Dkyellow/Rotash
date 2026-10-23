<?php
declare(strict_types=1);

/* ============================================================
   Shared helpers: escaping, routing, canonical/hreflang,
   breadcrumbs, content lookups and structured data.
   ============================================================ */

/** Escape for HTML output. */
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
    $uri  = $_SERVER['REQUEST_URI'] ?? '/';
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
    return $MARKETS[$code] ?? $MARKETS['global'];
}

/** Does a route exist as a page in this market? */
function page_exists(string $code, string $route): bool
{
    global $MARKETS;
    return in_array($route, $MARKETS[$code]['pages'] ?? [], true);
}

/** Route path relative to the current market prefix ("/services/"). */
function relative_route(): string
{
    global $MARKETS;
    $prefix = $MARKETS[current_market_code()]['prefix'];
    $path   = current_path();
    $rel    = $prefix !== '' ? substr($path, strlen($prefix)) : $path;
    return '/' . ltrim($rel, '/');
}

/** Root-relative URL inside the current market: mp('services/') -> '/uk/services/'. */
function mp(string $route = ''): string
{
    global $MARKETS;
    $code = current_market_code();
    if (!page_exists($code, $route)) {
        return '/' . ltrim($route, '/');
    }
    return '/' . ltrim($MARKETS[$code]['prefix'] . $route, '/');
}

/** Root-relative URL for a specific market. */
function market_url(string $code, string $route = ''): string
{
    global $MARKETS;
    if (!page_exists($code, $route)) {
        return '/' . ltrim($route, '/');
    }
    return '/' . ltrim($MARKETS[$code]['prefix'] . $route, '/');
}

/** Absolute canonical URL for a route in a market (always slash-terminated). */
function absolute_url(string $code, string $route): string
{
    global $MARKETS;
    $path = $MARKETS[$code]['prefix'] . $route;
    if ($path === '') {
        return SITE_DOMAIN . '/';
    }
    if (!str_ends_with($path, '/')) {
        $path .= '/';
    }
    return SITE_DOMAIN . '/' . ltrim($path, '/');
}

/**
 * hreflang cluster for the current page across every market that has it.
 * Returns [] when the page exists in fewer than 2 markets, so a
 * global-only page never emits a dead alternate URL.
 */
function hreflang_links(): array
{
    global $MARKETS;
    $rel   = ltrim(relative_route(), '/');
    $links = [];
    foreach ($MARKETS as $code => $m) {
        if (page_exists($code, $rel)) {
            $links[$m['hreflang']] = absolute_url($code, $rel);
        }
    }
    return count($links) >= 2 ? $links : [];
}

/** Breadcrumbs for the current page: [['label'=>..,'url'=>..], ...] ending at current. */
function breadcrumbs(): array
{
    global $MARKETS, $ROUTE_LABELS;
    $code   = current_market_code();
    $m      = $MARKETS[$code];
    $rel    = ltrim(relative_route(), '/');
    $crumbs = [];

    if ($code !== 'global') {
        $crumbs[] = ['label' => $m['name'], 'url' => $m['prefix']];
    } else {
        $crumbs[] = ['label' => 'Home', 'url' => null];
    }

    if ($rel !== '') {
        $crumbs[] = [
            'label' => $ROUTE_LABELS[$rel] ?? ($m['name']),
            'url'   => null,
        ];
    }

    return $crumbs;
}

/* ---------- Content lookups ---------- */

/** Disciplines offered in a market, in canonical order. The group site lists all. */
function services_for_market(string $code): array
{
    global $SERVICES;
    $out = [];
    foreach (SERVICE_ORDER as $id) {
        if (!isset($SERVICES[$id])) {
            continue;
        }
        if ($code === 'global' || in_array($code, $SERVICES[$id]['markets'], true)) {
            $out[$id] = $SERVICES[$id];
        }
    }
    return $out;
}

/** Sectors served in a market, in declaration order. */
function industries_for_market(string $code): array
{
    global $INDUSTRIES;
    $out = [];
    foreach ($INDUSTRIES as $id => $ind) {
        if ($code === 'global' || in_array($code, $ind['markets'], true)) {
            $out[$id] = $ind;
        }
    }
    return $out;
}

/** Office record for a market, or the group record. */
function office(string $code): array
{
    global $OFFICES;
    return $OFFICES[$code] ?? $OFFICES['global'];
}

/**
 * The contact block a visitor should be given for a market.
 * A market with confirmed details publishes its own; otherwise the
 * group contact route is used, so no placeholder is ever shown.
 */
function contact_point(string $code): array
{
    $o = office($code);
    if (!empty($o['pending']) || empty($o['phone'])) {
        return [
            'source'      => 'group',
            'name'        => 'Rotash Power Projects — Group',
            'phone'       => GROUP_CONTACT['phone'],
            'email'       => GROUP_CONTACT['email'],
            'whatsapp'    => GROUP_CONTACT['whatsapp'],
            'hours'       => GROUP_CONTACT['hours'],
            'note'        => $o['note'] ?? '',
            'offices'     => $o['locations'] ?? [],
            'pending'     => !empty($o['pending']),
            'service_areas' => $o['service_areas'] ?? [],
        ];
    }
    return [
        'source'      => 'local',
        'name'        => $o['name'],
        'phone'       => $o['phone'],
        'email'       => $o['email'],
        'whatsapp'    => $o['whatsapp'] ?? '',
        'hours'       => $o['hours_label'],
        'note'        => $o['note'] ?? '',
        'offices'     => $o['locations'] ?? [],
        'pending'     => false,
        'service_areas' => $o['service_areas'] ?? [],
    ];
}

/** Tel: href for a display number. */
function tel_href(string $phone): string
{
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}

/* ---------- Images ---------- */

/**
 * Emit a responsive <img> with a width/height pair and srcset.
 * Variants are named <name>-<width>.jpg next to the original and
 * are only referenced when they actually exist on disk.
 */
function img(string $path, string $alt, string $class = '', bool $eager = false, string $sizes = '(max-width: 900px) 100vw, 50vw'): string
{
    $base = pathinfo($path, PATHINFO_FILENAME);
    $ext  = pathinfo($path, PATHINFO_EXTENSION);
    $dir  = rtrim(dirname($path), '.');

    $info = @getimagesize(__DIR__ . '/..' . $path);
    $w = $info ? $info[0] : 1600;
    $h = $info ? $info[1] : 0;

    $attrs = [
        'src'      => $path,
        'alt'      => $alt,
        'decoding' => 'async',
    ];
    if ($class !== '') {
        $attrs['class'] = $class;
    }
    if ($eager) {
        $attrs['loading']       = 'eager';
        $attrs['fetchpriority'] = 'high';
    } else {
        $attrs['loading'] = 'lazy';
    }
    if ($h > 0) {
        $attrs['width']  = (string) $w;
        $attrs['height'] = (string) $h;
    }

    $variants = [];
    foreach ([480, 640, 1024, 1600] as $vw) {
        if ($vw >= $w) {
            continue;
        }
        $vpath = $dir . '/' . $base . '-' . $vw . '.' . $ext;
        if (is_file(__DIR__ . '/..' . $vpath)) {
            $variants[] = $vpath . ' ' . $vw . 'w';
        }
    }
    $variants[] = $path . ' ' . $w . 'w';
    $attrs['srcset'] = implode(', ', $variants);
    $attrs['sizes']  = $sizes;

    $out = '<img';
    foreach ($attrs as $k => $v) {
        $out .= ' ' . $k . '="' . e($v) . '"';
    }
    return $out . '>';
}

/* ---------- Structured data ---------- */

/** JSON-LD: Organization (group identity, published on every page). */
function jsonld_organization(): array
{
    return [
        '@type'         => 'Organization',
        '@id'           => SITE_DOMAIN . '/#organization',
        'name'          => SITE_NAME,
        'legalName'     => PARENT_GROUP,
        'url'           => SITE_DOMAIN . '/',
        'logo'          => SITE_DOMAIN . '/assets/img/logo-512.png',
        'image'         => SITE_DOMAIN . '/assets/img/og-default.jpg',
        'description'   => 'Refrigeration, air conditioning and medical cold chain engineering, delivered from Zimbabwe, South Africa and the United Kingdom.',
        'parentOrganization' => [
            '@type' => 'Organization',
            'name'  => PARENT_GROUP,
        ],
        'areaServed'    => ['ZW', 'ZA', 'GB'],
        'contactPoint'  => [[
            '@type'             => 'ContactPoint',
            'contactType'       => 'sales',
            'email'             => GROUP_CONTACT['email'],
            'telephone'         => GROUP_CONTACT['phone'],
            'availableLanguage' => ['en'],
            'areaServed'        => ['ZW', 'ZA', 'GB'],
        ]],
    ];
}

/** JSON-LD: WebSite. */
function jsonld_website(): array
{
    return [
        '@type'      => 'WebSite',
        '@id'        => SITE_DOMAIN . '/#website',
        'url'        => SITE_DOMAIN . '/',
        'name'       => SITE_NAME,
        'publisher'  => ['@id' => SITE_DOMAIN . '/#organization'],
        'inLanguage' => 'en',
    ];
}

/**
 * JSON-LD: LocalBusiness for a market. Only emitted for markets
 * with confirmed contact details, so the structured data never
 * contradicts what the page shows.
 */
function jsonld_localbusiness(string $code): ?array
{
    global $OFFICES;
    $o = $OFFICES[$code] ?? null;
    if (!$o || !empty($o['pending']) || empty($o['phone'])) {
        return null;
    }
    $cp = contact_point($code);
    $data = [
        '@type'       => 'LocalBusiness',
        '@id'         => SITE_DOMAIN . '/' . $code . '/#office',
        'name'        => $o['name'],
        'url'         => SITE_DOMAIN . $o['market_prefix'],
        'telephone'   => $cp['phone'],
        'email'       => $cp['email'],
        'areaServed'  => $o['service_areas'],
        'parentOrganization' => ['@id' => SITE_DOMAIN . '/#organization'],
    ];
    if (!empty($o['hours_schema'])) {
        $data['openingHours'] = $o['hours_schema'];
    }
    if (!empty($o['locations'])) {
        $loc = $o['locations'][0];
        $data['address'] = [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $loc['address'],
            'addressLocality' => $loc['city'],
            'addressRegion'   => $loc['region'],
            'addressCountry'  => $o['country_code'],
        ];
    }
    if (!empty($o['geo'])) {
        $data['geo'] = [
            '@type'    => 'GeoCoordinates',
            'latitude' => $o['geo']['lat'],
            'longitude' => $o['geo']['lng'],
        ];
    }
    return $data;
}

/** JSON-LD: the disciplines offered, as Service entries. */
function jsonld_services(string $code): array
{
    $out = [];
    foreach (services_for_market($code) as $id => $s) {
        $areas = array_values(array_map(
            static fn (string $marketCode): string => market($marketCode)['name'],
            $s['markets']
        ));
        $out[] = [
            '@type'       => 'Service',
            'name'        => $s['name'],
            'description' => $s['summary'],
            'serviceType' => $s['name'],
            'provider'    => ['@id' => SITE_DOMAIN . '/#organization'],
            'areaServed'  => $areas,
        ];
    }
    return $out;
}

/** JSON-LD: BreadcrumbList. */
function jsonld_breadcrumbs(array $crumbs): array
{
    $items = [];
    foreach ($crumbs as $i => $c) {
        $item = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $c['label'],
        ];
        if ($c['url'] !== null) {
            $item['item'] = SITE_DOMAIN . $c['url'];
        }
        $items[] = $item;
    }
    return ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
}
