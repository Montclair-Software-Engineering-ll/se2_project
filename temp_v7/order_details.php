<?php
    //include database connection
    require_once 'database_connection.php';

    //include session info
    session_start();

    //gets order ID
    $order_id = $_POST['order_id']; 

    //checks if admin is logged in; if not, redirects to admin login page
    if (!(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true)) {
	    header('Location: admin_login.php');
	    exit();
    }

    //gets items in order
    $stmt = 'select * from orderitems where orderID = :order_id';
    $query = $db->prepare($stmt);
    $query->bindParam(':order_id', $order_id);
    $query->execute();
    $results = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Swift Care - Order Details</title> 
	    <meta charset = "utf-8"/>
    </head>

    <body>
        <h1>Order Details</h1>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php
                foreach ($results as $row) {
                    //gets name and price of product from ID
                    $stmt = 'select name, price from products where id = :prod_id';
                    $query = $db->prepare($stmt);
                    $query->bindParam(':prod_id', $row['IID']);
                    $query->execute();
                    $return = $query->fetch();

                    //outputs information in table row
                    echo '<tr>
                        <td>'.$return['name'].'</td>
                        <td>$'.$return['price'].'</td>
                        <td>'.$row['quantity'].'</td>
                    </tr>';
                }
            ?>
        </table>
    </body>
</html>