<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Commercial Refrigeration Services in the Eastern Cape | Rotash',
    'description' => 'Explore Rotash commercial refrigeration experience in the Eastern Cape, including cold rooms, bottle coolers and medical refrigerator services.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
