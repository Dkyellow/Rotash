<?php
declare(strict_types=1);
/**
 * The Insights section was removed while the site was restructured:
 * the section carried no published articles and duplicated material
 * that belongs on the Services page. The URL redirects to the page
 * that now holds the technical content.
 */
http_response_code(301);
header('Location: /services/');
exit;
