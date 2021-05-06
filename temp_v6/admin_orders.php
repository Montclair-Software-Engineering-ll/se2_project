<?php
    //include database connection
    require_once 'database_connection.php';

    //include session info
    session_start();

    //checks if admin is logged in; if not, redirects to admin login page
    if (!(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true)) {
	    header('Location: admin_login.php');
	    exit();
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Swift Care - View Orders</title> 
		    <meta charset = "utf-8"/>
        </head>

        <body>
            <h1>Unprocessed Orders</h1>
            <?php 
                //gets unprocessed orders
                $stmt = 'select * from orders where adID = ""';
                $query = $db->prepare($stmt);
                $query->execute();
                $results = $query->fetchAll();

                if (empty($results))
                    echo '<p>No unprocessed orders.</p>';

                else {
                    echo '<table>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>User ID</th>
                            <th>Timestamp</th>
                            <th>Authorized By</th>
                            <th>Order Details</th>
                        </tr>';

                    //outputs each order as a row
                    foreach ($results as $row) {
                        echo '<tr>
                            <td>'.$row['orderID'].'</td>
                            <td>'.$row['totalPrice'].'</td>
                            <td>'.$row['UID'].'</td>
                            <td>'.$row['timeStamp'].'</td>
                            <td>
                                <form action="#" method="post">
                                    <input type="hidden" name="order_id" value="'.$row['orderID'].'">
                                    <input type="submit" value="Authorize">
                                </form>
                            </td>
                            <td>
                                <form action="#" method="post">
                                    <input type="hidden" name="order_id" value="'.$row['orderID'].'">
                                    <input type="submit" value="View Details">
                                </form>
                            </td>
                        </tr>';
                    }

                    echo '</table>';
                }
            ?>

            <h1>Processed Orders</h1>
            <?php 
                //gets processed orders
                $stmt = 'select * from orders where adID <> ""';
                $query = $db->prepare($stmt);
                $query->execute();
                $results = $query->fetchAll();

                if (empty($results))
                    echo '<p>No processed orders.</p>';

                else {
                    echo '<table>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>User ID</th>
                            <th>Timestamp</th>
                            <th>Authorized By</th>
                            <th>Order Details</th>
                        </tr>';

                    //outputs each order as a row
                    foreach ($results as $row) {
                        echo '<tr>
                            <td>'.$row['orderID'].'</td>
                            <td>'.$row['totalPrice'].'</td>
                            <td>'.$row['UID'].'</td>
                            <td>'.$row['timeStamp'].'</td>
                            <td>'.$row['adID'].'</td>
                            <td>
                                <form action="#" method="post">
                                    <input type="hidden" name="order_id" value="'.$row['orderID'].'">
                                    <input type="submit" value="View Details">
                                </form>
                            </td>
                        </tr>';
                    }

                    echo '</table>';
                }
            ?>
        </body>
    </html>