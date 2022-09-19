<?php
function search ($q){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include ("db_connection.php");
  $conn=return_db_connection();
  $sql="select bot_qa.q, bot_qa.a FROM bot_qa"; // Gives all in teh database saved answers and questions
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
    $target_answer="I couldn't find an answer to your input. Do you want to teach me how to answer correctly? Say 'yes'";
  }
  return "$target_answer";
}
?>
