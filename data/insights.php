<?php
declare(strict_types=1);

/* ============================================================
   Insights — technical articles and company news.
   Listing page only in this phase; individual article routes
   (e.g. /insights/<slug>/) can be added to $ROUTES later.
   Entries flagged placeholder await written content.
   ============================================================ */

$INSIGHTS = [
    [
        'slug'        => 'specifying-hvac-for-hot-climates',
        'title'       => 'Specifying HVAC for Hot, Dry Climates',
        'market'      => 'south-africa',
        'category'    => 'Engineering',
        'date'        => '2026-08-12',
        'read'        => '6 min read',
        'excerpt'     => 'Why design conditions, plant selection and maintenance access matter more than headline capacity when cooling buildings in high-ambient environments.',
        'placeholder' => true,
    ],
    [
        'slug'        => 'retrofit-versus-replace',
        'title'       => 'Retrofit or Replace? A Practical Decision Framework',
        'market'      => 'uk',
        'category'    => 'Engineering',
        'date'        => '2026-07-28',
        'read'        => '5 min read',
        'excerpt'     => 'A structured way to weigh plant life, refrigerant legislation, energy performance and disruption before committing to a route on live buildings.',
        'placeholder' => true,
    ],
    [
        'slug'        => 'planned-maintenance-as-risk-management',
        'title'       => 'Planned Maintenance as Risk Management',
        'market'      => 'south-africa',
        'category'    => 'Operations',
        'date'        => '2026-07-03',
        'read'        => '4 min read',
        'excerpt'     => 'How a documented maintenance regime protects cold-chain continuity, extends plant life and removes surprises from operating budgets.',
        'placeholder' => true,
    ],
    [
        'slug'        => 'commissioning-is-not-a-checkbox',
        'title'       => 'Commissioning Is Not a Checkbox',
        'market'      => 'uk',
        'category'    => 'Delivery',
        'date'        => '2026-06-19',
        'read'        => '7 min read',
        'excerpt'     => 'What proper balancing, verification and handover look like — and what gets missed when commissioning is treated as paperwork.',
        'placeholder' => true,
    ],
];
