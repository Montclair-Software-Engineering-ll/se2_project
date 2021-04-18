<?php

include("../Database/Connection.php");

// Start Session
session_start();

$ID = $_POST['Term'];
$stock = $_POST['stock'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = stripcslashes($ID);
    $ID = mysqli_real_escape_string($conn,$ID);

    $sql = "UPDATE `meds` SET `stock`= $stock WHERE ID = $ID";
    $result = mysqli_query($conn,$sql);

    if(! $result ) {
        die('Could not delete data: ' .$conn->error);
     }
     echo "<script>
     alert('Restocked Succefully!');
     window.location.href = 'Stock.php';
     </script>";
}
?>