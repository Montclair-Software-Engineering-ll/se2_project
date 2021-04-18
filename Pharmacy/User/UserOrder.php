<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Index.css">
    <title>Sale Data</title>
</head>
<body>
    <div class="box bg-img">
      <div class="content">
        <h2>Sales<span> Details</span></h2>
        <div class="forms">
        <?php

        include ("../Database/Connection.php");

        echo "<table style = 'width:99%; border:1px white solid;'>";
        echo "<tr>
        <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Name&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Address&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Phone Number&nbsp;&nbsp;</th><th>Email</th>
        <th>&nbsp;&nbsp;Order&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Unit&nbsp;&nbsp;</th>
        </tr>
        ";
        class TableRows extends RecursiveIteratorIterator{
            function __construct($values){
                parent::__construct($values, self::LEAVES_ONLY);
            }
            function current() {
                return "<td>".parent::current(). "</td>";
            }
            function beginChildren() {
                echo "<tr>";
                }
                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }
            $server = "localhost";
            $username = "malgies2";
            $password = "Jssp040108!!";
            $dbname = "Pharma";
            try {
                $ConnectionDB = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
                $ConnectionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $Statment = $ConnectionDB->prepare("SELECT * FROM `sale` WHERE `Email` LIKE '%$_SESSION[login_user]%'");
                $Statment->execute();
                $result = $Statment->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($Statment->fetchAll())) as $k=>$variable) {
                    echo $variable;
                }
            } catch (PDOException $th) {
                echo "Connection Failed!: ".$th->getMessage();
            }
            $ConnectionDB =  null;
            echo "</table></center><p>";
            ?>
            <p class="new-account"><a href="../UserPanel.htm">GO BACK!</a></p>
      </div>
    </div>
</body>
</html>