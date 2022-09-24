<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include("algorithmen.php");
// include("db_connection.php");
include("class_chat_history.php");

$history = new chat_history();
$history->set_message1("Claus");
$result = ($history->get_message1());
echo $result;

// echo search("how are") . "\n"; 
?>
