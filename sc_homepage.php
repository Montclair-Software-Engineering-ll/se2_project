<?php
	echo "<p>PHP ENABLED!</p>"
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Swift Care - Home Page</title>
		<meta charset = "utf-8"/>
		<meta name = "author" content = "SE2 - Group 2"/>
		<meta name = "description" content = "Main store page of Swift Care"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
		<!-- first link refers to the main.css file and second link is used for website icon -->
		<link rel = "stylesheet" href = "main.css" type = "text/css"/>
		<link rel = "icon" href = "images/sc_logo_CY8_icon.ico"/>
	</head>
	<body>
		<!-- this holds the top portion of the website with a box container that holds the logo, title, search bar, search button, 
			user icon, and cart icon --> 
		<div class = "webPanel">
			<img class = "scLogo" src = "images/sc_logo.png" alt = "Swift Care logo"/>
			<h1 class = "scTitle">Swift Care</h1>
			<form class = "searchFrame" action="">
				<button type = "submit" class = "searchButton">
					<img style = "width: 25px" src = "images/sc_search.png"/>
				</button>
				<input class = "searchPanel" type = "text" id = "search" name = "searchbar" placeholder = "Search..."/>
			</form>
			<a href = "">
				<img class = "icon" style = "margin-left: 20px" src = "images/sc_user.png" alt = "User Icon"/>
			</a>
			<a href = "">
				<img class = "icon" style = "margin-right: 30px" src = "images/sc_cart.png" alt = "Cart Icon"/>
			</a>
		</div>

		<!-- this is the second box container that holds categories of different medicine that can be searched for --> 
		<div class = "categoryPanel">
			<h1 class = "categoryTitle">Category</h1>
			<form style = "margin-left: 20px">
				<input type = "checkbox" name = "med1" value = "pf"/>
				<label class = "categoryText" for = "med1">Pain & Fever</label><br>
				<input type = "checkbox" name = "med2" value = "smoking"/>
				<label class = "categoryText" for = "med2">Smoking Aid</label><br>
				<input type = "checkbox" name = "med3" value = "ccf"/>
				<label class = "categoryText" for = "med3">Cough, Cold & Flue</label><br>
				<input type = "checkbox" name = "med4" value = "digestive"/>
				<label class = "categoryText" for = "med4">Digestive Health</label><br>
				<input class = "categorySubmit" type = "submit" value = "Submit"/>
			</form>
		</div>

		<div>
			<!-- CREATE TABLE HERE WITH PHP FUNCTIONALITIES --> 
		<div>
	</body>
</html>