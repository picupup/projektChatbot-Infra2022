<?php

include("db_connection.php");

class robbi{

    private $user;
    private $am_ready = "Okay, I'll save your next entry as answer to your question.";
    private $sorry_don_know = "I didn't find an answer. Do you want to help me? Say 'yes'";
    private $saved_it = "Saved new record.";
    public $message1;
    public $message2;
    public $message3;
    public $message4;
    public $message5;

    public function __construct($user){
        $this->user = $user;
    }

    public function main($q){
        
        $this->sliding_window($q);

        if ($this->message4 == $this->sorry_don_know && $this->message5 == "yes"){
            $answer = $this->am_ready;
            $this->sliding_window($answer);
            return $answer;
        }elseif($this->message2 == $this->sorry_don_know && $this->message3 == "yes" && $this->message4 == $this->am_ready){
            $this->save_new_record($this->message1, $q);
            $answer = $this->saved_it;
            $this->sliding_window($answer);
            return "$answer Try to enter '$this->message1' again.";
        }else{
            $answer = $this->search($q);
            $this->sliding_window($answer);
            return $answer;
        }
    }

    private function get_message($number){
        $redis_conn = return_redis_connection();
        $message = $redis_conn->HGET($this->user, "message$number");
        return $message;
        $redis_conn->close();
    }

    private function set_message($number, $message){
        $redis_conn = return_redis_connection();
        $redis_conn->HSET($this->user, "message$number", $message);
        $redis_conn->close();
    }

    private function sliding_window($next){
        $this->update_message_variables();
        $this->set_message("1", $this->message2);
        $this->set_message("2", $this->message3);
        $this->set_message("3", $this->message4);
        $this->set_message("4", $this->message5);
        $this->set_message("5", $next);
        $this->update_message_variables();
    }

    private function update_message_variables(){
        $this->message1 = $this->get_message("1");
        $this->message2 = $this->get_message("2");
        $this->message3 = $this->get_message("3");
        $this->message4 = $this->get_message("4");
        $this->message5 = $this->get_message("5");
    }

    private function save_new_record($question, $answer){
        $conn = return_db_connection();
        $insert_rec = mysqli_prepare($conn, "INSERT INTO bot_qa(q, a) VALUES(?, ?)");
        $insert_rec->bind_param('ss', $question, $answer);
        mysqli_execute($insert_rec);
        mysqli_close($conn);
    }

    private function search($q){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include_once("db_connection.php");
        $conn=return_db_connection();
        $sql="select bot_qa.q, bot_qa.a FROM bot_qa"; // Gives all in the database saved answers and questions
        $result = mysqli_query($conn, $sql);

        $bigger_count = 0;
        $current_count = 0;
        $current_question="";
        $target_answer="";
        $current_answer="";

        while($row = mysqli_fetch_assoc($result)) { // For each record (row with question + answer)
            $cond=0;
            // Answers and questions both in seperate variables.
            foreach($row as $item){
            if ($cond % 2 == 0){ 
                $current_question = $item;
            }
            else{
                $current_answer = $item;
            }
            ++$cond;
            }
            if ( "$current_question" == "$q" ){
            return $current_answer;
            }
            $words = explode(" ", $current_question); // Split the string at the spaces put in an array. 
            foreach ($words as $word) { // For every word in the current question do the following
            if (str_contains(strtolower($q), strtolower($word))){
                ++$current_count;
            }
            // if (stripos($q, $word)){
            //   ++$current_count;
            // }
            }
            if ($current_count > $bigger_count){
            $bigger_count = $current_count;
            $current_count = 0;
            $target_answer = $current_answer;
            };
        }
        if($target_answer==""){
            $target_answer= $this->sorry_don_know;
        }
        return "$target_answer";

    }    
}
?>