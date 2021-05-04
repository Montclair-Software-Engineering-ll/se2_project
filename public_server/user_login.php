<?php
// Start Session
session_start();

$notice = '';

// checks if the user tried to login and failed
if (isset($_SESSION['login_fail']) && $_SESSION['login_fail'] == true) {
		$notice = '<p>Incorrect login info. Please try again.</p>';

		unset($_SESSION['login_fail']);
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Swift Care - User Login</title>
		<meta charset = "utf-8"/>
		<meta name = "author" content = "SE2 - Group 2"/>
		<meta name = "description" content = "Main store page of Swift Care"/>
		<meta name = "viewport" content = "width=device-width, initial-scale=1"/>

		<!-- First link refers to the main.css file and second link is used for website icon -->
		<link rel = "stylesheet" href = "css/blue_page.css" type = "text/css">
		<link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
		<link rel = "icon" href = "images/sc_logo_CY8_icon.ico"/>
	</head>

	<body>
		<!-- Create a form that takes a username and password. If the requirements are met through the database, then the user will successfully log in. -->
		<div class = "BoxPanel" id = "LoginPanel">
			<div style = "display: flex; align-items: center;">
				<img class = "ScLogoSmall" id = "ScLogoForm" src = "images/sc_logo.png" alt = "Swift Care logo"/>
				<h1 class = "OrbitronTitle" id = "ScTitleForm">Swift Care - User Login</h1>
			</div>

			<!-- Inside the box container, we have the labels and inputs for username and password. There is a link that sends a user to a signup page. -->
			<form action = "#" method = "post" autocomplete = "off">
				<div class = "marginContentSpace">
					<label class = "SignikaLabel" id = "LabelForm" for = "username_sec">Username:</label>
					<input class = "InputField" id = "LoginSignupField" name = "username" type = "name" id = "username_sec" placeholder = "username123" required/>
				</div>
				<div class = "marginContentSpace">
					<label class = "SignikaLabel" id = "LabelForm" for = "pass_sec">Password:</label>
					<input class = "InputField" id = "LoginSignupField" name = "password" type = "password" id = "pass_sec" placeholder = "********" required/>
				</div>
				<div class = "marginContentSpace">
					<a href = "user_signup.php" class = "SignupButton">Don't have an account? Sign up here!</a>
				</div>
				<input class = "SubmitButton" type = "submit" value = "Submit"/>

				<!-- Dynamic message that tells you if there is an ERROR but originally will welcome you to the form -->
				<div>
					<!--<p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;"><?php echo $signup_message;?></p>-->
				</div>
			</form>
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
		<a href = "admin_login.php">
			<img class = "Icon" id = "AdminIcon" src = "images/admin_gear.png" alt = "Admin Icon"/>
		</a>
</html>
