

<?php
// echo"<html>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("algorithmen.php");
// echo($_GET["question"]);

$answer = search($_GET['question']);
echo $answer;
// echo "</html>";
















?>

