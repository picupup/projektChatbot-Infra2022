<?php
//q = questions
function search ($q){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include ("db_connection.php");
  $conn=return_db_connection();
  $sql="select bot_qa.q, bot_qa.a FROM bot_qa";
  $result = mysqli_query($conn, $sql);

  $string = "";
    
  $bigger_count = 0;
  $current_count = 0;
  $current_question="";
  $target_answer="";
  $current_answer="";

   while($row = mysqli_fetch_assoc($result)) {
        $cond=0;
        foreach($row as $item){
            if ($cond % 2 == 0){ //Modulo, weil die daten paarweise trennen werden müssen
                $current_question = $item;
            }
            else{
                $current_answer = $item;
            }
            
          ++$cond;
        }

    $words = explode(" ", $current_question); // trenne die wörter im Array
    
    foreach ($words as $word) {
      //if (str_contains($q, $word)){
      if (stripos($q, $word)){
        ++$current_count;
        //echo "$word\n";
      }
    }
    if ($current_count > $bigger_count){
      $bigger_count = $current_count;
       $current_count = 0;
      $target_answer = $current_answer;
      }
    };
    if($target_answer==""){
        $target_answer="keine Antwort";
    }
    //echo "\n Antwort: " . $target_answer;
   return "$target_answer";

}
//////////////search("killer all");

?>
