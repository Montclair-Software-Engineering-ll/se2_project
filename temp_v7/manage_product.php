<?php

//includes db connection
require_once 'database_connection.php';

//general search statement for if no search was performed
$stmt = 'select id, name, price, category from products';

//preparese db query
$query = $db->prepare($stmt);

//runs query and gets results
$query->execute();
$results = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Swift Care - Add or Delete Products</title>
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
    <div class="marginContentSpace">
        <div class="BoxPanel" id="LoginPanel" style="height: 620px">
            <form action="" method="post" autocomplete="off">
                <div style="display: flex; align-items: center">
                    <img class="LogoSmall" id="LogoForm" src="images/admin_adp.png" alt="Swift Care logo" />
                    <h1 class="OrbitronTitle" id="TitleForm" style="color: #a10000">Admin - Add Product</h1>
                </div>
                <div class="marginContentSpace">
                    <label class="SignikaLabel" id="LabelForm" for="username_sec">Name:</label>
                    <input class="InputField" id="LoginSignupField" name="product_name" type="text" id="productname_sec"
                        required />
                </div>
                <div class="marginContentSpace">
                    <label class="SignikaLabel" id="LabelForm" for="">Category:</label>
                    <input class="InputField" id="LoginSignupField" name="product_cat" type="text" id="product_cat_sec"
                        required />
                </div>
                <div class="marginContentSpace">
                    <label class="SignikaLabel" id="LabelForm" for="">Price:</label>
                    <input class="InputField" id="LoginSignupField" name="product_cat" type="number"
                        id="product_price_sec" required />
                </div>
                <div class="marginContentSpace">
                    <label class="SignikaLabel" id="LabelForm" style = "position: relative; bottom: 20px" for="">Description:</label>
                    <textarea name="" id="" cols="30" rows="2" class="InputField" style = "resize: none; outline: 0; border-radius: 25px; padding: 15px; border: 0;width: 40%; min-width: 120px;"></textarea>
                </div>
                <div class="marginContentSpace" style = "margin-top: 25px">
                    <label class="SignikaLabel" id="LabelForm" for="">Image:</label>
                    <input class="InputField" id="LoginSignupField" name="product_cat" type="file"
                        id="product_price_sec" required />
                </div>
                <!-- Dynamic message that displays a message to the user. -->
                <input class="SubmitButton" style="background-color: #a10000" type="submit" value="Add Product" />
                <a href = "admin_panel.php">
                    <img class = "Icon" id = "UserIcon" style = "position: absolute; left: 20px; bottom: 25px;" src = "images/back_arrow_admin.png" alt = "Back Arrow"/>
                </a>
            </form>
        </div>

        <div class="BoxPanel" id="LoginPanel">
                <div style="display: flex; align-items: center">
                    <img class="LogoSmall" id="LogoForm" src="images/admin_adp.png" alt="Swift Care logo" />
                    <h1 class="OrbitronTitle" id="TitleForm" style="color: #a10000">Admin - Remove Product</h1>
                </div>
            <center>
                <table class="marginContentSpace" style = "margin-top: 35px">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Product ID</p></th>
                            <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Product Name</p></th>
                            <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Product Category</p></th>
                            <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Product Price</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- **TODO: Show Product Here -->
                        <?php 
				           if ($results) {
					       //table is created
					       foreach ($results as $row) {
						   //each item is output in a table cell
						    echo '
                                <tr>
                                   <th scope="row"><p class = "SignikaText" style = "color: black">'.$row['id'].'</p></th>
                                   <td><p class = "SignikaText" style = "color: black">'.$row['name'].'</p></td>
                                   <td><p class = "SignikaText" style = "color: black">'.$row['category'].'</p></td>
                                   <td><p class = "SignikaText" style = "color: black">'.$row['price'].'</p></td>
                                </tr>
				        		';
				        	}
			        	}
		            	?>
                        <!-- Loop End HERE -->
                    </tbody>
                </table>
                <!-- Delete Function Here -->
                <div style = "margin-top: 80px">
                    <form action="" method="post">
                        <input class="InputField SubmitButton" type="text" name="product_id" id=""
                            placeholder="Enter Product ID" style="padding-right: 50px; background-color: #FFF; color: black">
                        <input class="SubmitButton" style="background-color: #a10000" type="submit" value="Delete" />
                    </form>
                    <a href = "admin_panel.php">
                        <img class = "Icon" id = "UserIcon" style = "position: absolute; left: 20px; bottom: 25px;" src = "images/back_arrow_admin.png" alt = "Back Arrow"/>
                    </a>
                </div>
            </center>
        </div>
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