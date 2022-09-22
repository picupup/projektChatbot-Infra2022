<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
session_destroy();

include("html_parts.php");
html_pageHeader();

echo"<main class='messageMain'>
<div class='message-container'>
  <div class='message-box'>
    <h1>You are logged out.</h1>
  </div>
</div>
</main>";

html_footer();
?>