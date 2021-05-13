<?php
//include database connection
require_once 'database_connection.php';

//include session info
session_start();

//checks if user is logged in; if not, redirects to user login page
if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: user_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Location: user_vieworder.php');
}

// SQL statements to delete order contents from orders and orderitems tables
if (isset($_POST['options'])) {
    $stmt = $db->prepare("DELETE FROM orders WHERE (orderID=?)");
    $stmt->execute([$_POST['options']]);
    $stmt = $db->prepare("DELETE FROM orderitems WHERE (orderID=?)");
    $stmt->execute([$_POST['options']]);

    header('Location: user_vieworder.php');
} else {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Swift Care - Order Details</title>
    <meta charset="utf-8" />
</head>

<body>
    <h1>Order Details</h1>
    <?php
    // SQL statement to display order table contents with matching orderID
    try {
        $stmt = $db->prepare("SELECT * FROM orders WHERE orderID=?");
        $stmt->execute([$_POST['order_id']]);
        $results = $stmt->fetchAll();

        if (empty($results)) {
            echo '<p>No past orders.</p>';
        } else {

            //outputs order address and cardInfo as rows
            foreach ($results as $row) {
                echo '
                    <p class="SignikaText" style="color: black">' . $row['address'] . '</p>
                    <p class="SignikaText" style="color: black">' . $row['cardInfo'] . '</p>
                    ';
            }
        }
    } catch (PDOException $e) { // Shouldn't execute in production
        echo "Connection failed: " . $e->getMessage();  // Prints error messages while testing
    }
    ?>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        // SQL statement to display all orderitems rows with an orderID that matches the orderID in the orders table
        try {
            $stmt = $db->prepare("SELECT * FROM orderitems OI, products P WHERE OI.IID=P.ID AND OI.orderID=?");
            $stmt->execute([$_POST['order_id']]);
            $results = $stmt->fetchAll();

            if (empty($results)) {
                echo '<p>No past orders.</p>';
            } else {

                //outputs each order as a row
                foreach ($results as $row) {
                    echo '<tr>
                    <th scope="row">
                    <p class="SignikaText" style="color: black">' . $row['name'] . '</p>
                </th>
                <td>
                    <p class="SignikaText" style="color: black">' . $row['price'] . '</p>
                </td>
                <td>
                    <p class="SignikaText" style="color: black">' . $row['quantity'] . '</p>
                </td>
                </tr>';
                }
            }
        } catch (PDOException $e) { // Shouldn't execute in production.
            echo "Connection failed: " . $e->getMessage();  // Prints error messages while testing
        }
        ?>
    </table>
    <div style="margin-top: 80px">
        <form action="" method="post">
        <?php
            echo '
            <button type="submit" class="searchButton" name="options" value="' . $_POST['order_id'] . '">
            <p class="SignikaText" style="margin: 0; color: white">Cancel Order</p>
            </button>
            ';
        ?>
        </form>
    </div>
</body>

</html>

<?php
}
?>