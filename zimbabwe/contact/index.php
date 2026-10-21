<?php require __DIR__ . '/../../includes/bootstrap.php';
require __DIR__ . '/../../includes/enquiry-handler.php';

$mc = 'zimbabwe';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'contact',
    'title'       => 'Contact the Zimbabwe Team | Rotash Power Projects',
    'description' => 'Speak to the Zimbabwe team about refrigeration, medical cold chain or air conditioning. Send an enquiry and we will respond.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/contact.php';
require __DIR__ . '/../../includes/footer.php';
