<?php
/* Regional landing pages share the same visual composition as the global home. */
$homeCode = $mc ?? current_market_code();
require __DIR__ . '/../home.php';
?>
