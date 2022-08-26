<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function return_db_connection(){
    $groupUser = "swe2_2022team17";
    $benutzer = getenv('USER');
    if($benutzer != $groupUser){
        $pfad = "/var/www/html/$benutzer/private/dbconnection.inc.php";
    }else{
        $pfad = "/var/www/html/swe2_2022team17/private/dbconnection.inc.php";
    }
    $pfad = "/var/www/html/swe2_2022team17/private/dbconnection.inc.php";
    
    include($pfad);
    $conn = new mysqli($host, $user, $password, $database);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else {
        return $conn;
    }
}
?>
