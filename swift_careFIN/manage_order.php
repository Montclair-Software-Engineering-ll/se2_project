<?php
    //include database connection
    require_once 'database_connection.php';

    //include session info
    session_start();

    $notice = '';

    //checks if admin is logged in; if not, redirects to admin login page
    if (!isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
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
<html lang="en">

<head>
    <title>Swift Care - Order Details</title>
    <meta charset="UTF-8">
    <meta name="author" content="SE2 - Group 2" />
    <meta name="description" content="Main store page of Swift Care" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- First link refers to the main.css file and second link is used for website icon -->
    <link rel="stylesheet" href="css/red_page.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="icon" href="images/sc_logo_admin_K7A_icon.ico" />
</head>

<body>
        <div class="BoxPanel" id="LoginPanel" style="height: 600px; width: 1000px">
                <div style="display: flex; align-items: center">
                    <img class="LogoSmall" id="LogoForm" src="images/admin_vpo.png" alt="Swift Care logo" />
                    <h1 class="OrbitronTitle" id="TitleForm" style="color: #a10000">Admin - Order Details</h1>
                </div>
            <center>
                <?php echo $notice ?>
            <h1>Unprocessed Orders</h1>
            <?php 
                //gets unprocessed orders
                $stmt = 'select * from orders where adID = 0';
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
                $stmt = 'select * from orders where adID <> 0';
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
                <!-- Delete Function Here -->
                <div class="form">
                    <a href = "admin_panel.php">
                        <img class = "Icon" id = "UserIcon" style = "position: absolute; left: 20px; bottom: 25px;" src = "images/back_arrow_admin.png" alt = "Back Arrow"/>
                    </a>
                </div>
            </center>
        </div>
</body>
<!-- Footer portion is used to showcase group number, college, and course. -->
<footer style="text-align: center">
    <p class="SignikaText" id="footerText">
        &copy; 2021 - 2021 Group 2.<br />
        Montclair State University - Computer Science and Technology.<br />
        CSIT415 - Software Engineering II.
    </p>
</footer>

</html>