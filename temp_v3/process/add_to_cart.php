<?php
    //includes database connection
	require_once '../database_connection.php';

	//includes session info
	session_start();

    //gets ID of product to be added to cart
    $prod_id = $_POST['prod_id'];

	//redirects user to log in page if not already logged in
	if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)) {
    	header('location: user_login.php');
        exit();
    }

    //gets ID of logged in user
	$stmt = 'select id from users where username = :username';
	$query = $db->prepare($stmt);
	$query->bindParam(':username', $_SESSION['username']);
	$query->execute();
	$return = $query->fetch();
    $user_id = $return['id'];

    //inserts item into user's cart
    $stmt = 'insert into cart values (:user_id, :prod_id, 1)';
    $query = $db->prepare($stmt);
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':prod_id', $prod_id);
    
    //if insert is successful, redirects to cart page
    if ($query->execute()) {
        header('location: ../cart.php');
    }

    //if insert fails, redirects to homepage
    else {
        $_SESSION['atc_failed'] = true;
        header('location: ../index.php');
    }

    //closes db connection
    $db = null;
    exit();
?>