<?php
declare(strict_types=1);

/* ============================================================
   ROTASH POWER PROJECTS — global configuration
   Single source of truth: domain, markets, navigation, routes.
   Adding a market later = add one entry to $MARKETS and
   one prefix to the routes — nothing else changes.
   ============================================================ */

const SITE_DOMAIN  = 'https://rotashpowerprojects.com';
const SITE_NAME    = 'Rotash Power Projects';
const PARENT_GROUP = 'Rotash Group';
const TAGLINE      = 'Engineering environments. Delivering performance.';

/**
 * Live markets. Additional markets append here.
 * 'pages' = routes that exist in this market (keys of $ROUTES).
 * Nav/footer/sitemap/hreflang honour it; links to routes a market
 * does not have fall back to the global URL automatically.
 */
$MARKETS = [
    'global' => [
        'code'     => 'global',
        'name'     => 'International',
        'label'    => 'All Markets',
        'prefix'   => '',
        'lang'     => 'en',
        'hreflang' => 'x-default',
        'flag'     => 'INT',
        'pages'    => ['', 'about/', 'services/', 'industries/', 'projects/', 'locations/', 'insights/', 'contact/'],
    ],
    'uk' => [
        'code'     => 'uk',
        'name'     => 'United Kingdom',
        'label'    => 'United Kingdom',
        'prefix'   => '/uk/',
        'lang'     => 'en-GB',
        'hreflang' => 'en-GB',
        'flag'     => 'GB',
        'pages'    => ['', 'services/', 'industries/', 'projects/', 'contact/'],
    ],
    'south-africa' => [
        'code'     => 'south-africa',
        'name'     => 'South Africa',
        'label'    => 'South Africa',
        'prefix'   => '/south-africa/',
        'lang'     => 'en-ZA',
        'hreflang' => 'en-ZA',
        'flag'     => 'ZA',
        'pages'    => ['', 'services/', 'industries/', 'projects/', 'contact/'],
    ],
];

/** Canonical route paths (relative to market prefix). Order = sitemap order. */
$ROUTES = [
    ''            => 'home',
    'about/'      => 'about',
    'services/'   => 'services',
    'industries/' => 'industries',
    'projects/'   => 'projects',
    'locations/'  => 'locations',
    'insights/'   => 'insights',
    'contact/'    => 'contact',
];

/** Primary navigation. */
$NAV = [
    ['label' => 'About',      'path' => 'about/',      'key' => 'about'],
    ['label' => 'Services',   'path' => 'services/',   'key' => 'services'],
    ['label' => 'Industries', 'path' => 'industries/', 'key' => 'industries'],
    ['label' => 'Projects',   'path' => 'projects/',   'key' => 'projects'],
    ['label' => 'Locations',  'path' => 'locations/',  'key' => 'locations'],
    ['label' => 'Insights',   'path' => 'insights/',   'key' => 'insights'],
    ['label' => 'Contact',    'path' => 'contact/',    'key' => 'contact'],
];
