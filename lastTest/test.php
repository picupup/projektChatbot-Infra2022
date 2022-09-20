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
$dir="/var/www/html/$user/test_result";
$files = scandir("./test_result");
$files2 = array_diff(scandir($dir), array('..', '.'));
$ww="https://informatik.hs-bremerhaven.de/infra-2022-e/test_result";
//print_r($files1);
//
echo "<html>
<head>
    <meta charset='UTF-8'>
    <title>HTML Syntax</title>
</head>
<body>";

foreach ($files2 as $file) {
  echo "<label>$file</label><br>\n";
  echo "<img src=\"$ww/$file\" alt=\"$file\">\n";
}

echo "</body>
</html>";
