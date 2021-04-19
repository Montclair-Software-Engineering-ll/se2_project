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
		<title>Swift Care - Admin Login</title>
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
		<!--outputs notice for user-->
		<?php echo $notice; ?>
		<!-- Create a form that takes a username, username, and password. If the requirements are met, then
			post the user details to the database -->
		<div class = "BoxPanel" id = "LoginPanel" style = "height: 350px">
			<div style = "display: flex; align-items: center">
				<img class = "ScLogoSmall" id = "ScLogoForm" src = "images/sc_logo_admin.png" alt = "Swift Care logo"/>
				<h1 class = "OrbitronTitle" id = "ScTitleForm" style = "color: #a10000">Swift Care - Admin Login</h1>
			</div>

			<form action = "process/process_admin_login.php" method = "post" autocomplete = "off">
				<div class = "marginContentSpace">
					<label class = "SignikaLabel" id = "LabelForm" for = "username_sec">Username:</label>
					<input class = "InputField" id = "LoginSignupField" name = "username" type = "name" id = "username_sec" placeholder = "username" required/>
				</div>
				<div class = "marginContentSpace">
					<label class = "SignikaLabel" id = "LabelForm" for = "pass_sec">Password:</label>
					<input class = "InputField" id = "LoginSignupField" name = "password" type = "password" id = "pass_sec" placeholder = "********" required/>
				</div>
					<input class = "SubmitButton" style = "background-color: #a10000" type = "submit" value = "Submit"/>

				<!-- Dynamic message that tells you if there is an ERROR but originally will welcome you to the form -->
				<div>
					<!-- <p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;"><?php echo $signup_message;?></p> -->
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
</html>