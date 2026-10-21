<?php
declare(strict_types=1);
/**
 * /uk/industries/ has been folded into the group Sectors page.
 * The URL is kept and redirected so existing links and search results
 * continue to work.
 */
http_response_code(301);
header('Location: /industries/');
exit;
