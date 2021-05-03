<?php
//includes db connection
require_once '../database_connection.php';

// Start Session
session_start();

//db query used to enter hashed password for manually entered admin account
/*
$pass = password_hash('SE_Project238;', PASSWORD_DEFAULT);
$query = $db->prepare("update admins set password = :pass where username = 'hope_d'");
$query->bindParam(':pass', $pass);
$query->execute();
*/

//checks if user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  //if already logged in, redirects user to homepage
  $_SESSION['already_li'] = true;
  header('Location: ../index.php');
}

$username = strtolower(trim($_POST['username']));
$password = trim($_POST['password']);

$stmt = "select * from users where username = :username";

//preparese db query
$query = $db->prepare($stmt);

//binds paramenters
$query->bindParam(':username', $username);

//runs query and gets results
$query->execute();
$result = $query->fetch();


//checks if username exists in db
if (!$result) {
	// if username does not exist, redirects to login page
	$_SESSION['login_fail'] = true;
	header('Location: ../user_login.php');

	//closes db connection
	$db = null;
	exit();
}

//checks if password is correct
else if (password_verify($password, $result['password'])) {
    //if password is correct, redirects to homepage
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $username;
    $_SESSION['new_log'] = true;
    header('Location: ../index.php');
}

//if password is incorrect, redirects to login page
else {
    $_SESSION['login_fail'] = true;
    header('Location: ../user_login.php');
    echo $result;
}
?>
