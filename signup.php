<?php

include("../databaseConnection.php");

// Start Session
session_start();

$Email = $_POST['email'];
$Uname = $_POST['uname'];
$Password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Email = stripcslashes($Email);
    $Uname = stripcslashes($Uname);
    $Password = stripcslashes($Password);

    // Preventing SQL Injection
    $Email = mysqli_real_escape_string($conn,$Email);
    $Password = mysqli_real_escape_string($conn,$Password);
    $Uname = mysqli_real_escape_string($conn,$Uname);

    // Encrpting Password
    // $Password = hash("sha512", $Password);
    // $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    // Database Query
    $Sql = "INSERT INTO `user` (`UID`, `UNAME`, `EMAIL`, `PASSWORD`) VALUES (NULL, '$Uname', '$Email', '$Password') ";

    if($conn -> query($Sql) === TRUE){
        echo "<script>
        alert('ACCOUNT CREATED SUCCESSFULLY!');
        window.location.href = '../sc_usersu.html';
        </script>";
    }else{
        echo "Error Inserting Data: ".$conn->error;
    }
    $conn -> close();
}

?>
