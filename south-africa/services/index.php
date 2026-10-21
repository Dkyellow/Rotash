<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'services',
    'title'       => 'South Africa Services — Refrigeration & Air Conditioning',
    'description' => 'Commercial refrigeration, air conditioning, ventilation and medical cold chain in South Africa — installation and maintenance.',
    'image'       => '/assets/img/og-default.jpg',
];

$page['jsonld'] = [[
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(fn($f) => [
        '@type'          => 'Question',
        'name'           => $f['q'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
    ], $FAQ),
]];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/services.php';
require __DIR__ . '/../../includes/footer.php';
