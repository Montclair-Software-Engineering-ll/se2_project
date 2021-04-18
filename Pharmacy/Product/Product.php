<?php session_start();

include("../Database/Connection.php");

if(isset($_POST['filter'])){
    $searchtype= ($_POST['searchtype']);
}else{
    $searchtype = "Cough, Cold, Allergy";
}
$count = 0;
if(isset($_SESSION['cart'])){
    $count = count($_SESSION['cart']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/product.css">
    <title>Customer - Login</title>
</head>
<body>
    <div class="box bg-img">
        <div class="content">
            <h2>ADA <span> PHARMACY </span></h2>
                <a href="Cart.php">
                    <h2><span> MY CART (<?php echo $count; ?>) </span></h2></a>
                    <p class="f-pass"><a href="../UserPanel.htm">GO BACK</a></p>
                    <div class="forms">
                    <form action="" method="POST"><center>
                        <p>Choose Search Type:</p>
                            <select class="login-input" name = 'searchtype'>
                            <option value="Cough, Cold, Allergy">Cough, Cold, Allergy</option>
                            <option value="Pain and Fever relief">Pain and Fever relief</option>
                            <option value="Sleeping Aids">Sleeping Aids</option>
                            <option value="Stomach Remedies">Stomach Remedies</option>
                            <option value="Anti-Itch/Fungal remedies">Anti-Itch/Fungal remedies</option>
                        </select>
                        <button class="login-btn" name="filter">Filter</button>
                   </form>
               </div>
           </div>
        </div>
<?php

    $query = "SELECT * FROM `meds` WHERE `Categories` LIKE '%$searchtype%' ";

    $queryfire = mysqli_query($conn, $query);
    $num = mysqli_num_rows($queryfire);
    if($num > 0){
        while($product = mysqli_fetch_array($queryfire)){
    ?>
    <form action="AddtoCart.php" method="POST">
    <div class="column">
      <div class="card">
        <img src="../images/<?php echo $product['image'] ?>.jpg" alt="" width="200px">
            <p><?php echo $product['Name'] ?> - $<?php echo $product['price'] ?> </p>
            <p><?php echo $product['Categories'] ?></p>
            <p>Available: <?php echo $product['stock'] ?></p>
            <p>Weight: <?php echo $product['Weight'] ?></p>
            <p><?php echo $product['des'] ?></p>
            <button class="login-btn" name="Add_To_Cart">Add to Cart</button>
            <input type="hidden" name="Item-Name" value="<?php echo $product['Name'] ?>">
            <input type="hidden" name="Price" value="<?php echo $product['price'] ?>">
        </div>
      </div>
  </form>
<?php
	}
}
?>
</body>
</html>