<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("check_email.php");
include_once("user.php");
include("html_parts.php");

html_pageHeader();
echo "
<main class='messageMain'>
	<div class='message-container'>
	<div class='message-box'>
	<h1>Get your own account:</h1><br>
    <hr><br>
	<form id='sign_up' name='sign_up' method='post' onsubmit='return false'>
        <label class='sign_up_label' form='sign_up' for='first_name'>First Name: </label>
        <input id='first_name' type='text' name='first_name' placeholder='First Name'></input><br><br>
        <label class='sign_up_label' form='sign_up' for='surname'>Surname: </label>
        <input id='surname' type='text' name='surname' placeholder='Surname'></input><br><br>
        <label class='sign_up_label' form='sign_up' for='email'>Email: </label>
		<input id='email' type='text' name='email' placeholder='Mail Adress' required></input><br><br>
        <label class='sign_up_label' form='sign_up' for='password'>Password: </label>
		<input id='password' type='password' name='password' placeholder='Password' required></input><br><br>
        <label class='sign_up_label' form='sign_up' for='password2'>Repeat Password: </label>
		<input id='password2' type='password' name='password2' placeholder='Password' required></input><br><br>
        <label class='sign_up_label' form='sign_up' for='hint'>Security Hint: </label>
		<input id='hint' type='password' name='hint' placeholder='Hint'></input><br><br>
        <hr><br>
        <div id='register'>
		<button id='register_button' type='submit' name='register'>register</button>
        </div>
	</form>
	</div>
	</div>
</main>";
html_footer();

if(isset($_POST['register'])){
    $email_status = check_email($_POST["email"]);
    if(! $email_status){
        if($_POST["password"] == $_POST["password2"]){
            $pwd_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $user = new user();
            $user->save_user($_POST["first_name"], $_POST["surname"], $_POST["email"], $pwd_hash, $_POST["hint"]);
            header("Location: thank_you.php");
        }else{
            echo "<script type='text/javascript'>err_pwd_match()</script>";
        }
    }else{
        echo "<script type='text/javascript'>err_email_exists()</script>";
    }
}
?>