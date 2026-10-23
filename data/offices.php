<?php
declare(strict_types=1);

/* ============================================================
   OFFICES AND CONTACT POINTS.

   Integrity rules:
   - Nothing is published that has not been confirmed. Where a
     market's local details are still outstanding the record is
     flagged 'pending' and the site says enquiries are handled by
     the group team instead of printing a placeholder number.
   - Offices, phone, email, hours and geo are held per market and
     are never merged across borders.
   ============================================================ */

$OFFICES = [
    'global' => [
        'market_code'   => 'global',
        'market_prefix' => '/',
        'name'          => 'Rotash Power Projects, Group',
        'country_code'  => 'ZW',
        'phone'         => '+27 78 727 9721',
        'email'         => 'rodney@rotashpowerprojects.com',
        'whatsapp'      => '27787279721',
        'hours_label'   => 'Mon - Fri, 08:00 - 17:00 (SAST)',
        'hours_schema'  => 'Mo-Fr 08:00-17:00',
        'locations'     => [],
        'geo'           => null,
        'service_areas' => ['Zimbabwe', 'South Africa', 'United Kingdom'],
        'pending'       => false,
        'note'          => 'Group enquiries are handled centrally and routed to the team for your country.',
    ],

    'zimbabwe' => [
        'market_code'   => 'zimbabwe',
        'market_prefix' => '/zimbabwe/',
        'name'          => 'Rotash Power Projects, Zimbabwe',
        'country_code'  => 'ZW',
        'phone'         => '',
        'email'         => '',
        'whatsapp'      => '',
        'hours_label'   => '',
        'hours_schema'  => '',
        'locations'     => [
            [
                'city'    => 'Harare',
                'region'  => 'Zimbabwe',
                'address' => '',
            ],
        ],
        'geo'           => null,
        'service_areas' => ['Zimbabwe'],
        'pending'       => true,
        'note'          => 'Zimbabwe office details are being confirmed. Enquiries are handled by the group team meanwhile. Tell us the requirement and it will reach the right people.',
    ],

    'south-africa' => [
        'market_code'   => 'south-africa',
        'market_prefix' => '/south-africa/',
        'name'          => 'Rotash Power Projects, South Africa',
        'country_code'  => 'ZA',
        'phone'         => '+27 78 727 9721',
        'email'         => 'admin@rotash.co.za',
        'whatsapp'      => '27787279721',
        'hours_label'   => 'Mon - Fri, 08:00 - 17:00 (SAST)',
        'hours_schema'  => 'Mo-Fr 08:00-17:00',
        'locations'     => [
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
        'geo'           => ['lat' => -31.897, 'lng' => 26.863],
        'service_areas' => ['Eastern Cape', 'South Africa'],
        'pending'       => false,
        'note'          => 'Three offices across the Eastern Cape, covering the region and beyond.',
    ],

    'uk' => [
        'market_code'   => 'uk',
        'market_prefix' => '/uk/',
        'name'          => 'Rotash Power Projects, United Kingdom',
        'country_code'  => 'GB',
        'phone'         => '',
        'email'         => '',
        'whatsapp'      => '',
        'hours_label'   => '',
        'hours_schema'  => '',
        'locations'     => [],
        'geo'           => null,
        'service_areas' => ['United Kingdom'],
        'pending'       => true,
        'note'          => 'The UK operation delivers air conditioning and building services. Local office details are being confirmed. Enquiries are handled by the group team meanwhile.',
    ],
];

/**
     * Group contact point, used wherever a market has no confirmed
 * local details of its own. Never a placeholder number: these are
 * the company's real published contact routes.
 */
const GROUP_CONTACT = [
    'phone'    => '+27 78 727 9721',
    'email'    => 'rodney@rotashpowerprojects.com',
    'whatsapp' => '27787279721',
    'hours'    => 'Mon - Fri, 08:00 - 17:00 (SAST)',
];
