<?php

//includes db connection
require_once '../database_connection.php';

// Start Session
session_start();

$Username = strtolower(trim($_POST['username']));
$Email = strtolower(trim($_POST['email']));
$Password = trim($_POST['password']);

$stmt = "select * from users where username = :username or email =:email";

//preparese db query
$query = $db->prepare($stmt);

//binds paramenters
$query->bindParam(':username', $Username);
$query->bindParam(':email', $Email);

//runs query and gets results
$query->execute();
$result = $query->fetch();

if ($result) {
		$_SESSION['signup_failed'] = true;
		header('Location: ../user_signup.php');
}
else {
	$query = "INSERT INTO users (username, email, password)
				VALUES(:username, :email, :password)";
				//preparese db query
	$query = $db->prepare($stmt);
	//$query->bindParam(':username', $Username);
	//$query->bindParam(':email', $Email);
	// binding hashed password to the parameter
	$Password = password_hash($Password, PASSWORD_DEFAULT);
	$query->bindParam(':password', $Password);

if($query->execute()){
	$_SESSION['username'] = $Username;
	$_SESSION['success'] = true;
	header('location: ../index.php');
}
else{
	    $_SESSION['login_fail'] = true;
	    header('Location: ../user_login.php');
	}
}
?>
