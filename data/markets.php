<?php
declare(strict_types=1);

/* ============================================================
   MARKET COPY, the genuinely local content.

   Structure, layout and method are shared between markets through
   the components in includes/sections. What differs is the local
   story, the emphasis, and the imagery.
   ============================================================ */

$MARKET_CONTENT = [

    'south-africa' => [
        'hero' => [
            'image' => '/assets/img/hero-cold-rooms.jpg',
            'alt'   => 'Cold room doors in a refrigerated storage facility lit in blue',
            'eyebrow' => 'Rotash Power Projects · South Africa',
            'title' => 'Commercial refrigeration and cooling<br>in the Eastern Cape.',
            'lede'  => 'Commercial refrigeration, air conditioning and medical cold chain for retail, hospitality, healthcare and industrial operations. Delivered from three offices in the Eastern Cape and held to one group engineering standard.',
            'actions' => [
                ['label' => 'Request a consultation', 'href' => '/south-africa/contact/', 'style' => 'primary'],
                ['label' => 'South Africa services', 'href' => '/south-africa/services/', 'style' => 'on-dark'],
            ],
            'strip' => [
                'label' => 'Operations',
                'items' => [
                    ['label' => 'Queenstown (Komani)'],
                    ['label' => 'East London'],
                    ['label' => 'Mthatha'],
                ],
            ],
        ],
        'intro' => [
            'eyebrow' => 'The South African operation',
            'title'   => 'Built on cold-chain reality',
            'paragraphs' => [
                'The South African operation runs from the Eastern Cape, with teams in Queenstown, East London and Mthatha. The work started in commercial refrigeration, including cold rooms, display cases and the systems that keep stock sellable, and grew from there into full climate and medical services.',
                'That background shapes everything. Temperature stability, plant reliability and maintenance access are not features of the job; they are the job. A supermarket that loses trading for an afternoon, a pharmacy that loses a batch of vaccine and a hospital with a failed cold room all fail in the same way.',
                'Retail floors, hotel kitchens, clinics, warehouses and offices get the same treatment: survey the real duty first, engineer to it, install around the operation, and prove performance before anything is signed off.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in South Africa',
            'copy'  => 'Commercial refrigeration leads the South African operation, with air conditioning and medical cold chain delivered by the same teams. A store, a clinic and a plant room can be covered by one contract.',
        ],
        'services_note' => 'Both principal disciplines and the medical cold chain service are delivered by the South African teams directly.',
        'facts' => [
            ['value' => '3',       'label' => 'Offices',    'note' => 'Queenstown, East London and Mthatha', 'icon' => 'pin'],
            ['value' => 'Cold',    'label' => 'Chain core', 'note' => 'Commercial refrigeration and medical cold chain', 'icon' => 'snowflake'],
            ['value' => 'Direct',  'label' => 'Contracting', 'note' => 'Appointed by clients, main contractors and manufacturers', 'icon' => 'users'],
            ['value' => '4-stage', 'label' => 'Delivery',   'note' => 'Survey, specification, installation, maintenance', 'icon' => 'ruler'],
        ],
        'coverage' => [
            'title' => 'Coverage',
            'items' => [
                'Eastern Cape: Queenstown, East London and Mthatha offices',
                'South Africa: commercial refrigeration, air conditioning and medical cold chain',
                'Group routes: enquiries outside the local area are handled centrally',
            ],
        ],
    ],

    'zimbabwe' => [
        'hero' => [
            'image' => '/assets/img/hero-condenser.jpg',
            'alt'   => 'Engineer inspecting the condenser unit of a commercial air-conditioning system',
            'eyebrow' => 'Rotash Power Projects · Zimbabwe',
            'title' => 'Refrigeration and air conditioning<br>for Harare, Zimbabwe.',
            'lede'  => 'Refrigeration and air conditioning support for Harare and Zimbabwean facilities, with the exact service scope confirmed for each enquiry.',
            'actions' => [
                ['label' => 'Request a consultation', 'href' => '/zimbabwe/contact/', 'style' => 'primary'],
                ['label' => 'Zimbabwe services', 'href' => '/zimbabwe/services/', 'style' => 'on-dark'],
            ],
            'strip' => [
                'label' => 'This site',
                'items' => [
                    ['label' => 'Harare, Zimbabwe'],
                    ['label' => 'Part of ' . PARENT_GROUP],
                    ['label' => 'Refrigeration · Air conditioning · Cold chain'],
                ],
            ],
        ],
        'intro' => [
            'eyebrow' => 'The Zimbabwe operation',
            'title'   => 'Engineered for the conditions on the ground',
            'paragraphs' => [
                'Rotash Power Projects receives Zimbabwe enquiries through the group contact route, with Harare identified as the local market reference. The team confirms the facility, service requirement and practical scope before work is proposed.',
                'That keeps the first conversation useful without implying a local office, universal availability or a service commitment that has not been confirmed for the specific site.',
                'The same engineering approach applies: understand the duty, specify to it, install or repair to the agreed scope, and explain the next step clearly.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in Zimbabwe',
            'copy'  => 'Refrigeration and air conditioning enquiries in Zimbabwe are assessed by the group team and routed according to the confirmed project scope.',
        ],
        'services_note' => 'Zimbabwe enquiries are routed through the group team and the service scope is confirmed before work is proposed.',
        'facts' => [
            ['value' => 'Harare',  'label' => 'Base',       'note' => 'Zimbabwe operations and enquiries', 'icon' => 'pin'],
            ['value' => 'Cold',    'label' => 'Chain core', 'note' => 'Refrigeration and medical cold chain', 'icon' => 'snowflake'],
            ['value' => 'Direct',  'label' => 'Contracting', 'note' => 'Appointed by clients, main contractors and manufacturers', 'icon' => 'users'],
            ['value' => '4-stage', 'label' => 'Delivery',   'note' => 'Survey, specification, installation, maintenance', 'icon' => 'ruler'],
        ],
        'coverage' => [
            'title' => 'Coverage',
            'items' => [
                'Harare and Zimbabwe: refrigeration and air conditioning enquiries',
                'Project scope: confirmed with the facility before a service is proposed',
                'Group route: enquiries are handled centrally while local contact details remain under confirmation',
            ],
        ],
    ],

    'uk' => [
        'hero' => [
            'image' => '/assets/img/commercial-buildings.jpg',
            'alt'   => 'Glass commercial office buildings viewed from street level',
            'eyebrow' => 'Rotash Power Projects · United Kingdom',
            'title' => 'Air conditioning and building services<br>for UK sites.',
            'lede'  => 'Air conditioning, ventilation and building-services enquiries for UK commercial and industrial buildings, with service availability confirmed for each project.',
            'actions' => [
                ['label' => 'Request a consultation', 'href' => '/uk/contact/', 'style' => 'primary'],
                ['label' => 'UK services', 'href' => '/uk/services/', 'style' => 'on-dark'],
            ],
            'strip' => [
                'label' => 'This site',
                'items' => [
                    ['label' => 'United Kingdom · en-GB'],
                    ['label' => 'Part of ' . PARENT_GROUP],
                    ['label' => 'Air conditioning · Ventilation · Maintenance'],
                ],
            ],
        ],
        'intro' => [
            'eyebrow' => 'The UK operation',
            'title'   => 'Building services engineering, delivered locally',
            'paragraphs' => [
                'UK enquiries are assessed against the confirmed service scope, project location and contact arrangement. The public site does not claim a UK office or nationwide coverage.',
                'Where a project is suitable, the requirement can be discussed from survey and system design through installation, commissioning and planned maintenance.',
                'The team confirms the building, access, programme and responsibility split before publishing a project-specific proposal.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in the UK',
            'copy'  => 'Air conditioning and ventilation are the UK-facing capabilities described on this site; availability, service area and project scope are confirmed through enquiry.',
        ],
        'services_note' => 'UK service availability and routing are confirmed for each project before work is proposed.',
        'facts' => [
            ['value' => 'UK',      'label' => 'Market',     'note' => 'Air conditioning, ventilation and building services', 'icon' => 'globe'],
            ['value' => 'Live',    'label' => 'Buildings', 'note' => 'Phased around occupied premises', 'icon' => 'building'],
            ['value' => 'Direct',  'label' => 'Contracting', 'note' => 'Appointed by clients, main contractors and manufacturers', 'icon' => 'users'],
            ['value' => '4-stage', 'label' => 'Delivery',   'note' => 'Survey, specification, installation, maintenance', 'icon' => 'ruler'],
        ],
        'coverage' => [
            'title' => 'Coverage',
            'items' => [
                'United Kingdom: air conditioning, ventilation and building-services enquiries',
                'Service area and project scope: confirmed before proposal',
                'Group route: local UK contact details remain under confirmation',
            ],
        ],
    ],
];
