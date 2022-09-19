<?php

include("db_connection.php");

class chat_history{

    private $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function get_message1(){
        $redis_conn = return_redis_connection();
        $message = $redis_conn->HGET($this->user, "message1");
        return $message;
        $redis_conn->close();
    }

    public function get_message2(){
        $redis_conn = return_redis_connection();
        $message = $redis_conn->HGET($this->user, "message2");
        return $message;
        $redis_conn->close();
    }

    public function get_message3(){
        $redis_conn = return_redis_connection();
        $message = $redis_conn->HGET($this->user, "message3");
        return $message;
        $redis_conn->close();
    }

    public function get_message4(){
        $redis_conn = return_redis_connection();
        $message = $redis_conn->HGET($this->user, "message4");
        return $message;
        $redis_conn->close();
    }

    public function set_message1($message){
        $redis_conn = return_redis_connection();
        $redis_conn->HSET($this->user, "message1", $message);
        $redis_conn->close();
    }

    public function set_message2($message){
        $redis_conn = return_redis_connection();
        $redis_conn->HSET($this->user, "message2", $message);
        $redis_conn->close();
    }

    public function set_message3($message){
        $redis_conn = return_redis_connection();
        $redis_conn->HSET($this->user, "message3", $message);
        $redis_conn->close();
    }

    public function set_message4($message){
        $redis_conn = return_redis_connection();
        $redis_conn->HSET($this->user, "message4", $message);
        $redis_conn->close();
    }

    // public function sliding_window($next){
        // $window = new chat_history();
    //     $message1 = get_message1();
    //     $message2 = (get_message2($user));
    //     $message3 = (get_message3($user));
    //     $message4 = (get_message4($user));
    //     set_message1($user, $message2);
    //     set_message2($user, $message3);
    //     set_message3($user, $message4);
    //     set_message4($user, $next);
    // }

}
?>