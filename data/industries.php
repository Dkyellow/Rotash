<?php
declare(strict_types=1);

/* ============================================================
   SECTORS, the industries the work is done for.

   A sector is a description of the demand, not a certification
   claim. 'markets' gates which country pages present the sector.
   'demands' states what the sector actually requires from a
   cooling system, so the page reads as engineering rather than
   as a list of labels.
   ============================================================ */

$INDUSTRIES = [
    'retail' => [
        'id'      => 'retail',
        'icon'    => 'cart',
        'photo'   => '/assets/img/sector-retail.jpg',
        'alt'     => 'Cold room doors in a blue-lit refrigerated store',
        'name'    => 'Retail and food service',
        'summary' => 'Supermarkets, food stores and food-service operations where product temperature and trading hours decide the specification.',
        'demands' => [
            'Product temperature held through trading, not just overnight',
            'Plant installed around a live shop floor',
            'Display units that sell, not just that hold cold',
        ],
        'markets' => ['zimbabwe', 'south-africa'],
    ],
    'healthcare' => [
        'id'      => 'healthcare',
        'icon'    => 'pulse',
        'photo'   => '/assets/img/sector-healthcare.jpg',
        'alt'     => 'Engineer inspecting a refrigeration unit during a monitored service visit',
        'name'    => 'Healthcare and clinical',
        'summary' => 'Pharmacies, clinics, laboratories and cold-chain facilities where a temperature excursion has a clinical consequence.',
        'demands' => [
            'Defined temperature bands with monitoring and alarm escalation',
            'Documented temperature records and mapping',
            'Continuity of supply and stock on critical medicines',
        ],
        'markets' => ['zimbabwe', 'south-africa'],
    ],
    'hospitality' => [
        'id'      => 'hospitality',
        'icon'    => 'bed',
        'photo'   => '/assets/img/sector-hospitality.jpg',
        'alt'     => 'Guest terrace and pool at a lodge',
        'name'    => 'Hospitality',
        'summary' => 'Hotels, lodges, restaurants and venues running kitchen refrigeration, cold stores and guest comfort on the same clock.',
        'demands' => [
            'Kitchen and cold-storage refrigeration that survives peak service',
            'Quiet plant and discreet plant locations',
            'Comfort systems that hold temperature through occupancy',
        ],
        'markets' => ['zimbabwe', 'south-africa'],
    ],
    'industrial' => [
        'id'      => 'industrial',
        'icon'    => 'boxes',
        'photo'   => '/assets/img/sector-industrial.jpg',
        'alt'     => 'Racked storage aisles inside a distribution warehouse',
        'name'    => 'Industrial and logistics',
        'summary' => 'Cold stores, warehouses, processing and logistics operations where stock and dispatch cannot stop for a breakdown.',
        'demands' => [
            'Capacity and redundancy designed around real throughput',
            'Phased cutovers that keep stock and dispatch moving',
            'Plants that can be serviced without stopping the operation',
        ],
        'markets' => ['zimbabwe', 'south-africa'],
    ],
    'commercial' => [
        'id'      => 'commercial',
        'icon'    => 'building',
        'photo'   => '/assets/img/sector-commercial.jpg',
        'alt'     => 'Interior of a modern office building with a central corridor',
        'name'    => 'Commercial buildings',
        'summary' => 'Offices, mixed-use developments and commercial buildings judged on comfort, running cost and the value of the space.',
        'demands' => [
            'Comfort and air quality people accept',
            'Running costs the operator can defend',
            'Works phased around a building that stays open',
        ],
        'markets' => ['zimbabwe', 'south-africa', 'uk'],
    ],
    'education' => [
        'id'      => 'education',
        'icon'    => 'cap',
        'photo'   => '/assets/img/sector-education.jpg',
        'alt'     => 'Engineers working on a building site during construction',
        'name'    => 'Education and public sector',
        'summary' => 'Schools, campuses and public buildings where ventilation, comfort and value are judged against a public budget.',
        'demands' => [
            'Ventilation performance that is demonstrable',
            'Durable, serviceable equipment in public buildings',
            'Value for money over a long maintenance cycle',
        ],
        'markets' => ['zimbabwe', 'south-africa', 'uk'],
    ],
];
