<?php
declare(strict_types=1);

/* ============================================================
   DELIVERY METHOD — the four stages every job passes through,
   whatever the discipline and whichever market it is delivered in.
   Rendered by a single shared component so the same method is
   not restated, slightly differently, on every page.
   ============================================================ */

$METHOD_STAGES = [
    [
        'num'   => '01',
        'icon'  => 'clipboard',
        'name'  => 'Survey and brief',
        'copy'  => 'We establish the real duty before anything is specified: loads, usage patterns, ambient conditions, existing plant, access and the constraints the operation actually lives with.',
    ],
    [
        'num'   => '02',
        'icon'  => 'ruler',
        'name'  => 'Design and specification',
        'copy'  => 'Plant, distribution and controls are engineered to that duty and to the operating budget, with maintainability and access designed in rather than added later.',
    ],
    [
        'num'   => '03',
        'icon'  => 'wrench',
        'name'  => 'Installation and commissioning',
        'copy'  => 'Works are executed against drawings and a programme agreed with the operator. Leak testing, balancing, verification and temperature checks are recorded, not assumed.',
    ],
    [
        'num'   => '04',
        'icon'  => 'refresh',
        'name'  => 'Handover and maintenance',
        'copy'  => 'Documentation, operator training and a maintenance regime so the system keeps performing after practical completion — with us accountable for it under a service agreement.',
    ],
];
