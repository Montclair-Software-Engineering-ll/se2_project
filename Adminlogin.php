<?php
//includes db connection
require_once 'databaseConnection.php';

// Start Session
session_start();

//$pass = password_hash('*****', PASSWORD_DEFAULT);
//$query = $db->prepare("update admins set password = :pass where username = '*******'");
//$query->bindParam(":pass", $pass);
//if ($query->execute()) {
//echo 'password updated';
//}

//checks if user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  //if already logged in, redirects user to homepage
  $_SESSION['already_li'] = true;
  header('Location: index.php');
}

$username = $_POST['username'];
$password = $_POST['password'];

$username = trim($username);
$password = trim($password);

$sql = "SELECT * FROM admins where username = :username and password = :password ";
//preparese db query
$query = $db->prepare($sql);
$password = '%'.$password.'%';
$query->bindParam(':password', $password);
$username = '%'.$username.'%';
$query->bindParam(':username', $username);
//runs query and gets results
$query->execute();
$results = $query->fetchAll();

      $counter = mysqli_num_rows($result);

    //checks if username exists in db
    	if (!$result) {
    		// if username does not exist, redirects to login page
    		$_SESSION['login_fail'] = true;
    		header('Location: sc_adminlogin.html');

    		//closes db connection
    		$db = null;
    		exit();
    	}

    	// checks if password is correct
    	else if (password_verify($pass, $result['pass'])) {
    		//if password is correct, redirects to homepage
    		$_SESSION['logged_in'] = true;
    		$_SESSION['user'] = $user;
    		$_SESSION['new_log'] = true;
    		header('Location: index.php');
    	}

    	// if password is incorrect, redirects to login page
    	else {
    		$_SESSION['login_fail'] = true;
    		header('Location: sc_adminlogin.html');
    	}
?>
