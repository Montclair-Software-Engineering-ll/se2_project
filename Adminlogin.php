<?php

include("../Database/Connection.php");

// Start Session
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = stripcslashes($email);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM admin where email = '$email' and password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $counter = mysqli_num_rows($result);

    if($counter == 1){
        $_SESSION['login_user'] = $email;
        header("location: ../sc_adminlogin.html");
    }else{
        echo "<script>
        alert('Something Went Wrong!');
        window.location.href = '../sc_adminlogin.html"';
        </script>";
    }
}
?>
