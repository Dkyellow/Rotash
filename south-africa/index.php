<?php require __DIR__ . '/../includes/bootstrap.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'home',
    'title'       => 'Refrigeration & Air Conditioning in South Africa | Rotash',
    'description' => 'Commercial refrigeration, air conditioning and medical cold chain across South Africa, from offices in the Eastern Cape.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/market/home.php';
require __DIR__ . '/../includes/footer.php';
