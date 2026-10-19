<?php
declare(strict_types=1);

/* Bootstrap: one require for every page, normalised by __DIR__. */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../data/offices.php';
require_once __DIR__ . '/../data/services.php';
require_once __DIR__ . '/../data/industries.php';
require_once __DIR__ . '/../data/projects.php';
require_once __DIR__ . '/../data/insights.php';

/* Publish only client-signed-off case studies. Placeholder records stay in
   data/projects.php for editing but are never rendered on the live site. */
$PROJECTS = array_values(array_filter($PROJECTS, fn(array $p): bool => empty($p['placeholder'])));
