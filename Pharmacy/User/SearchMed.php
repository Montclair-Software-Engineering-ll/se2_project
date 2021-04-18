<?php
    include("../Database/Connection.php");

    $searchtype= 'Name';
    $searchterm=trim($_POST['Term']);

    $query = "SELECT `ID`, `Name`, `Categories`, `price`, `stock`, `des` FROM `meds` WHERE Name like '%".$searchterm."%' ";
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
    <title>MATCHED RESULT</title>
</head>
<body>
    <div class="box bg-img">
        <div class="content">
            <h2>Ada's<span> Pharmacy</span></h2>
            <h2>MATCHED<span> RESULT</span></h2>
            <table style="border: 1px solid #ffce00;">
                <thead>
                    <tr>
                        <th>&nbsp;&nbsp;PRODUCT ID&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT NAME&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT CATEGORIES&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT PRICE&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT STOCK&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;PRODUCT DESCRIPTION&nbsp;&nbsp;</th>
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
                        echo "<td>".$Sale['des']."</td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>
                <p class="new-account">Dont want? <a href="../UserPanel.htm">GO BACK!</a></p>
        </div>
    </div>
<?php } ?>
</body>
</html>