<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("html_parts.php");
html_intern_pageHeader();
echo"<main class='messageMain'>
<div class='message-container'>
  <div class='message-box'>
    <h1>Talk to Robbi</h1>
    <div id='rectangle'>
      <div id='dialoge'></div><br>
      <form name='robbi' id='robbi' onsubmit='return false' >
        <input type='text' id='question' name='question'>
        <input type='submit' value='Send' id='sub_butt' onclick='main()'>
      </form> 
    </div>
  </div>
</div>
</main>";
html_footer();
?>

