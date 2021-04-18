<?php

include("../Database/Connection.php");

// Start Session
session_start();

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$image = $_POST['image'];
$des = $_POST['des'];
$Categories = $_POST['Categories'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Sql = "INSERT INTO `meds`(`ID`, `Name`, `Categories`, `price`, `stock`, `image`, `des`) VALUES (NULL,'$name', '$Categories','$price','$stock','$image','$des') ";

    if($conn -> query($Sql) === TRUE){
        echo "<script>
        alert('PRODUCT ADDED SUCCESSFULLY!');
        window.location.href = '../Insertproduct.htm';
        </script>";
    }else{
        echo "Error Inserting Data: ".$conn->error;
    }
    $conn -> close();
}


























?>