<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/index.css">
    <title>Your ADA Pharmacy Cart</title>
</head>
<body>
<div class="box bg-img">
    <div class="content">
    <h2>Your ADA Pharmacy <span> CART</span></h2>
    <table style = 'width:99%; border:1px white solid;'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
     $total = "";
            if(isset($_POST['Update'])){
                $update = $_POST['Quantity'];
            }else{
                $update = 1;
            }
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value){
                    $sr = $key+1;
                    (float)$total = (float)$total+((float)$value['Price']*$update);
                    echo"
                    <tr>
                       <th>$sr</th>
                       <td>$value[Item_Name]</td>
                       <td>$$value[Price]</td>
                       <form action = '' method = 'POST'>
                       <td><input class='login-input' type='number' name='Quantity' value = '$update' min = '1' max = '10'></td>
                       <td>
                                <button class='login-btn' name='Update'>UPDATE</button>
                                <input type='hidden'  value='$value[Quantity]'>
                            </form>
                       </td>
                       <td>
                            <form action = 'addtocart.php' method = 'POST'>
                                <button class='login-btn' name='Remove'>REMOVE</button>
                                <input type='hidden' name='Item-Name' value='$value[Item_Name]'>
                            </form>
                       </td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
    <h3>Total <?php echo "$ $total" ?></h3><br>
    <form action = 'AddtoCart.php' method = 'POST'>
    <div class="content">
            <h2>CHECKOUT <span> BELOW</span></h2>
            <form action="./php/user/signup.php" method="POST">
            <div class="forms">
              <div class="user-input">
                <input type="text" class="login-input" placeholder="Email Address" id="email" name="email" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="user-input">
                <input type="text" class="login-input" placeholder="Your Name" id="uname" name="uname" required>
            </div>
            <div class="user-input">
                <input type="text" class="login-input" placeholder="Phone number" id="number" name="number" required>
            </div>
              <div class="pass-input">
                <input type="text" class="login-input" placeholder="Address" id="my-password"  name="password" required>
                </span>
              </div>
            </div>
        <?php
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value){
            echo "<input type='hidden' name='Item-Name' value='$value[Item_Name]'>";
           }
        }
        ?>
        <button name ="Purchase" class="login-btn">Purchase</button>
        <p class="f-pass"><a href="Product.php">Continue Shopping</a></p>
    </form>
    </div>
</body>
</html>