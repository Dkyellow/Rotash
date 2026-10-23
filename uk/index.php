<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'uk';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Air Conditioning & Building Services in the UK | Rotash',
    'description' => 'Explore Rotash air conditioning and building-services capabilities for UK commercial and industrial sites. Contact the team to confirm availability.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
