<?php
// Start Session
session_start();

$notice = "";

if (isset($_SESSION['new_log']) && $_SESSION['new_log'] == true) {
        $notice = "<p class = 'SignikaText' id = 'CorrectInfo'>You are now logged in!</p>";
        unset($_SESSION['new_log']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Swift Care - Control Panel</title>
		<meta charset = "utf-8"/>
		<meta name = "author" content = "SE2 - Group 2"/>
		<meta name = "description" content = "Main store page of Swift Care"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- First link refers to the main.css file and second link is used for website icon -->
		<link rel = "stylesheet" href = "css/red_page.css" type = "text/css">
		<link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
		<link rel = "icon" href = "images/sc_logo_admin_K7A_icon.ico"/>
	</head>
	<body>
		<!-- Create a form that takes a username, username, and password. If the requirements are met, then
			post the user details to the database -->
		<div class = "BoxPanel" id = "LoginPanel" style = "height: 480px">
			<div style = "display: flex; align-items: center">
				<img class = "LogoSmall" id = "LogoForm" src = "images/admin_panel.png" alt = "Swift Care logo"/>
				<h1 class = "OrbitronTitle" id = "TitleForm" style = "color: #a10000">Admin - Control Panel</h1>
			</div>
			<div class = "marginContentSpace" style = "display: flex; align-items: center">
				<img class = "LogoSmall" id = "LogoLabel" src = "images/admin_adp.png">
				<a href = "" class = "ClickButton" id = "AdminPanelButton">Add or Delete Products</a>
			</div>
			<div class = "marginContentSpace" style = "display: flex; align-items: center">
				<img class = "LogoSmall" id = "LogoLabel" src = "images/admin_ud.png">
				<a href = "" class = "ClickButton" id = "AdminPanelButton">View User Details</a>
			</div>
			<div class = "marginContentSpace" style = "display: flex; align-items: center">
				<img class = "LogoSmall" id = "LogoLabel" src = "images/admin_vpo.png">
				<a href = "" class = "ClickButton" id = "AdminPanelButton">View and Process Orders</a>
			</div>
			<!-- Dynamic message that displays a message to the user. -->
			<?php echo $notice;?>
			</form>
			<!-- Log out button that sends admin back to home page -->
			<a href = "index.php">
				<img class = "Icon" id = "LogoutIcon" src = "images/admin_logout.png" alt = "Log out"/>
			</a>
		</div>
	</body>
	<!-- Footer portion is used to showcase group number, college, and course. -->
	<footer style = "text-align: center">
			<p class = "SignikaText" id = "footerText">
				&copy; 2021 - 2021 Group 2.<br/>
				Montclair State University - Computer Science and Technology.<br/>
				CSIT415 - Software Engineering II.
			</p>
	</footer>
</html>
