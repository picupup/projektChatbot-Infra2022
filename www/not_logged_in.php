<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("html_parts.php");


html_pageHeader();
html_not_logged_in();
html_footer();

?>