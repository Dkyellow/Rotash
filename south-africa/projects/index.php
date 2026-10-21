<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'south-africa';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'projects',
    'title'       => 'South Africa Case Studies | Rotash Power Projects',
    'description' => 'South African project records documented by scope, constraint, engineering solution, execution and outcome.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/projects.php';
require __DIR__ . '/../../includes/footer.php';
