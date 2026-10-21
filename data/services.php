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
        'name'      => 'Commercial Refrigeration',
        'nav'       => 'Refrigeration',
        'kind'      => 'principal',
        'summary'   => 'Cold rooms, display refrigeration and cold-chain systems that hold temperature through trading, production and dispatch.',
        'detail'    => 'Refrigeration is the discipline Rotash Power Projects started in and the one it is known for. We design, install, commission and maintain the plant that keeps stock sellable and operations running — from a single walk-in freezer to a multi-zone cold store with redundant capacity and monitored alarms.',
        'markets'   => ['zimbabwe', 'south-africa', 'uk'],
        'image'     => '/assets/img/hero-cold-rooms.jpg',
        'capabilities' => [
            [
                'name' => 'Walk-in cold rooms and freezers',
                'copy' => 'Panel-built and site-assembled cold rooms sized to the product and the throughput — with doors, ramps, drainage, curtains and alarms specified to the operation.',
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
        'name'      => 'Air Conditioning and Ventilation',
        'nav'       => 'Air conditioning',
        'kind'      => 'principal',
        'summary'   => 'Cooling, heating and fresh-air systems for commercial and industrial buildings — specified to the building, its duty and its running cost.',
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
        'name'      => 'Medical and Pharmaceutical Refrigeration',
        'nav'       => 'Medical refrigeration',
        'kind'      => 'specialist',
        'summary'   => 'Clinical cold chain — pharmacy, vaccine, blood product and mortuary storage, with monitoring, mapping and documented temperature control.',
        'detail'    => 'Medical refrigeration is a specialist service, not a general refrigeration job with a different label. The consequence of a temperature excursion is measured in a patient outcome or a wasted batch of vaccine, so the control regime matters as much as the plant. We build clinical cold chain around the temperature the product must hold, the monitoring and alarm strategy that protects it, and the documentation the site has to keep.',
        'markets'   => ['zimbabwe', 'south-africa', 'uk'],
        'image'     => '/assets/img/hero-cold-rooms.jpg',
        'capabilities' => [
            [
                'name' => 'Pharmacy and vaccine refrigeration',
                'copy' => 'Purpose-built units for the +2 °C to +8 °C range, with loading, air circulation and defrost behaviour considered for the product stored.',
            ],
            [
                'name' => 'Blood bank and blood product storage',
                'copy' => 'Storage in the +2 °C to +6 °C range, with capacity that holds the buffer a transfusion service needs between deliveries.',
            ],
            [
                'name' => 'Mortuary and body storage',
                'copy' => 'Body refrigeration and holding cabinets, with temperature stability and access considered around operational and dignity requirements.',
            ],
            [
                'name' => 'Ultra-low and monitored storage',
                'copy' => 'Minus 20 °C and minus 80 °C storage where a product requires it, with load monitoring and capacity for pull-down.',
            ],
            [
                'name' => 'Outreach cold chain',
                'copy' => 'Solar-direct refrigerators, ice-lined freezers and cold boxes for sites without continuous power.',
            ],
            [
                'name' => 'Monitoring, alarms and mapping',
                'copy' => 'Continuous data logging with alarm escalation to the right people, plus temperature mapping to demonstrate the working range is held.',
            ],
            [
                'name' => 'Service and emergency response',
                'copy' => 'Documented service visits, temperature logs for every unit under our care, and a response route when a cold chain is at risk.',
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
