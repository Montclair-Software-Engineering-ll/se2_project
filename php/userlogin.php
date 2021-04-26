<?php

include("../databaseConnection.php");

session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = stripcslashes($username);
    $username = mysqli_real_escape_string($conn,$username);
    $email = stripcslashes($email);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM user where username = '$username' and email = '$email' and password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $counter = mysqli_num_rows($result);

    if($counter == 1){
        $_SESSION['login_user'] = $email;
        header("location: ../sc_usersu.html");
    }else{
        echo "<script>
        alert('SOMETHING WENT WRONG!');
        window.location.href = '../sc_usersu.html';
        </script>";
    }
}

?>




























?>
