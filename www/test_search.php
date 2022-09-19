<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("algorithmen.php");
include("db_connection.php");
$redis_conn = return_redis_connection();
$redis_conn->set("silas", "28");
echo "Das kommt aus Redis ".$redis_conn->get("silas");


// echo search("how are") . "\n"; 
?>
