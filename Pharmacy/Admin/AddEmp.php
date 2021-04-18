<?php

include("../Database/Connection.php");

// Start Session
session_start();

$Email = $_POST['email'];
$Password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Email = stripcslashes($Email);
    $Password = stripcslashes($Password);

    // Preventing SQL Injection
    $Email = mysqli_real_escape_string($conn,$Email);
    $Password = mysqli_real_escape_string($conn,$Password);

    // Encrpting Password
    // $Password = hash("sha512", $Password);
    // $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    // Database Query
    $Sql = "INSERT INTO `emp` (`ID`, `EMAIL`, `PASSWORD`) VALUES (NULL, '$Email', '$Password') ";

    if($conn -> query($Sql) === TRUE){
        echo "<script>
        alert('ADDED EMPLOYEE!');
        window.location.href = '../adminPanel.htm';
        </script>";
    }else{
        echo "Error Inserting Data: ".$conn->error;
    }
    $conn -> close();
}

?>