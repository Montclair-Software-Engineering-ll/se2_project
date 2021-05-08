<?php
require 'database_connection.php';

// if (isset($_SESSION['user_id'])) { // Checks if the user is currently logged in. If they are redirect to dashboard instead.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

    try {

        foreach ($_POST as $param_name => $param_val) {
            if ((int)$param_val >= 1) {
                //SQL statement to print order contents of selected order number
                $stmt = $pdo->prepare("SELECT O.orderID, O.totalPrice, I.name, I.quantity FROM orderitems I, orders O WHERE I.orderID = O.orderID AND O.orderID = " . $param_name . "");
            }
        }
?>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
            </tr>

        <?php
        //For loop to print list of items and quantity purchased
        for ($i = 0; $i < $stmt->num_rows; $i++) {
            $result = $stmt->fetch();
            $name = $result['name'];
            $name = str_replace("_", " ", $name);
            echo '<td>' . $name . '</td>';
            echo '<td>' . $result['quantity'] . '</td></tr>';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

        ?>

        </table>

        <?php

        $total = $stmt->fetch();
        echo '<p>Total price of items ordered: $' . $result['totalPrice'] . '</p>';

        $pdo = null;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        try {

            //SQL statement to list all past orders on a specific account
          //  $stmt = $pdo->query("SELECT orderID FROM orders O WHERE UID = " . $_SESSION['user_id'] . "");
        ?>

            <form action="" method="post">
                <h1>Select the order number you would like to view.</h1>
            <?php
            for ($i = 0; $i < $stmt->num_rows; $i++) {
                $result = $stmt->fetch();
                //Print past orders on an account
                echo '<input type="submit" name ="' . $result['orderID'] . '" value = "' . $result['orderID'] . '">';
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

            ?>

            </form>

        <?php
        $pdo = null;
    }
/* }
 else {
    header("location: login.php");
  }
*/