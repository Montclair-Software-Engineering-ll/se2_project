<?php

include("../Database/Connection.php");

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = stripcslashes($email);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM stocker where email = '$email' and password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $counter = mysqli_num_rows($result);

    if($counter == 1){
        $_SESSION['login_user'] = $email;
        header("location: Stock.php");
    }else{
        echo "<script>
        alert('SOMETHING WENT WRONG!');
        window.location.href = '../StockerLogin.htm';
        </script>";
    }
}

?>




























?>