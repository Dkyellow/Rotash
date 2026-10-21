<?php require __DIR__ . '/../../includes/bootstrap.php';
require __DIR__ . '/../../includes/enquiry-handler.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'contact',
    'title'       => 'Contact the South Africa Team | Rotash Power Projects',
    'description' => 'Speak to the South African team about refrigeration, air conditioning or medical cold chain. Offices in the Eastern Cape.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/contact.php';
require __DIR__ . '/../../includes/footer.php';
