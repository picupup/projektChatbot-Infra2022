<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function return_db_connection(){
    // $groupUser = "docker-infra-2022-e-web";
    // $benutzer = "docker-"."getenv('USER')"."-web";
    // getenv('USER')


    // if($benutzer != $groupUser){
    //     $pfad = "/var/www/html/$benutzer/private/dbconnection.inc.php";
    // }else{
    //     $pfad = "/var/www/html/$benutzer/private/dbconnection.inc.php";
    // }
    // $pfad = "/var/www/html/$benutzer/private/dbconnection.inc.php";
    
    include("../private/dbconnection.inc.php");
    $conn = new mysqli($host, $user, $password, $database);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else {
        return $conn;
    }
}
?>
