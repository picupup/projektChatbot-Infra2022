<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("db_connection.php");
include("check_email.php");

if(isset($_POST["submit"])) {
	function check_password($post_email, $post_password){
		$conn = return_db_connection();
		$get_pwd = mysqli_prepare($conn, "SELECT password FROM bot_login WHERE email = ? ");
		$get_pwd->bind_param('s', $post_email);
		mysqli_execute($get_pwd);
		$result = mysqli_stmt_get_result($get_pwd);
		$affected = mysqli_affected_rows($conn);

		if($affected > 0){
			$row = mysqli_fetch_assoc($result);
			$hash_pwd = $row['password'];
			if(password_verify($post_password, $hash_pwd)){
				return true;
			}
		}else{
			return false;
		}

	}
	$mail_status = check_email($_POST["email"]);
	$password_status = check_password($_POST["email"], $_POST["password"]);

	if($mail_status and $password_status){
		header("Location: chat.php");
	}else{
		incorrect();
	}
}
function incorrect(){
	echo "email or password is wrong.";
}
include("html_parts.php");
html_pageHeader();
echo"
<main class='messageMain'>
	<div class='message-container'>
	<div class='message-box'>
	<h1>Login to access Robbi</h1><br>
	<form method='post' action='index.php'>
		<input type='text' name='email' placeholder='mail adress'></input><br><br>
		<input type='password' name='password' placeholder='Password'></input><br><br>
		<button type='submit' name='submit'>Login</button>
	</form>
	</div>
	</div>
</main>";
html_footer();
?>
