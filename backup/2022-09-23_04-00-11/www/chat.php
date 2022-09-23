<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include("html_parts.php");
include("class_user.php");

if(!isset($_SESSION["email"])){
  header("Location: not_logged_in.php");
}else{
  $user = new user();
  $user_name = $user->get_first_name($_SESSION["email"]);
  html_intern_pageHeader();
  echo"<main class='messageMain'>
<div class='message-container'>
  <div class='message-box'>
    <p>Hello $user_name</p><br>
    <h1>talk to Robbi:</h1><br>
    <hr><br>
    <div id='rectangle'>
      <div id='dialoge'></div><br>
      <form name='robbi' id='robbi' onsubmit='return false' >
        <input type='text' id='question_line' name='question_line'>
        <button type='submit' value='Send' id='sub_butt' onclick='main()'>Send</button>
      </form> 
    </div>
  </div>
</div>
</main>";
}
html_footer();
?>

