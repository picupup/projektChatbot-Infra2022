<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("html_parts.php");
html_pageHeader();
echo"<main class='messageMain'>
	<div class='message-container'>
	<div class='message-box'>
	<h1>Login to access Robbi</h1><br>
	<form methode='POST' action='chat.php'>
		<input type='text' placeholder='Username'></input><br><br>
		<input type='text' placeholder='Password'></input><br><br>
		<button type='submit'>Login</button>
	</form>
	</div>
	</div>
</main>";

html_footer();
?>