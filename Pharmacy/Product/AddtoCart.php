<?php
include("../Database/Connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Add_To_Cart'])){
        if(isset($_SESSION['cart'])){
            $myitems = array_column($_SESSION['cart'],'Item_Name');
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name'=>$_POST['Item-Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
                echo "<script>
                alert('Item Added!');
                window.location.href = 'Product.php';
                </script>";
        }else{
            $_SESSION['cart'][0] = array('Item_Name'=>$_POST['Item-Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            echo "<script>
            alert('Item Added!');
            window.location.href = 'Product.php';
            </script>";
        }
    }
    if(isset($_POST['Remove'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item-Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                alert('Item Removed!');
                window.location.href = 'Cart.php';
                </script>";
            }
        }
    }

$Email = $_POST['email'];
$Uname = $_POST['uname'];
$Number = $_POST['number'];
$Address = $_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $Email = stripcslashes($Email);
    $Uname = stripcslashes($Uname);
    $Number = stripcslashes($Number);
    $Address = stripcslashes($Address);

    // Preventing SQL Injection
    $Email = mysqli_real_escape_string($conn,$Email);
    $Address = mysqli_real_escape_string($conn,$Address);
    $Uname = mysqli_real_escape_string($conn,$Uname);
    $Number = mysqli_real_escape_string($conn,$Number);

    if(isset($_POST['Purchase'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item-Name']){
                $sql = "UPDATE `meds` SET `stock` = stock-$value[Quantity] WHERE `meds`.`Name` = '$value[Item_Name]' ";
                $result = mysqli_query($conn,$sql);
                $insert = "INSERT INTO `sale` ( `Name`, `Address`, `PhNumber`, `Email`, `ord`, `Qnt`) VALUES ('$Uname', '$Address', '$Number', '$Email', '$value[Item_Name]', 1) ";
                if($conn -> query($insert) === TRUE){
                    echo "Data Inserted Successfully!!";
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "<script>
                    alert('Purchased!');
                    window.location.href = 'Product.php';
                    </script>";
                }else{
                    echo "Error Inserting Data: ".$conn->error;
                    die('Could not Puchased data: ' .$conn->error);
                }
            }
        }
    }
}
}

?>
