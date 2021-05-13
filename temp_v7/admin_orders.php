<?php
    //include database connection
    require_once 'database_connection.php';

    //include session info
    session_start();

    $notice = '';

    //checks if admin is logged in; if not, redirects to admin login page
    if (!(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true)) {
	    header('Location: admin_login.php');
	    exit();
    }

    //checks if order authorization was successful; if so, informers user
    if (isset($_SESSION['po_success']) && $_SESSION['po_success'] == true) {
        $notice = '<p>Order successfully authorized!</p>';

        unset($_SESSION['po_success']);
    }

    //checks if order authorization was successful; if so, informers user
    if (isset($_SESSION['po_failed']) && $_SESSION['po_failed'] == true) {
        $notice = '<p>Order authorization failed.</p>';

        unset($_SESSION['po_failed']);
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Swift Care - View Orders</title> 
		    <meta charset = "utf-8"/>
        </head>

        <body>
            <?php echo $notice ?>
            <h1>Unprocessed Orders</h1>
            <?php 
                //gets unprocessed orders
                $stmt = 'select * from orders where adID = "NULL"';
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
                                <form action="process/process_order.php" method="post">
                                    <input type="hidden" name="order_id" value="'.$row['orderID'].'">
                                    <input type="submit" value="Authorize">
                                </form>
                            </td>
                            <td>
                                <form action="order_details.php" method="post">
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
                $stmt = 'select * from orders where adID <> "NULL"';
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
                                <form action="order_details.php" method="post">
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