<?php
include("class_user.php");
function check_password($post_email, $post_password){
	$user = new user();
	$result = ($user->get_password($post_email));
	$password_hash = $result[0];
	$affected = $result[1];
	if($affected > 0){
		if(password_verify($post_password, $password_hash)){
			return true;
		}
		}else{
			return false;
	}
}
?>