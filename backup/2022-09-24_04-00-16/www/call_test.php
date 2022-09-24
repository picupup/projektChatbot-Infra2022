<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// header("Content-Type: text/plain");

include("class_user.php");
$robbi1 = new robbi;
$result =$robbi1->main($_GET('question'));
echo $result;
?>
