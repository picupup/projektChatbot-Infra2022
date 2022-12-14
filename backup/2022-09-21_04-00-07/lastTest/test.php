<?php
//<<ShowTestImg.php>>
//team e infra
//2022-09-20_18:54:58
//\Thema: This file shows all images in the test folder online
//
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user=get_current_user();
$dir="/var/www/html/infra-2022-e/test_result";
$files = scandir($dir);
$files2 = array_diff(scandir($dir), array('..', '.')); // remove dots
$ww="https://informatik.hs-bremerhaven.de/infra-2022-e/test_result";
//print_r($files1);
//
echo "<html>
<head>
    <meta charset='UTF-8'>
    <title>Test results</title>
</head>
<body>";

foreach ($files2 as $file) {
  echo "<br><br><label>Test with following number of requests: 1000 x $file</label><br>\n";
  echo "<img src=\"$ww/$file\" alt=\"$ww/$file\">\n";
}

echo "</body>
</html>";
