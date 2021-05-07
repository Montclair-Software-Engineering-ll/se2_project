<?php



?>
<!DOCTYPE html>
<html>

<head>
    <title>Swift Care - User Orders</title>
    <meta charset="utf-8" />
    <meta name="author" content="SE2 - Group 2" />
    <meta name="description" content="Main store page of Swift Care" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- First link refers to the main.css file and second link is used for website icon -->
    <link rel="stylesheet" href="css/blue_page.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="icon" href="images/sc_logo_admin_K7A_icon.ico" />
</head>

<body>
    <!-- Create a form that takes a username, username, and password. If the requirements are met, then
			post the user details to the database -->
    <div class="BoxPanel" id="LoginPanel">
        <div style = "display: flex; align-items: center">
            <img class = "LogoSmall" id = "LogoForm" src = "images/user_panel.png" alt = "Swift Care logo"/>
            <h1 class = "OrbitronTitle" id = "TitleForm">User - View Orders</h1>
        </div>
        <center>
            <table class="marginContentSpace" style = "margin-bottom: 50px">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Order ID</p></th>
                        <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Order Name</p></th>
                        <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black">Order Price</p></th>
                        <th scope="col" style="padding-right: 20px;"><p class = "SignikaText" style = "color: black"></p></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- **TODO: Show Order Here -->
                                <tr>
                                   <th scope="row"><p class = "SignikaText" style = "color: black">1</p></th>
                                   <td><p class = "SignikaText" style = "color: black">Product Name</p></td>
                                   <td><p class = "SignikaText" style = "color: black">Product Price</p></td>
                                   <td><button type = "submit" class = "searchButton"><p class = "SignikaText" style = "margin: 0; color: white">Cancel Order</p></button></td>
                                </tr>
                    <!-- Loop End HERE -->
                </tbody>
            </table>
            <a href = "user_profile.php">
                <img class = "Icon" id = "UserIcon" style = "position: absolute; left: 20px; bottom: 25px;" src = "images/back_arrow.png" alt = "Back Arrow"/>
            </a>       
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