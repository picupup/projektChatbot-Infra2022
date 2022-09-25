<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include("check_password.php");
// include("check_email.php");
include("html_parts.php");
include("class_user.php");

html_pageHeader();
echo"
<main class='messageMain'>
	<div class='message-container'>
	<div class='message-box'>
	<h1>Login to access Robbi</h1><br>
	<hr><br>
	<form id='login_form' method='post' action='index.php'>
		<input id='email' type='text' name='email' placeholder='mail adress'></input><br><br>
		<input id='password' type='password' name='password' placeholder='Password' ></input><br><br>
		<button type='submit' name='submit'>Login</button>
	</form>
	</div>
	</div>
</main>";
html_footer();

if(isset($_POST["submit"])) {
	$user = new user;
	$mail_status = $user->exist_email($_POST["email"]);
	$password_status = $user->is_pwd_right($_POST["email"], $_POST["password"]);

	if($mail_status and $password_status){
		session_start();
		$_SESSION["email"] = $_POST["email"];
		$user->update_login_status($_POST["email"], "1");
		header("Location: chat.php");
	}else{
		echo "<script type='text/javascript'>err_incorrect()</script>";
	}
}
?>
