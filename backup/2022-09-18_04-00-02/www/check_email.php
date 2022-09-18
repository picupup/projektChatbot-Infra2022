<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function check_email($email_post){
    $conn = return_db_connection();

    $get_mail = mysqli_prepare($conn, "SELECT * FROM bot_login WHERE email = ? ");
	$get_mail->bind_param('s',$email_post);

	mysqli_execute($get_mail);
	$result = mysqli_stmt_get_result($get_mail);
    $affected = mysqli_affected_rows($conn);
    
    if($affected == 0){
        return false;
    }else{
        return true;
    }
}
?>