<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'uk';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'services',
    'title'       => 'Air Conditioning & Ventilation Services in the UK | Rotash',
    'description' => 'UK services: air conditioning, ventilation, commercial refrigeration and medical cold chain — design, installation and maintenance.',
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
