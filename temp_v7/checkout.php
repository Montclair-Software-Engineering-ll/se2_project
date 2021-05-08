<?php
  require 'database_connection.php'; //require config file
?>
  //INCOMPLETE NEEDS TO BE UPDATED TO PDO AND HAVE PARTS REMOVED STILL
  <html>
  <body>

    <title>Checkout</title>
    
    <?php
    
    //Check to see if user if logged in
    if (isset($_SESSION['loggedin'])) {   

    //Post for after form submission
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cost = 0;
        echo '<h3>Receipt:</h3>';

        try {
          //SQL statement to select all products from orderitems and sort them by ID
          $stmt = mysqli_query($db, "SELECT * FROM orderitems ORDER BY orderID DESC LIMIT 1");
          $result = $stmt->fetch_assoc();
          if (isset($result['orderID'])) {
            $orderNum = (int)$result['orderID'] + 1;  //Increment orderID for table
          } else {
            $orderNum = 1;
          }
          // Display time that order was placed
          $timeStamp = date('H:i, jS F Y');
          echo "<p>Order processed at ".$timeStamp."</p>";
          echo '<p>Your order number is: ' . $orderNum . '</p>';
          // Loop to display each item ordered
          foreach ($_POST as $param_name => $param_val) {
            if ((int)$param_val >= 1) {
              // SQL statement to put the ordered items into orderitems table
              $stmt1 = $db->prepare("INSERT INTO orderitems (orderID, name, quantity) VALUES (?, ?, ?)");
              $stmt1->bind_param("ssd", $orderNum, $param_name, $param_val);
              $stmt1->execute();

              // SQL statement to pull price of the product and calculates the total cost of the order
              $stmt = $db->prepare("SELECT price FROM products where name=?");
              $stmt->bind_param("s", $param_name);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($price);
              $stmt->fetch();
              $cost = $cost + ((int)$param_val * $price);
              $name = $param_name;
              $name = str_replace("_", " ", $name);
              echo "Item: $name; Quantity: $param_val @ $$price<br><br>";
            }
          }
          // Display customer's chosen payment method for this order.
          $find = $_POST['find'];
          if($find == "a") {
	            echo "<p>Payment Method: Credit Card</p>";
	          } elseif($find == "b") {
	              echo "<p>Payment Method: Paypal</p>";
	            } else {
	                echo "<p>We do not know how this customer was able to pay.</p>";
	              }
	      // Display total price of items ordered
          echo "Total: $$cost";
          echo "</br>"; 
          echo "Please screenshot or save this receipt for future reference!";
          
          // SQL statement to insert order details into database
          $stmt1 = $db->prepare("INSERT INTO orders (totalPrice, UID) VALUES (?, ?)");
          $stmt1->bind_param("dd", $cost, $_SESSION['id']);
          $stmt1->execute();
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
        // Close connection to database
        mysqli_close($db);
      }

      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    ?>
        <div class="center">
          <form action="" method="post">
            <table stlye=border: 1px>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
              </tr>

              <?php

              try {
                //SQL statement to select name of all products in table
                $stmt = mysqli_query($db, "SELECT name FROM products");
                
                //For each product in the table, print the name and an input box
                for ($i = 0; $i < $stmt->num_rows; $i++) {
                  $result = $stmt->fetch_assoc();
                  $name = $result['name'];
                  $name = str_replace("_", " ", $name);
                  echo '<tr><td>' . $name . '</td>';
                  echo '<td><input type="text" name="' . $name . '"></td></tr>';
                }
              } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
                
              //Close database connection
              mysqli_close($db);
              ?>
              
              <!--Drop down menu for payment options-->
              <tr>
                <td>How are you paying?</td>
                <td><select name="find">
                    <option value="a">Credit Card</option>
                    <option value="b">Paypal</option>                                       
                  </select>
                </td>
             </tr>
              <tr>
                  <!--Submit button-->
                <td colspan="2"><br><button type="submit">Submit</button></td>
              </tr>
            </table>
          </form>
        </div>
   
    <?php
     }
    } else {
      ?><script>window.location.replace("login.php");</script><?php
    }
    ?>