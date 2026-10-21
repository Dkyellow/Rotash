<?php
declare(strict_types=1);

/* ============================================================
   MARKET COPY — the genuinely local content.

   Structure, layout and method are shared between markets through
   the components in includes/sections. What differs — the local
   story, the emphasis, the imagery — lives here.
   ============================================================ */

$MARKET_CONTENT = [

    'south-africa' => [
        'hero' => [
            'image' => '/assets/img/hero-cold-rooms.jpg',
            'alt'   => 'Cold room doors in a refrigerated storage facility lit in blue',
            'eyebrow' => 'Rotash Power Projects · South Africa',
            'title' => 'Refrigeration and air conditioning<br>across South Africa.',
            'lede'  => 'Commercial refrigeration, air conditioning and medical cold chain for retail, hospitality, healthcare and industrial operations — delivered from three offices in the Eastern Cape and held to one group engineering standard.',
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
                'The South African operation runs from the Eastern Cape, with teams in Queenstown, East London and Mthatha. The work started in commercial refrigeration — cold rooms, display cases and the systems that keep stock sellable — and grew from there into full climate and medical services.',
                'That background shapes everything. Temperature stability, plant reliability and maintenance access are not features of the job; they are the job. A supermarket that loses trading for an afternoon, a pharmacy that loses a batch of vaccine and a hospital with a failed cold room all fail in the same way.',
                'Retail floors, hotel kitchens, clinics, warehouses and offices get the same treatment: survey the real duty first, engineer to it, install around the operation, and prove performance before anything is signed off.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in South Africa',
            'copy'  => 'Commercial refrigeration leads the South African operation, with air conditioning and medical cold chain delivered by the same teams — so a store, a clinic and a plant room can be covered by one contract.',
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
                'Eastern Cape — Queenstown, East London and Mthatha offices',
                'South Africa — commercial refrigeration, air conditioning and medical cold chain',
                'Group routes — enquiries outside the local area are handled centrally',
            ],
        ],
    ],

    'zimbabwe' => [
        'hero' => [
            'image' => '/assets/img/hero-condenser.jpg',
            'alt'   => 'Engineer inspecting the condenser unit of a commercial air-conditioning system',
            'eyebrow' => 'Rotash Power Projects · Zimbabwe',
            'title' => 'Refrigeration and cold chain<br>for Zimbabwe.',
            'lede'  => 'Commercial refrigeration, medical cold chain and air conditioning for retail, healthcare, hospitality and industrial operations — engineered for the supply and power conditions the country actually runs on.',
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
                'Zimbabwe is where the business started, and the operating reality is part of the specification: ambient heat, load-shedding interruptions, long supply chains for parts, and facilities where a cold chain cannot be allowed to fail quietly.',
                'That drives how systems are specified here. Capacity is sized for real ambient conditions, monitoring and alarm escalation are built in rather than added later, and plant is selected with maintainability and spares availability in mind — because the next service visit may be a long drive.',
                'The same engineering standard applies as everywhere else in the group: survey the duty, specify to it, install to the drawing, prove performance, and hand over documentation the operator can use.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in Zimbabwe',
            'copy'  => 'Refrigeration and medical cold chain lead the Zimbabwe operation, with air conditioning and ventilation for commercial and industrial buildings delivered by the same team.',
        ],
        'services_note' => 'Refrigeration, medical cold chain and air conditioning are all delivered by the Zimbabwe team.',
        'facts' => [
            ['value' => 'Harare',  'label' => 'Base',       'note' => 'Zimbabwe operations and enquiries', 'icon' => 'pin'],
            ['value' => 'Cold',    'label' => 'Chain core', 'note' => 'Refrigeration and medical cold chain', 'icon' => 'snowflake'],
            ['value' => 'Direct',  'label' => 'Contracting', 'note' => 'Appointed by clients, main contractors and manufacturers', 'icon' => 'users'],
            ['value' => '4-stage', 'label' => 'Delivery',   'note' => 'Survey, specification, installation, maintenance', 'icon' => 'ruler'],
        ],
        'coverage' => [
            'title' => 'Coverage',
            'items' => [
                'Zimbabwe — refrigeration, medical cold chain and air conditioning',
                'Medical cold chain — pharmacy, vaccine, blood product and mortuary storage',
                'Group routes — the group desk handles the enquiry until local details are published',
            ],
        ],
    ],

    'uk' => [
        'hero' => [
            'image' => '/assets/img/commercial-buildings.jpg',
            'alt'   => 'Glass commercial office buildings viewed from street level',
            'eyebrow' => 'Rotash Power Projects · United Kingdom',
            'title' => 'Air conditioning and building services<br>for UK sites.',
            'lede'  => 'Design, installation, commissioning and maintenance of air conditioning, ventilation and climate control for British commercial and industrial buildings — delivered locally to the group engineering standard.',
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
                'The United Kingdom operation delivers air conditioning, ventilation and building-services work for British clients — from survey and system design through installation, commissioning and planned maintenance. Commercial refrigeration is delivered from the group’s South African operation, and medical refrigeration is available through the group.',
                'Most UK work happens in buildings that stay open while it is carried out. Phasing, access, noise and continuity are therefore planned before plant arrives rather than negotiated on the day, and the programme is built around the building’s occupants.',
                'Running cost sits behind most replacement decisions. Efficiency gains have to be real and verifiable rather than assumed, which is why the specification, the commissioning records and the handover documentation are treated as part of the job rather than paperwork that follows it.',
            ],
        ],
        'focus' => [
            'title' => 'What we deliver in the UK',
            'copy'  => 'Air conditioning leads the UK operation, with ventilation, mechanical services, commissioning and planned maintenance beneath it — and refrigeration and medical cold chain available through the group.',
        ],
        'services_note' => 'Air conditioning and ventilation lead the UK operation; refrigeration and medical cold chain are available through the group.',
        'facts' => [
            ['value' => 'UK',      'label' => 'Market',     'note' => 'Air conditioning, ventilation and building services', 'icon' => 'globe'],
            ['value' => 'Live',    'label' => 'Buildings', 'note' => 'Phased around occupied premises', 'icon' => 'building'],
            ['value' => 'Direct',  'label' => 'Contracting', 'note' => 'Appointed by clients, main contractors and manufacturers', 'icon' => 'users'],
            ['value' => '4-stage', 'label' => 'Delivery',   'note' => 'Survey, specification, installation, maintenance', 'icon' => 'ruler'],
        ],
        'coverage' => [
            'title' => 'Coverage',
            'items' => [
                'United Kingdom — air conditioning, ventilation and building services',
                'Refrigeration and medical cold chain — available through the group',
                'Group routes — the group desk handles the enquiry until local details are published',
            ],
        ],
    ],
];
