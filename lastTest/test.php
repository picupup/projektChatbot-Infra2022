<?php
//<<ShowTestImg.php>>
//team e infra
//2022-09-20_18:54:58
//\Thema: This file shows all images in the test folder online
//
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../www/html_parts.php");
html_pageHeader();

$user=get_current_user();
$dir="/var/www/html/infra-2022-e/test_result";
$files2 = array_diff(scandir($dir), array('..', '.')); // remove dots
$ww="https://informatik.hs-bremerhaven.de/infra-2022-e/test_result";
echo"<main class='messageMain'>
<div class='message-container'>
  <div class='message-box'>
    <h1>Testing</h1><br>";
foreach ($files2 as $file) {
  echo "<br><br><label>Test with following number of requests: 10000 x $file</label><br>\n";
  echo "<img src=\"$ww/$file\" alt=\"$ww/$file\">\n";
}
echo"</div>
</div>
</main>";

html_footer();