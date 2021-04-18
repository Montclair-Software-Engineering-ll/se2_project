<?php
    include("../Database/Connection.php");

    $query = "SELECT `ID`, `Name`, `PhNumber`, `Email`, `ord` FROM `sale`";
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
    <title>TOTAL SALES</title>
</head>
<body>
    <div class="box bg-img">
        <div class="content">
            <h2>Ada's<span> Pharmacy</span></h2>
            <h2>TOTAL<span> SALES</span></h2>
            <table style="border: 1px solid #ffce00;">
                <thead>
                    <tr>
                        <th>&nbsp;&nbsp;CUSTOMER ID&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;CUSTOMER NAME&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;CUSTOMER NUMBER&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;CUSTOMER EMAIL&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;CUSTOMER ORDER&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     while($Sale = mysqli_fetch_array($queryfire)){
                        echo "<tr>";
                        echo "<td>".$Sale['ID']."</td>";
                        echo "<td>".$Sale['Name']."</td>";
                        echo "<td>".$Sale['PhNumber']."</td>";
                        echo "<td>".$Sale['Email']."</td>";
                        echo "<td>".$Sale['ord']."</td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>
            <form action="DeleteOrder.php" method="post">
                <p class="f-pass">DELETE USER ORDER:</p>
                <div class="user-input">
                    <input type="text" class="login-input" placeholder="ENTER CUSTOMER ID" id="Term" name="Term" required>
                    <button class="login-btn">DELETE</button>
                    <p class="new-account">Dont want? <a href="../EmpPanel.htm">GO BACK!</a></p>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
</body>
</html>