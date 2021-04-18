<?php
//includes db connection
require_once 'databaseConnection.php';

//includes session info
session_start();

//informs the user they have newly logged in
if (isset($_SESSION['new_log']) && $_SESSION['new_log'] == true) {
		$notice = "<p class='text-success'>You are now logged in!</p>";

		unset($_SESSION['new_log']);
} 

//general search statement for if no search was performed
$stmt = 'select name, description, price, image from products';

//checks if input was sent through search bar; searches by term if so
if (!empty($_POST['searchbar'])) {
	$term = trim($_POST['searchbar']);
	$stmt = $stmt.' where name like :term';
}

//checks if input was sent through category selection; searches by category if so
if (!empty($_POST['sleep']) || !empty($_POST['pain']) || !empty($_POST['antacid']) || !empty($_POST['allergy'])) {
	$stmt = $stmt.' where';

	//adds sleep aid category if selected
	if (!empty($_POST['sleep'])) {
		$sleep = trim($_POST['sleep']);
		$stmt = $stmt.' category = :sleep';

		//checks if other categories were selected
		if (!empty($_POST['pain']) || !empty($_POST['antacid']) || !empty($_POST['allergy']))
			$stmt = $stmt.' or';
	}

	//adds pain relief category if selected
	if (!empty($_POST['pain'])) {
		$pain = $_POST['pain'];
		$stmt = $stmt.' category = :pain';

		//checks if other categories were selected
		if (!empty($_POST['antacid']) || !empty($_POST['allergy']))
			$stmt = $stmt.' or';
	}

	//adds antacid category if selected
	if (!empty($_POST['antacid'])) {
		$antacid = $_POST['antacid'];
		$stmt = $stmt.' category = :antacid';

		//checks if other categories were selected
		if (!empty($_POST['allergy']))
			$stmt = $stmt.' or';
	}

	//adds allergy category if selected
	if (!empty($_POST['allergy'])) {
		$allergy = $_POST['allergy'];
		$stmt = $stmt.' category = :allergy';
	}
}

//preparese db query
$query = $db->prepare($stmt);

//binds term parameter if not empty
if (!empty($term)) {
	$term = '%'.$term.'%';
	$query->bindParam(':term', $term);
}

//binds sleep parameter if not empty
if (!empty($sleep))
	$query->bindParam(':sleep', $sleep);

//binds pain parameter if not empty
if (!empty($pain))
	$query->bindParam(':pain', $pain);

//binds antacid parameter if not empty
if (!empty($antacid))
	$query->bindParam(':antacid', $antacid);

//binds allergy parameter if not empty
if (!empty($allergy))
	$query->bindParam(':allergy', $allergy);

//runs query and gets results
$query->execute();
$results = $query->fetchAll();

?>
<!DOCTYPE html>

<html>
	<head>
		<title>Swift Care - Home Page</title>
		<meta charset = "utf-8"/>
		<meta name = "author" content = "SE2 - Group 2"/>
		<meta name = "description" content = "Main store page of Swift Care"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- First link refers to the main.css file and second link is used for website icon -->
		<link rel = "stylesheet" href = "blue_page.css" type = "text/css">
		<link rel = "stylesheet" href = "main.css" type = "text/css"/>
		<link rel = "icon" href = "images/sc_logo_CY8_icon.ico"/>
	</head>
	<body>
		<!--outputs notice for user-->
		<?php echo $notice; ?>
		<!-- This holds the top portion of the website with a box container that holds the logo, title, search bar, search button, user icon, and cart icon -->
		<div class = "BoxPanel" id = "HeaderPanel">
			<img class = "ScLogoLarge" id = "ScLogoTitle" src = "images/sc_logo.png" alt = "Swift Care logo"/>
			<h1 class = "OrbitronTitle" id = "ScTitle">Swift Care</h1>
			<form style = "width: 70%" action="">
				<button type = "submit" class = "searchButton">
					<img style = "width: 25px" src = "images/sc_search.png"/>
				</button>
				<input class = "InputField" id = "SearchField" type = "text" id = "search" name = "searchbar" placeholder = "Search..."/>
			</form>
			<a href = "sc_userlogin.html">
				<img class = "Icon" id = "UserIcon" src = "images/sc_user.png" alt = "User Icon"/>
			</a>
			<a href = "">
				<img class = "Icon" id = "ViewCartIcon" src = "images/sc_cart.png" alt = "Cart Icon"/>
			</a>
		</div>

		<!-- This is the second box container that holds categories of different medicine that can be searched for -->
		<!-- Names of categories changed to match categories of items in db; names and values of checkbox items changed for easier PHP handling -->
		<div class = "BoxPanel" id = "CategoryPanel">
			<h1 class = "SignikaTitle" id = "CategoryTitle">Category</h1>
			<form style = "margin-left: 20px" action = "index.php" method = "post">
				<input type = "checkbox" name = "sleep" value = "Sleep Aid"/>
				<label class = "SignikaLabel" for = "sleep">Sleep Aid</label><br>
				<input type = "checkbox" name = "pain" value = "Pain Relief"/>
				<label class = "SignikaLabel" for = "pain">Pain Relief</label><br>
				<input type = "checkbox" name = "antacid" value = "Antacid"/>
				<label class = "SignikaLabel" for = "antacid">Antacid</label><br>
				<input type = "checkbox" name = "allergy" value = "Allergy Relief"/>
				<label class = "SignikaLabel" for = "allergy">Allergy Relief</label><br>
				<input class = "SubmitButton" type = "submit" value = "Submit"/>
			</form>
		</div>

		<!-- all/searched products output -->
		<div>
			<?php
				if ($results) {
					$numCol = 0;
					//table is created
					echo '<table style="border: 1px solid black; border-collapse: collapse;"><tr>';

					foreach ($results as $row) {
						//starts a new row once 3 items have been output
						if ($numCol == 3) {
							$numCol = 0;

							echo '</tr><tr>';
						}

						//each item is output in a table cell
						echo '<td style="border: 1px solid black;">
							<img src="'.$row['image'].'" alt="product image">
							<br>
							<p>'.$row['name'].'</p>
							<br>
							<p>'.$row['description'].'</p>
							<br>
							<p>$'.$row['price'].'</p>
							</td>';

						$numCol++;
					}

					echo '</tr></table>';
				}
			?>
		</div>

		<!-- Footer portion is used to showcase group number, college, and course. -->
		<footer style = "text-align: center">
				<p class = "SignikaText" id = "footerText">
					&copy; 2021 - 2021 Group 2.<br/>
					Montclair State University - Computer Science and Technology.<br/>
					CSIT415 - Software Engineering II.
				</p>
		</footer>
	</body>
</html>
