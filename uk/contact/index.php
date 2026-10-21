<?php require __DIR__ . '/../../includes/bootstrap.php';
require __DIR__ . '/../../includes/enquiry-handler.php';

$mc = 'uk';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'contact',
    'title'       => 'Contact the UK Team | Rotash Power Projects',
    'description' => 'Speak to the UK team about air conditioning, ventilation or refrigeration. Send an enquiry and we will respond with engineering questions.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/contact.php';
require __DIR__ . '/../../includes/footer.php';
