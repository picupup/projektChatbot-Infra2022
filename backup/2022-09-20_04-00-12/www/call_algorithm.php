

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("algorithmen.php");
include ("class_chat_history.php");
// include("db_connection.php");

class window{

    private $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function sliding_window($next){
        $redis_handler = new chat_history($this->user);
        $message1 = ($redis_handler->get_message1());
        $message2 = ($redis_handler->get_message2());
        $message3 = ($redis_handler->get_message3());
        $message4 = ($redis_handler->get_message4());
        $redis_handler->set_message1($message2);
        $redis_handler->set_message2($message3);
        $redis_handler->set_message3($message4);
        $redis_handler->set_message4($next);
        }

}

session_start();
if(!isset($_SESSION["email"])){
    header("Location: not_logged_in.php");
}else{
    $user = $_SESSION['email'];
    $time = time();
    $question = $_GET['question'];

    $redis_handler = new chat_history($user);
    $window = new window($user);

    $window->sliding_window($question);

    $message1 = ($redis_handler->get_message1());
    $message2 = ($redis_handler->get_message2());
    $message3 = ($redis_handler->get_message3());
    $message4 = ($redis_handler->get_message4());

    if ($message3 == "I didn't find an answer. Do youwant to help me?" && $message4 == "yes"){
        $answer = "Bin bereit nächste Antwort wird Gespreichert";
        echo $answer;
        $window->sliding_window($answer);
    }elseif($message1 == "I didn't find an answer. Do youwant to help me?" && $message2 == "yes" && $message3 == "Bin bereit nächste Antwort wird Gespreichert"){
        // save_new_touple($message1, $question);
        $answer = "Saved new touple.";
        echo $answer;
        $window->sliding_window($answer);
    }else{
        $answer = search($_GET['question']);
        echo $answer;
        $window->sliding_window($answer);
    }
}

?>

