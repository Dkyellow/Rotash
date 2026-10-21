<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'uk';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Air Conditioning & Building Services in the UK | Rotash',
    'description' => 'Air conditioning design, installation, commissioning and maintenance for commercial buildings across the United Kingdom.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
