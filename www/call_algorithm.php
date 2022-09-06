

<?php
echo"<html>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("algorithmen.php");
echo($_GET["question"]);
echo search($_GET['question']);
echo "</html>";
?>

