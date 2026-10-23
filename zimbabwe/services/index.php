<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'zimbabwe';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'services',
    'title'       => 'Refrigeration & Air Conditioning Services in Harare | Rotash',
    'description' => 'Explore Rotash refrigeration and air conditioning services in Harare, Zimbabwe, including installation, servicing and repairs.',
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
