<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'zimbabwe';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Refrigeration & Cold Chain Services in Zimbabwe | Rotash',
    'description' => 'Commercial refrigeration, medical cold chain and air conditioning for Zimbabwe, engineered for local ambient and supply conditions.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
