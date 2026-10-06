<?php
declare(strict_types=1);

/* ============================================================
   Market office data — one LocalBusiness block per market.
   South Africa details are the company's published contact data.
   United Kingdom fields are flagged TODO until supplied:
   DO NOT publish fabricated addresses, phones or registrations.
   ============================================================ */

$OFFICES = [

    'global' => [
        'market_code'    => 'global',
        'market_prefix'  => '/',
        'name'           => 'Rotash Power Projects',
        'country_code'   => 'GB', // registered web presence; physical HQ TODO
        'phone'          => '+27 78 727 9721',
        'email'          => 'admin@rotash.co.za',
        'whatsapp'       => '27787279721',
        'hours_label'    => 'Mon – Fri, 08:00 – 17:00 (SAST)',
        'hours_schema'   => 'Mo-Fr 08:00-17:00',
        'locations'      => [],
        'geo'            => null,
        'service_areas'  => ['United Kingdom', 'South Africa'],
        'todo'           => 'Group headquarters address and main switchboard — TO BE SUPPLIED',
    ],

    'uk' => [
        'market_code'    => 'uk',
        'market_prefix'  => '/uk/',
        'name'           => 'Rotash Power Projects — United Kingdom',
        'country_code'   => 'GB',
        // TODO(UK): verified UK phone, email, registered office address, hours.
        'phone'          => '+44 (0) 0000 000 000',
        'email'          => 'uk@rotashpowerprojects.com',
        'whatsapp'       => '',
        'hours_label'    => 'Mon – Fri, 09:00 – 17:30 (GMT/BST)',
        'hours_schema'   => 'Mo-Fr 09:00-17:30',
        'locations'      => [
            [
                'city'    => 'United Kingdom',
                'region'  => '',
                'address' => 'UK office address — TO BE SUPPLIED',
                'todo'    => 'Full UK postal address, unit/building name — required before launch',
            ],
        ],
        'geo'            => null,
        'service_areas'  => ['United Kingdom'],
    ],

    'south-africa' => [
        'market_code'    => 'south-africa',
        'market_prefix'  => '/south-africa/',
        'name'           => 'Rotash Power Projects — South Africa',
        'country_code'   => 'ZA',
        'phone'          => '+27 78 727 9721',
        'email'          => 'admin@rotash.co.za',
        'whatsapp'       => '27787279721',
        'hours_label'    => 'Mon – Fri, 08:00 – 17:00 (SAST)',
        'hours_schema'   => 'Mo-Fr 08:00-17:00',
        'locations'      => [
            [
                'city'    => 'Queenstown (Komani)',
                'region'  => 'Eastern Cape',
                'address' => '10 Dunbar Place, Queenstown, 5320',
            ],
            [
                'city'    => 'East London',
                'region'  => 'Eastern Cape',
                'address' => '45631 Stenjana Roji Road, Brealyn Extension 10, East London',
            ],
            [
                'city'    => 'Mthatha',
                'region'  => 'Eastern Cape',
                'address' => '2 Ngani Street, Ikwezi, Mthatha',
            ],
        ],
        'geo'            => ['lat' => -31.897, 'lng' => 26.863],
        'service_areas'  => ['Eastern Cape', 'South Africa'],
    ],
];
