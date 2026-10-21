<?php require __DIR__ . '/../../includes/bootstrap.php';

$mc = 'uk';
$MK = market($mc);
$MC = $MARKET_CONTENT[$mc];

$page = [
    'key'         => 'projects',
    'title'       => 'UK Case Studies — Air Conditioning & Building Services',
    'description' => 'UK project records documented by scope, constraint, engineering solution, execution and outcome.',
    'image'       => '/assets/img/og-default.jpg',
];

require __DIR__ . '/../../includes/head.php';
require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/market/projects.php';
require __DIR__ . '/../../includes/footer.php';
