<?php
declare(strict_types=1);

/* ============================================================
   Service categories.
   Structured so each service can become its own SEO landing page
   (e.g. /uk/services/hvac/) once Rotash confirms it is offered
   in that market. `markets` gates availability per country.
   TODO: confirm the exact service list per market with the client
   before enabling individual service landing pages.
   ============================================================ */

$SERVICES = [
    'hvac' => [
        'id'      => 'hvac',
        'name'    => 'HVAC Systems',
        'short'   => 'Design, supply, installation and commissioning of complete HVAC systems for new build and refurbishment.',
        'markets' => ['uk', 'south-africa'],
    ],
    'air-conditioning' => [
        'id'      => 'air-conditioning',
        'name'    => 'Air Conditioning',
        'short'   => 'Split, multi-split, VRF and packaged cooling solutions specified to the building and its duty.',
        'markets' => ['uk', 'south-africa'],
    ],
    'ventilation' => [
        'id'      => 'ventilation',
        'name'    => 'Ventilation',
        'short'   => 'Supply, extract and mechanical ventilation, including air handling, for occupied and process spaces.',
        'markets' => ['uk', 'south-africa'],
    ],
    'heating-cooling' => [
        'id'      => 'heating-cooling',
        'name'    => 'Heating & Cooling',
        'short'   => 'Heating generation, chillers, heat pumps and balanced comfort systems engineered for the climate they run in.',
        'markets' => ['uk', 'south-africa'],
    ],
    'commercial-refrigeration' => [
        'id'      => 'commercial-refrigeration',
        'name'    => 'Commercial Refrigeration',
        'short'   => 'Walk-in cold rooms, display refrigeration and integrated cold-chain systems for retail and food environments.',
        'markets' => ['south-africa'],
    ],
    'mechanical-services' => [
        'id'      => 'mechanical-services',
        'name'    => 'Mechanical Services',
        'short'   => 'Coordinated building mechanical services — plant, distribution, controls and interfaces with other trades.',
        'markets' => ['uk', 'south-africa'],
    ],
    'maintenance' => [
        'id'      => 'maintenance',
        'name'    => 'HVAC Maintenance',
        'short'   => 'Planned preventative maintenance, fault response and system optimisation across the installed base.',
        'markets' => ['uk', 'south-africa'],
    ],
    'climate-control' => [
        'id'      => 'climate-control',
        'name'    => 'Building Climate Control',
        'short'   => 'Zoned temperature and humidity control with controls integration for stable, efficient environments.',
        'markets' => ['uk', 'south-africa'],
    ],
    'industrial-hvac' => [
        'id'      => 'industrial-hvac',
        'name'    => 'Industrial HVAC',
        'short'   => 'High-duty ventilation, extraction and process climate systems for industrial facilities.',
        'markets' => ['uk', 'south-africa'],
    ],
    'engineering-projects' => [
        'id'      => 'engineering-projects',
        'name'    => 'Engineering Projects',
        'short'   => 'End-to-end project delivery: survey, design development, procurement, installation management and commissioning.',
        'markets' => ['uk', 'south-africa'],
    ],
];
