<?php
//To use this function you have to include it in your file.
// Important! You also have to include_once("user.php"); !

function check_email($post_email){
    $user = new user();
    $result = ($user->get_email($post_email));
    // $email = $result[0]; // email is returnt but is not required
    $affected = $result[1];
    
    if($affected == 0){
        return false;
    }else{
        return true;
    }
}
?>