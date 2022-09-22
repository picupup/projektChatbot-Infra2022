<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include("class_user.php");
include("html_parts.php");
session_start();

$user = new user;
$user -> update_login_status($_SESSION['email'], "0");
session_destroy();

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