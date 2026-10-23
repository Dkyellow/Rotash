<?php
declare(strict_types=1);

/* ============================================================
   CASE STUDIES.

   Integrity rules:
   - 'placeholder => true' marks a record awaiting client sign-off.
     Placeholder records are never rendered on the live site.
   - Outcomes are qualitative. No invented metrics, no invented
     client names presented as fact.
   - Photographs are not used as project evidence. Case studies
     are presented as technical records with a drawn schematic.
   - Publish a record by filling in location and client, then
     setting 'placeholder' => false.
   ============================================================ */

$PROJECTS = [
    [
        'slug'      => 'supermarket-refrigeration',
        'title'     => 'Supermarket refrigeration programme',
        'market'    => 'south-africa',
        'location'  => 'Queenstown, Eastern Cape',
        'client'    => 'Retail grocery operator',
        'sector'    => 'retail',
        'services'  => ['refrigeration'],
        'graphic'   => 'cold-room',
        'scope'     => 'Walk-in cold rooms, reach-in display cases and back-of-house cooling for a trading grocery store.',
        'challenge' => 'Product temperature had to be held while installation was carried out around live retail operations. The store kept trading throughout.',
        'solution'  => 'Staged installation sequencing with isolated refrigeration circuits, and commissioning scheduled outside trading hours so no product was exposed to an open system.',
        'execution' => 'Site survey, plant selection, installation, vacuum and leak testing, charge optimisation and temperature verification against the required range.',
        'outcome'   => 'Continuous cold-chain integrity through the works, with stable display temperatures verified and handed over to the operator.',
        'placeholder' => false,
    ],
    [
        'slug'      => 'commercial-hvac-installation',
        'title'     => 'Commercial HVAC installation',
        'market'    => 'uk',
        'location'  => '',
        'client'    => '',
        'sector'    => 'commercial',
        'services'  => ['air-conditioning'],
        'graphic'   => 'air-handling',
        'scope'     => 'Air-conditioning design, installation and commissioning for a commercial building.',
        'challenge' => 'Balancing comfort requirements, plant constraints and programme deadlines on a building that stayed open.',
        'solution'  => 'Coordinated design development with staged commissioning and clear responsibility across trades.',
        'execution' => 'Design review, plant procurement, first fix, second fix, balancing and commissioning.',
        'outcome'   => 'Environmental control established across the served areas and handed over with documentation.',
        'needs'     => 'Location, client and client sign-off before publication.',
        'placeholder' => true,
    ],
    [
        'slug'      => 'cold-storage-upgrade',
        'title'     => 'Cold storage capacity upgrade',
        'market'    => 'south-africa',
        'location'  => '',
        'client'    => '',
        'sector'    => 'industrial',
        'services'  => ['refrigeration'],
        'graphic'   => 'cold-room',
        'scope'     => 'Large-scale cold storage with monitored temperature zones.',
        'challenge' => 'Upgrading refrigeration capacity without interrupting stored stock or dispatch operations.',
        'solution'  => 'Phased circuit replacement with redundant capacity maintained throughout the works.',
        'execution' => 'Plant audit, load calculation, phased cutovers, controls integration and verification testing.',
        'outcome'   => 'Refrigeration resilience increased, with continuous temperature monitoring in place.',
        'needs'     => 'Location, client and client sign-off before publication.',
        'placeholder' => true,
    ],
    [
        'slug'      => 'clinical-cold-chain',
        'title'     => 'Clinical cold chain installation',
        'market'    => 'zimbabwe',
        'location'  => '',
        'client'    => '',
        'sector'    => 'healthcare',
        'services'  => ['medical-refrigeration'],
        'graphic'   => 'cold-chain',
        'scope'     => 'Medical refrigeration with continuous monitoring for a healthcare facility.',
        'challenge' => 'Holding a defined clinical temperature range with an audit trail, in a facility with intermittent supply.',
        'solution'  => 'Units selected for the required range, supported by data logging with alarm escalation and a documented service regime.',
        'execution' => 'Survey, specification, installation, mapping, alarm configuration and operator handover.',
        'outcome'   => 'A monitored cold chain with documented temperature records and a service schedule in place.',
        'needs'     => 'Location, client and client sign-off before publication.',
        'placeholder' => true,
    ],
    [
        'slug'      => 'hospitality-maintenance',
        'title'     => 'Hospitality refrigeration and HVAC maintenance',
        'market'    => 'south-africa',
        'location'  => '',
        'client'    => '',
        'sector'    => 'hospitality',
        'services'  => ['refrigeration', 'air-conditioning'],
        'graphic'   => 'air-handling',
        'scope'     => 'Planned maintenance across guest-facing climate systems and kitchen refrigeration.',
        'challenge' => 'Keeping guest comfort and kitchen cold storage reliable through peak seasonal demand.',
        'solution'  => 'A scheduled servicing regime with priority fault response and a documented asset register.',
        'execution' => 'Asset survey, service calendar, filter and coil maintenance, refrigerant checks and performance reporting.',
        'outcome'   => 'Fewer unplanned breakdowns and a documented maintenance history for the operator.',
        'needs'     => 'Location, client and client sign-off before publication.',
        'placeholder' => true,
    ],
];
