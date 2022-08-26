<?php
//q = questions
function search (q){
  include ("db_connection.php")
  $conn=return_db_connection();
  $sql="select bot_qa.q, bot_qa.a FROM bot_qa";
  $result = mysqli_query($conn, $sql);

    $string = "";
    while($row = mysqli_fetch_assoc($result)) {
        $cond=0;
        $last_count = 0;
        $current_count = 0;
        $target_answer;
        $current_question;
        $current_answer;
        foreach($row as $item){
          ++$cond
            if ($cond % 2 = 0){ //Modulo, weil die daten paarweise trennen werden müssen
                $current_question = $item;
            }
            else{
                $current_answer = $item;
            }
        }

        $cond=true;
        $string .= "<option value=\" $eins \"> $zwei </option>";
        //echo "<option value=\" $eins \"> $zwei </option>";
        //$data[] = $row;
    };
    return "$string";

}







?>
