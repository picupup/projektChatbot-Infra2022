<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db_connection.php");

// User wird nicht im Konstruktor gespeichert, 
// da auch Objektinstanziierung ohne User-Speicherung gebraucht wird.
class user {

    public function save_user($first_name, $name, $email, $password, $hint){
        $conn = return_db_connection();
        $insert_acc = mysqli_prepare($conn, "INSERT INTO bot_login(first_name, name, email, password, hint) values (?,?,?,?,?)");
        $insert_acc->bind_param('sssss', $first_name, $name, $email, $password, $hint);
        mysqli_execute($insert_acc);
        mysqli_close($conn);
    }

    public function get_first_name($email){
        $conn = return_db_connection();
        $get = mysqli_prepare($conn, "SELECT first_name FROM bot_login WHERE email = ? ");
		$get->bind_param('s', $email);
		mysqli_execute($get);
        $result = mysqli_stmt_get_result($get);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['first_name'];
    }

    public function get_name($email){
        $conn = return_db_connection();
        $get = mysqli_prepare($conn, "SELECT name FROM bot_login WHERE email = ? ");
		$get->bind_param('s', $email);
		mysqli_execute($get);
        $result = mysqli_stmt_get_result($get);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['name'];
    }

    public function get_email($post_email){
        $conn = return_db_connection();
        $get = mysqli_prepare($conn, "SELECT email FROM bot_login WHERE email = ? ");
		$get->bind_param('s', $post_email);
		mysqli_execute($get);
        $result = mysqli_stmt_get_result($get);
        $affected = mysqli_affected_rows($conn);
        if ($affected == 0){
            return array(0, $affected);
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return array($row['email'], $affected);
    }

    public function get_password($email){
        $conn = return_db_connection();
        $get = mysqli_prepare($conn, "SELECT password FROM bot_login WHERE email = ? ");
		$get->bind_param('s', $email);
		mysqli_execute($get);
        $result = mysqli_stmt_get_result($get);
        $affected = mysqli_affected_rows($conn);
        if ($affected == 0){
            return array(0, $affected);
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return array($row['password'], $affected);
    }

    public function get_hint($email){
        $conn = return_db_connection();
        $get = mysqli_prepare($conn, "SELECT hint FROM bot_login WHERE email = ? ");
		$get->bind_param('s', $email);
		mysqli_execute($get);
        $result = mysqli_stmt_get_result($get);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['hint'];
    }
}