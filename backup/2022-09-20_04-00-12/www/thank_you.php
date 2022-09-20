<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("html_parts.php");
html_pageHeader();
echo"<main class='messageMain'>
<div class='message-container'>
  <div class='message-box'>
    <h1>Thank you for sign up!</h1><br>
    <p>You can login now.</p>
  </div>
</div>
</main>";

html_footer();
?>