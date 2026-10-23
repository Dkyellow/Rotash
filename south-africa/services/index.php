<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'services',
    'title'       => 'Commercial Refrigeration in the Eastern Cape | Rotash',
    'description' => 'Commercial refrigeration, cold rooms, bottle coolers, air conditioning and medical refrigerator support in the Eastern Cape.',
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
