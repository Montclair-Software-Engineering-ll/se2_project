<?php

include("../Database/Connection.php");

// Start Session
session_start();

$ID = $_POST['Term'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = stripcslashes($ID);
    $ID = mysqli_real_escape_string($conn,$ID);

    $sql = "DELETE FROM sale WHERE ID = $ID";
    $result = mysqli_query($conn,$sql);

    if(! $result ) {
        die('Could not delete data: ' .$conn->error);
     }
     echo "<script>
     alert('Deleted Succesfully!');
     window.location.href = 'Sale.php';
     </script>";
}

?>