<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("db_connection.php");
include("check_email.php");

function create_acc($first_name, $name, $email, $password, $hint){
    $conn = return_db_connection();
    $insert_acc = mysqli_prepare($conn, "INSERT INTO bot_login(first_name, name, email, password, hint) values (?,?,?,?,?)");
    $insert_acc->bind_param('sssss', $first_name, $name, $email, $password, $hint);
    mysqli_execute($insert_acc);
}

if(isset($_POST['register'])){
    $email_status = check_email($_POST["email"]);
    if($email_status == 0){
        if($_POST["password"] == $_POST["password2"]){
            $pwd_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            create_acc($_POST["first_name"], $_POST["surname"], $_POST["email"], $pwd_hash, $_POST["hint"]);
            echo "Thank you for sign up! <br> You can login now.";
            //header("Location: index.php");
        }else{
            echo "<script>
                function showMessage(){
                    alert('Your Passwords does not match');
                }
                showMessage() 
            </script>";
        }
    }else{
        echo "<script>
        function showMessage(){
            alert('email adresse already assigned');
        }
        showMessage() 
    </script>";
    }
}

include("html_parts.php");
html_pageHeader();
echo "
<main class='messageMain'>
	<div class='message-container'>
	<div class='message-box'>
	<h1>Get your own account:</h1><br>
    <hr><br>
	<form id='sign_up' name='sign_up' method='post' action='sign_up.php'>
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
?>