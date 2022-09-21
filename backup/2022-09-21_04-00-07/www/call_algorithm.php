

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("class_robbi.php");

session_start();
if(!isset($_SESSION["email"])){
    header("Location: not_logged_in.php");
}else{
    $user = $_SESSION['email'];
    $question = $_GET['question'];

    $robbi1 = new robbi($user);
    $answer = $robbi1->main($question);
    echo $answer;
}

?>

