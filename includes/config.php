<?php
declare(strict_types=1);

/* ============================================================
   ROTASH POWER PROJECTS global configuration
   Single source of truth: identity, markets, navigation, routes.
   Adding a market later = one entry in $MARKETS + one prefix in
   the routes. Navigation, footer, sitemap and hreflang follow.
   ============================================================ */

const SITE_DOMAIN  = 'https://rotashpowerprojects.com';
const SITE_NAME    = 'Rotash Power Projects';
const PARENT_GROUP = 'Rotash Group';

/* Brand line. The registered logo carries "Engineering the Future";
   the descriptive line below is what the business does. */
const BRAND_LINE   = 'Engineering the future';
const TAGLINE      = 'Refrigeration, air conditioning and medical cold chain, engineered to perform.';

/* Stated enquiry response target. Centralised so it can be changed
   in one place if the operating commitment changes. */
const RESPONSE_TARGET = 'one business day';

/**
 * Live markets.
 * 'pages'  = routes that exist for this market (keys of $ROUTES).
 * 'hub'    = the market's own home page.
 * Nav, footer, sitemap, hreflang and breadcrumbs honour it. A link to
 * a route a market does not have falls back to the global URL.
 */
$MARKETS = [
    'global' => [
        'code'      => 'global',
        'name'      => 'International',
        'label'     => 'All markets',
        'prefix'    => '',
        'lang'      => 'en',
        'hreflang'  => 'x-default',
        'short'     => 'Global',
        'region'    => 'Zimbabwe · South Africa · United Kingdom',
        'summary'   => 'Group coordination across three operating countries.',
        'pages'     => ['', 'about/', 'services/', 'industries/', 'projects/', 'locations/', 'contact/'],
    ],
    'zimbabwe' => [
        'code'      => 'zimbabwe',
        'name'      => 'Zimbabwe',
        'label'     => 'Zimbabwe',
        'prefix'    => '/zimbabwe/',
        'lang'      => 'en-ZW',
        'hreflang'  => 'en-ZW',
        'short'     => 'ZW',
        'region'    => 'Harare, Zimbabwe',
        'summary'   => 'Refrigeration, air conditioning and medical cold chain from Harare.',
        'pages'     => ['', 'services/', 'projects/', 'contact/'],
    ],
    'south-africa' => [
        'code'      => 'south-africa',
        'name'      => 'South Africa',
        'label'     => 'South Africa',
        'prefix'    => '/south-africa/',
        'lang'      => 'en-ZA',
        'hreflang'  => 'en-ZA',
        'short'     => 'ZA',
        'region'    => 'Eastern Cape, South Africa',
        'summary'   => 'Commercial refrigeration and climate systems from three Eastern Cape offices.',
        'pages'     => ['', 'services/', 'projects/', 'contact/'],
    ],
    'uk' => [
        'code'      => 'uk',
        'name'      => 'United Kingdom',
        'label'     => 'United Kingdom',
        'prefix'    => '/uk/',
        'lang'      => 'en-GB',
        'hreflang'  => 'en-GB',
        'short'     => 'UK',
        'region'    => 'United Kingdom',
        'summary'   => 'Air conditioning and building services for UK commercial and industrial clients.',
        'pages'     => ['', 'services/', 'projects/', 'contact/'],
    ],
];

/** Canonical route paths (relative to a market prefix). Order = sitemap order. */
$ROUTES = [
    ''            => 'home',
    'about/'      => 'about',
    'services/'   => 'services',
    'industries/' => 'industries',
    'projects/'   => 'projects',
    'locations/'  => 'locations',
    'contact/'    => 'contact',
];

/** Primary navigation. */
$NAV = [
    ['label' => 'Services', 'path' => 'services/', 'key' => 'services'],
    ['label' => 'About', 'path' => 'about/', 'key' => 'about'],
    ['label' => 'Regions', 'path' => 'locations/', 'key' => 'locations'],
    ['label' => 'Contact', 'path' => 'contact/', 'key' => 'contact'],
];

/** Breadcrumb labels for every route, including market hubs. */
$ROUTE_LABELS = [
    ''            => 'Home',
    'about/'      => 'About',
    'services/'   => 'Services',
    'industries/' => 'Sectors',
    'projects/'   => 'Projects',
    'locations/'  => 'Locations',
    'contact/'    => 'Contact',
];
