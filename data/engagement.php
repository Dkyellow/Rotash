<?php
declare(strict_types=1);

/* ============================================================
   ENGAGEMENT MODELS, how Rotash works with clients.
   Published in full: the company contracts both directly and as
   a subcontractor, and the site says so plainly.
   ============================================================ */

$ENGAGEMENT_MODELS = [
    [
        'id'      => 'direct',
        'icon'    => 'users',
        'name'    => 'Direct contract',
        'summary' => 'We contract straight with the client and carry the whole package.',
        'detail'  => 'The owner, operator or facility manager appoints us directly. We own the survey, the specification, the installation, the commissioning and the handover, including responsibility for the system performing afterwards.',
        'owns'    => [
            'System selection and specification',
            'Procurement and programme management',
            'Installation, commissioning and handover',
            'Single point of accountability for performance',
        ],
    ],
    [
        'id'      => 'subcontract',
        'icon'    => 'helmet',
        'name'    => 'Subcontracted delivery',
        'summary' => 'We are appointed by main contractors and equipment manufacturers to deliver their refrigeration or air-conditioning package.',
        'detail'  => 'A significant share of the work is delivered as a subcontract package. We work to the main contractor’s drawings, programme and site rules, coordinate with other trades on site, and report back against a scope that has already been defined by someone else.',
        'owns'    => [
            'Installation inside an agreed package scope',
            'Coordination with other trades and the main programme',
            'Commissioning and evidence for the main contractor',
            'Defects and snagging within our scope',
        ],
    ],
    [
        'id'      => 'maintenance',
        'icon'    => 'calendar',
        'name'    => 'Maintenance and service agreements',
        'summary' => 'Planned servicing and fault response for installed plant, including plant we did not install.',
        'detail'  => 'A refrigeration system only holds its temperature if somebody is accountable for it. We take on planned preventive maintenance, reactive call-out and system optimisation for installed base, as well as equipment inherited from a previous contractor once we have surveyed and recorded it.',
        'owns'    => [
            'Service visits against a planned schedule',
            'Fault response and priority attendance',
            'Refrigerant, hygiene and performance checks',
            'Asset records and a documented service history',
        ],
    ],
    [
        'id'      => 'consultancy',
        'icon'    => 'document',
        'name'    => 'Survey, design and tender support',
        'summary' => 'Independent technical input before anything is bought or built.',
        'detail'  => 'Sometimes the useful work happens before there is a project to install. This can include an assessment of what is already installed, a load calculation, a tender specification, or an opinion on a system another contractor has quoted. We document that work properly.',
        'owns'    => [
            'Site survey and existing-plant assessment',
            'Load calculation and system options',
            'Tender documentation and technical schedules',
            'Witnessing or reviewing an installation',
        ],
    ],
];
