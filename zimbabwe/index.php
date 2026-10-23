<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'zimbabwe';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Refrigeration & Air Conditioning in Harare, Zimbabwe | Rotash',
    'description' => 'Explore Rotash Power Projects refrigeration and air conditioning services in Harare, Zimbabwe. Contact the team to discuss your cooling requirements.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
