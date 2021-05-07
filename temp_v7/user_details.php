<?php

//includes db connection
require_once 'database_connection.php';

//general search statement for if no search was performed
$stmt = 'SELECT * FROM `users`';

//preparese db query
$query = $db->prepare($stmt);

//runs query and gets results
$query->execute();
$results = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Swift Care - Manage User Details</title>
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
    <div class="marginContentSpace" style="display: flex; align-items: center">

        <div class="BoxPanel" id="LoginPanel" style="height: 600px">
            <a href="admin_panel.php">
                <div style="display: flex; align-items: center">
                    <img class="LogoSmall" id="LogoForm" src="images/admin_panel.png" alt="Swift Care logo" />
                    <h1 class="OrbitronTitle" id="TitleForm" style="color: #a10000">Admin - Control Panel</h1>
                </div>
            </a>
            <h4>All User Details are here:</h4>
            <center>
                <table class="marginContentSpace">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="padding-right: 20px;">User ID</th>
                            <th scope="col" style="padding-right: 20px;">User Name</th>
                            <th scope="col" style="padding-right: 20px;">User Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- **TODO: Show User Here -->
                        <?php 
				           if ($results) {
					       //table is created
					       foreach ($results as $row) {
						   //each item is output in a table cell
						    echo '
                                <tr>
                                   <th scope="row">'.$row['id'].'</th>
                                   <td>'.$row['username'].'</td>
                                   <td>'.$row['email'].'</td>
                                </tr>
				        		';
				        	}
			        	}
		            	?>
                        <!-- Loop End HERE -->
                    </tbody>
                </table>
                <!-- Delete Function Here -->
                <div class="form">
                    <form action="" method="post">
                        <input class="InputField SubmitButton" type="text" name="product_id" id=""
                            placeholder="Enter User ID" style="padding-right: 50px;background-color: #FFF">
                        <input class="SubmitButton" style="background-color: #a10000" type="submit" value="Delete" />
                    </form>
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