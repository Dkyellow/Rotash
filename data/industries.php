<?php
declare(strict_types=1);

/* ============================================================
   Industry / sector structure.
   Sectors are capability areas, not claims of certification.
   `markets` gates which country pages present the sector.
   TODO: confirm with Rotash which sectors are genuinely served
   in each market before enabling sector-specific landing pages.
   ============================================================ */

$INDUSTRIES = [
    'commercial-buildings' => [
        'id'      => 'commercial-buildings',
        'name'    => 'Commercial Buildings',
        'short'   => 'Comfort, air quality and energy performance for offices, mixed-use and commercial developments.',
        'markets' => ['uk', 'south-africa'],
    ],
    'retail' => [
        'id'      => 'retail',
        'name'    => 'Retail',
        'short'   => 'Store climate, back-of-house cooling and display refrigeration for retail environments.',
        'markets' => ['uk', 'south-africa'],
    ],
    'hospitality' => [
        'id'      => 'hospitality',
        'name'    => 'Hospitality',
        'short'   => 'Guest-comfort systems for hotels and venues, engineered for quiet, stable operation.',
        'markets' => ['uk', 'south-africa'],
    ],
    'industrial-facilities' => [
        'id'      => 'industrial-facilities',
        'name'    => 'Industrial Facilities',
        'short'   => 'Process and occupancy climate control for plants, warehouses and industrial operations.',
        'markets' => ['uk', 'south-africa'],
    ],
    'healthcare' => [
        'id'      => 'healthcare',
        'name'    => 'Healthcare',
        'short'   => 'Controlled environments where ventilation, pressure regimes and reliability are critical.',
        'markets' => ['uk', 'south-africa'],
    ],
    'offices' => [
        'id'      => 'offices',
        'name'    => 'Offices',
        'short'   => 'Workplace comfort and efficient plant for corporate and multi-tenant office space.',
        'markets' => ['uk', 'south-africa'],
    ],
    'residential-developments' => [
        'id'      => 'residential-developments',
        'name'    => 'Residential Developments',
        'short'   => 'Communal and apartment climate systems designed for comfort, control and running cost.',
        'markets' => ['uk', 'south-africa'],
    ],
    'education' => [
        'id'      => 'education',
        'name'    => 'Education',
        'short'   => 'Ventilation and comfort systems for schools, campuses and training facilities.',
        'markets' => ['uk', 'south-africa'],
    ],
    'data-centres' => [
        'id'      => 'data-centres',
        'name'    => 'Data Centres',
        'short'   => 'Precision cooling and resilient environmental control for critical loads.',
        'markets' => ['uk'],
    ],
    'manufacturing' => [
        'id'      => 'manufacturing',
        'name'    => 'Manufacturing',
        'short'   => 'Extraction, comfort and process air systems for manufacturing environments.',
        'markets' => ['south-africa'],
    ],
];
