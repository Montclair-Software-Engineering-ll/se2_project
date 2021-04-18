<?php
    include("../Database/Connection.php");

    $query = "SELECT `ID`, `Name`, `Categories`, `price`, `stock`, `des` FROM `meds`";
    $queryfire = mysqli_query($conn, $query);
    $num = mysqli_num_rows($queryfire);
    if($num > 0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Index.css">
    <title>INVENTARY</title>
</head>
<body>
    <div class="box bg-img">
        <div class="content">
            <h2>Ada's<span> Pharmacy</span></h2>
            <h2>STOCK<span> AVAILABLE</span></h2>
            <table style="border: 1px solid #ffce00;">
                <thead>
                    <tr>
                        <th>&nbsp;&nbsp;PRODUCT ID&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT NAME&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT CATEGORIES&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT PRICE&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT STOCK&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     while($Sale = mysqli_fetch_array($queryfire)){
                        echo "<tr>";
                        echo "<td>".$Sale['ID']."</td>";
                        echo "<td>".$Sale['Name']."</td>";
                        echo "<td>".$Sale['Categories']."</td>";
                        echo "<td>".$Sale['price']."</td>";
                        echo "<td>".$Sale['stock']."</td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>
            <p class="f-pass"><a href="../Database/Logout.php">LOGOUT!</a></p>
<?php } ?>
      </div>
    </div>
</body>
</html>