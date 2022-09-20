<?php
//<<ShowTestImg.php>>
//team e infra
//2022-09-20_18:54:58
//\Thema: This file shows all images in the test folder online
//

$user=get_current_user();
$dir="/var/www/html/$user/test_result";
$files = scandir($dir);
$files2 = array_diff(scandir($dir), array('..', '.'));
$ww="https://informatik.hs-bremerhaven.de/$user/test_result";
//print_r($files1);
//
echo "<html>
<head>
    <meta charset='UTF-8'>
    <title>HTML Syntax</title>
</head>
<body>"

foreach ($files2 as $file) {
  echo "<label>$file</label><br>\n";
  echo "<img src=\"$ww/$file\" alt=\"$file\">\n";
}

echo "</body>
</html>"
