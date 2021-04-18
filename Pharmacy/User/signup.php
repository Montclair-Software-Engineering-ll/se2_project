<?php

include("../Database/Connection.php");

// Start Session
session_start();

$Email = $_POST['email'];
$Uname = $_POST['uname'];
$Number = $_POST['number'];
$Password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Email = stripcslashes($Email);
    $Uname = stripcslashes($Uname);
    $Number = stripcslashes($Number);
    $Password = stripcslashes($Password);

    // Preventing SQL Injection
    $Email = mysqli_real_escape_string($conn,$Email);
    $Password = mysqli_real_escape_string($conn,$Password);
    $Uname = mysqli_real_escape_string($conn,$Uname);
    $Number = mysqli_real_escape_string($conn,$Number);

    // Encrpting Password
    // $Password = hash("sha512", $Password);
    // $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    // Database Query
    $Sql = "INSERT INTO `user` (`UID`, `UNAME`, `EMAIL`, `PASSWORD`, `UNUMBER`) VALUES (NULL, '$Uname', '$Email', '$Password', '$Number') ";

    if($conn -> query($Sql) === TRUE){
        echo "<script>
        alert('ACCOUNT CREATED SUCCESSFULLY!');
        window.location.href = '../UserLogin.htm';
        </script>";
    }else{
        echo "Error Inserting Data: ".$conn->error;
    }
    $conn -> close();
}

?>