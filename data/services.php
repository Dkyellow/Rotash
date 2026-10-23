<?php
declare(strict_types=1);

/* ============================================================
   DISCIPLINES — the service structure.

   Three disciplines, not a long list of near-duplicate categories.
   Each discipline carries its own capability detail and the
   markets it is delivered in.

   'markets' gates availability per country. A capability is only
   published in a market the operation actually serves.
   ============================================================ */

$SERVICES = [
    'refrigeration' => [
        'id'        => 'refrigeration',
        'icon'      => 'snowflake',
        'photo'     => '/assets/img/discipline-refrigeration.jpg',
        'alt'       => 'Cold room doors and refrigeration plant inside a refrigerated store',
        'name'      => 'Commercial Refrigeration',
        'nav'       => 'Refrigeration',
        'kind'      => 'principal',
        'summary'   => 'Cold rooms, display refrigeration and cold-chain systems that hold temperature through trading, production and dispatch.',
        'detail'    => 'Refrigeration is the discipline Rotash Power Projects started in and the one it is known for. We design, install, commission and maintain plant that keeps stock sellable and operations running, from a single walk-in freezer to a multi-zone cold store.',
        'markets'   => ['zimbabwe', 'south-africa'],
        'image'     => '/assets/img/hero-cold-rooms.jpg',
        'capabilities' => [
            [
                'name' => 'Walk-in cold rooms and freezers',
                'copy' => 'Panel-built and site-assembled cold rooms sized to the product and throughput, with doors, ramps, drainage, curtains and alarms specified to the operation.',
            ],
            [
                'name' => 'Display refrigeration and counters',
                'copy' => 'Reach-ins, uprights, multidecks, islands and serve-over counters, selected for holding temperature and for how the customer reads the product.',
            ],
            [
                'name' => 'Back-of-house and cold chain',
                'copy' => 'Prep rooms, blast chillers, vacuum-packing areas and dispatch zones that keep the chain intact from goods-in to the shelf.',
            ],
            [
                'name' => 'Industrial cold storage',
                'copy' => 'Capacity and zone design, racking layouts, staging areas, defrost strategy and standby power for stores where stock cannot stop.',
            ],
            [
                'name' => 'Maintenance and breakdown response',
                'copy' => 'Planned service regimes, refrigerant leak management, hygiene control and priority call-out for systems that carry the operation.',
            ],
        ],
    ],

    'air-conditioning' => [
        'id'        => 'air-conditioning',
        'icon'      => 'fan',
        'photo'     => '/assets/img/discipline-air-conditioning.jpg',
        'alt'       => 'Packaged air-conditioning unit installed on a rooftop plant deck',
        'name'      => 'Air Conditioning and Ventilation',
        'nav'       => 'Air conditioning',
        'kind'      => 'principal',
        'summary'   => 'Cooling, heating and fresh-air systems for commercial and industrial buildings, specified to the building, its duty and its running cost.',
        'detail'    => 'Air conditioning is a building-services discipline, so the specification has to answer three questions at once: what the space needs to feel like, what it costs to run, and how the plant will be serviced in five years. We handle that from first survey through to handover documentation and the maintenance regime that follows.',
        'markets'   => ['zimbabwe', 'south-africa', 'uk'],
        'image'     => '/assets/img/hero-air-conditioning.jpg',
        'capabilities' => [
            [
                'name' => 'Split and multi-split systems',
                'copy' => 'Room-by-room and floor-by-floor cooling for offices and commercial buildings, with controls that operators can actually use.',
            ],
            [
                'name' => 'VRF and heat-pump systems',
                'copy' => 'Variable-capacity systems with zoning designed around occupancy rather than around the unit.',
            ],
            [
                'name' => 'Packaged and rooftop plant',
                'copy' => 'Supply, ductwork, condensate handling and structural supports for units installed in working buildings.',
            ],
            [
                'name' => 'Chillers and cooling water',
                'copy' => 'Primary and secondary plant, pumping, controls and water treatment where a chiller is the right answer.',
            ],
            [
                'name' => 'Ventilation and fresh air',
                'copy' => 'Supply, extract and mechanical ventilation with filtration and heat recovery where the space needs controlled air.',
            ],
            [
                'name' => 'Controls and commissioning',
                'copy' => 'Controls integration, testing, balancing and handover records that prove the system does what it was specified to do.',
            ],
        ],
    ],

    'medical-refrigeration' => [
        'id'        => 'medical-refrigeration',
        'icon'      => 'cross',
        'photo'     => '/assets/img/discipline-medical.jpg',
        'alt'       => 'Engineer checking the condition of a refrigeration unit during a service visit',
        'name'      => 'Medical and Pharmaceutical Refrigeration',
        'nav'       => 'Medical refrigeration',
        'kind'      => 'specialist',
        'summary'   => 'Medical refrigerators for clinics and hospitals, with installation, servicing and repairs handled by a specialist team.',
        'detail'    => 'Medical refrigeration is treated as a specialist service rather than a general refrigeration job with a different label. Rotash supports clinics and hospitals with practical installation, servicing and repair work, with the final scope confirmed for each site.',
        'markets'   => ['south-africa'],
        'image'     => '/assets/img/hero-cold-rooms.jpg',
        'capabilities' => [
            [
                'name' => 'Medical refrigerator installation',
                'copy' => 'Installation support for clinics and hospitals, with equipment and site requirements confirmed before work begins.',
            ],
            [
                'name' => 'Servicing and repairs',
                'copy' => 'Planned servicing and repair work for medical refrigerators in operating clinical environments.',
            ],
            [
                'name' => 'Clinic and hospital support',
                'copy' => 'A practical service route for facilities that need medical refrigeration kept available and maintained.',
            ],
            [
                'name' => 'Site-specific requirements',
                'copy' => 'The required equipment, operating conditions and service scope are confirmed with the facility before a proposal is made.',
            ],
            [
                'name' => 'Maintenance planning',
                'copy' => 'Maintenance requirements can be discussed as part of the site enquiry and planned around the facility.',
            ],
            [
                'name' => 'Repair assessment',
                'copy' => 'A repair assessment identifies the equipment condition and the practical next step for the site.',
            ],
            [
                'name' => 'Enquire about support',
                'copy' => 'Tell us the facility, equipment and issue so the right team can scope the work.',
            ],
        ],
    ],
];

/* Discipline order used everywhere: refrigeration and air conditioning are the
   core offer, medical refrigeration is the specialist service alongside them. */
const SERVICE_ORDER = ['refrigeration', 'air-conditioning', 'medical-refrigeration'];

/**
 * Application temperature bands — used to draw the temperature scale.
 * These are the bands the disciplines are routinely specified against.
 */
$TEMP_BANDS = [
    ['label' => 'Deep freeze',        'range' => '−30 °C to −18 °C', 'use' => 'Frozen stock, vaccine deep-freeze',      'tone' => 'deep'],
    ['label' => 'Frozen storage',     'range' => '−18 °C to −12 °C', 'use' => 'Frozen goods, ice cream',              'tone' => 'cold'],
    ['label' => 'Chilled food',       'range' => '0 °C to +5 °C',   'use' => 'Chilled food, fresh produce',          'tone' => 'chill'],
    ['label' => 'Clinical',           'range' => '+2 °C to +8 °C', 'use' => 'Vaccines, pharmacy, blood products',   'tone' => 'clinical'],
    ['label' => 'Controlled room',    'range' => '+15 °C to +25 °C','use' => 'Controlled storage, comfort cooling',  'tone' => 'ambient'],
];
