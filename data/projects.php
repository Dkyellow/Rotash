<?php
declare(strict_types=1);

/* ============================================================
   Project case studies.
   Structure: project / location / client / sector / scope /
   challenge / engineering solution / execution / outcome.

   Integrity rules:
   - `placeholder => true` marks entries awaiting client sign-off.
   - Outcomes are qualitative. No invented metrics, no invented
     client names presented as fact until confirmed.
   - Replace / confirm each record before public launch.
   ============================================================ */

$PROJECTS = [
    [
        'slug'        => 'mainstream-supermarket-refrigeration',
        'title'       => 'Supermarket Refrigeration Programme',
        'market'      => 'south-africa',
        'location'    => 'Queenstown, Eastern Cape',
        'client'      => 'Retail grocery operator',
        'sector'      => 'retail',
        'services'    => ['commercial-refrigeration', 'maintenance'],
        'scope'       => 'Walk-in cold rooms, reach-in display cases and back-of-house cooling.',
        'challenge'   => 'Maintaining product-temperature stability across a trading store while works proceeded around live retail operations.',
        'solution'    => 'Staged installation sequencing, isolated refrigeration circuits and commissioning scheduled outside trading hours.',
        'execution'   => 'Survey, plant selection, installation, vacuum and leak testing, charge optimisation, temperature verification.',
        'outcome'     => 'Continuous cold-chain integrity through the programme, with stable display temperatures handed over to the operator.',
        'image'       => '/assets/img/project1.png',
        'placeholder' => false,
    ],
    [
        'slug'        => 'commercial-hvac-installation',
        'title'       => 'Commercial HVAC Installation',
        'market'      => 'uk',
        'location'    => 'United Kingdom — TO BE CONFIRMED',
        'client'      => 'TO BE CONFIRMED',
        'sector'      => 'commercial-buildings',
        'services'    => ['hvac', 'ventilation', 'engineering-projects'],
        'scope'       => 'HVAC design, installation and commissioning for a commercial premises.',
        'challenge'   => 'Balancing comfort requirements, plant-plant constraints and programme deadlines on a live commercial site.',
        'solution'    => 'Coordinated design development with staged commissioning and clear responsibility across trades.',
        'execution'   => 'Design review, plant procurement, first fix, second fix, balancing and commissioning.',
        'outcome'     => 'Improved environmental control and system efficiency across the served areas.',
        'image'       => '/assets/img/commercial_refrigeration_hero.png',
        'placeholder' => true,
    ],
    [
        'slug'        => 'cold-storage-facility',
        'title'       => 'Industrial Cold Storage Upgrade',
        'market'      => 'south-africa',
        'location'    => 'Eastern Cape — TO BE CONFIRMED',
        'client'      => 'TO BE CONFIRMED',
        'sector'      => 'industrial-facilities',
        'services'    => ['commercial-refrigeration', 'engineering-projects'],
        'scope'       => 'Large-scale cold storage with monitored temperature zones.',
        'challenge'   => 'Upgrading refrigeration capacity without interrupting stored stock or dispatch operations.',
        'solution'    => 'Phased circuit replacement with redundant capacity maintained throughout the works.',
        'execution'   => 'Plant audit, load calculation, phased cutovers, controls integration, verification testing.',
        'outcome'     => 'Increased refrigeration resilience with continuous temperature monitoring in place.',
        'image'       => '/assets/img/project1.png',
        'placeholder' => true,
    ],
    [
        'slug'        => 'hospitality-hvac-maintenance',
        'title'       => 'Hospitality HVAC & Refrigeration Maintenance',
        'market'      => 'south-africa',
        'location'    => 'East London, Eastern Cape',
        'client'      => 'TO BE CONFIRMED',
        'sector'      => 'hospitality',
        'services'    => ['maintenance', 'air-conditioning', 'commercial-refrigeration'],
        'scope'       => 'Planned maintenance across guest-facing climate systems and kitchen refrigeration.',
        'challenge'   => 'Keeping guest comfort and kitchen cold storage reliable through peak seasonal demand.',
        'solution'    => 'Scheduled servicing regime with priority fault response and documented asset register.',
        'execution'   => 'Asset survey, service calendar, filter and coil maintenance, refrigerant checks, performance reporting.',
        'outcome'     => 'Fewer unplanned breakdowns and a documented maintenance history for the operator.',
        'image'       => '/assets/img/commercial_refrigeration_hero.png',
        'placeholder' => true,
    ],
    [
        'slug'        => 'office-climate-control-retrofit',
        'title'       => 'Office Climate Control Retrofit',
        'market'      => 'uk',
        'location'    => 'United Kingdom — TO BE CONFIRMED',
        'client'      => 'TO BE CONFIRMED',
        'sector'      => 'offices',
        'services'    => ['air-conditioning', 'climate-control', 'mechanical-services'],
        'scope'       => 'Zoned cooling and controls retrofit in an occupied office building.',
        'challenge'   => 'Modernising environmental control with minimal disruption to occupied floors.',
        'solution'    => 'Floor-by-floor phasing with out-of-hours works and zone-by-zone commissioning.',
        'execution'   => 'Survey, controls strategy, plant replacement, zoning works, handover training.',
        'outcome'     => 'More stable zone temperatures and simpler building operation for the facilities team.',
        'image'       => '/assets/img/commercial_refrigeration_hero.png',
        'placeholder' => true,
    ],
];
