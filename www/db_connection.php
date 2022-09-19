<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function return_db_connection(){
    include("../private/dbconnection.inc.php");
    $conn = new mysqli($host, $user, $password, $database);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else {
        return $conn;
    }
}

function return_redis_connection(){
    include("../private/redis.inc.php");
    $redis = new Redis();
    $redis->connect($redishost,$redisport);
    $redis->auth($redispassword);
    return $redis;
}
?>
