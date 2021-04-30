<!DOCTYPE html>
<html>
	<head>
		<title>Swift Care - User Cart</title> 
		<meta charset = "utf-8"/>
		<meta name = "author" content = "SE2 - Group 2"/>
		<meta name = "description" content = "Main store page of Swift Care"/>
		<meta name = "viewport" content = "width=device-width, initial-scale=1"/>
		<!-- First link refers to the main.css file and second link is used for website icon -->
		<link rel = "stylesheet" href = "css/blue_page.css" type = "text/css">
		<link rel = "stylesheet" href = "css/main.css" type = "text/css"/>
		<link rel = "icon" href = "images/sc_logo_CY8_icon.ico"/>

		<style>

			table.TotalTable {
				width: 50%; 
				border-top: 4px solid #283a89; 
				margin-top: 10px; 
				margin-bottom: 60px; 
				margin-left: auto;
			}

			th.TableHeader {
				font-family: 'Signika', sans-serif;
				color: #cbcbcb;
				font-weight: normal;
				padding: 5px;
			}

			#TotalText {
				color: black;
				text-align: left;
				padding: 5px;
			}

			#TotalQuantityText {
				color: black;
				text-align: right;
				padding: 5px;
				font-family: 'Signika', sans-serif;
				font-weight: normal;
			}

			img.CartIcon {
				display: inline; 
				float: left; 
				margin-left: 10px; 
				margin-top: 10px; 
				margin-bottom: 10px; 
				border: 2px solid black; 
				width: 80px; 
				height: 80px;
			}

			option {
				font-family: 'Signika', sans-serif;
				color: black;
				font-weight: normal;
			}
			select {
				font-family: 'Signika', sans-serif;
				color: black;
				font-weight: normal;
				border-radius: 5px;
				width: 60px;
				font-size: 12pt;
			}

			input.OptionSubmit {
				font-family: 'Signika', sans-serif;
				background-color: #283a89;
				border-radius: 10px;
				border: 0;
				cursor: pointer;
				color: white;
				padding: 5px;
				width: 60px;
				display: block;
				margin-right: auto; 
				margin-left: auto; 
				margin-top: 5px;
			}

			#CartProductText {
				margin-bottom: 0; 
				color: black; 
				text-align: left; 
				position: relative; 
				left: 10px; 
				font-size: 16pt;
			}

			#CartPriceText {
				margin-top: 2px; 
				margin-bottom: 0; 
				color: black; 
				text-align: left; 
				position: relative; 
				left: 10px;
			}

			a.RemoveItem {
				font-family: 'Signika', sans-serif;
				color: #cbcbcb;
				color: #283a89; 
				float: left; 
				position: relative; 
				left: 10px; 
				margin-top: 2px;
			}

			#SubtotalText {
				color: black; 
				text-align: right; 
				position: relative; 
				right: 10px; 
				font-size: 14pt;
			}

		</style>

	</head>
	<body>
		<!-- Create a form that takes a username and password. If the requirements are met through the database, then the user will successfully log in. -->
		<div class = "BoxPanel" id = "LoginPanel" style = "width: 600px;">
			<div id = "imageTextCenter">
				<img class = "LogoSmall" id = "LogoForm" src = "images/sc_logo.png" alt = "Swift Care logo"/>
				<h1 class = "OrbitronTitle" id = "TitleForm">Swift Care - User Cart</h1>
			</div>
			<div class = "marginContentSpace">
				<table style = "width: 100%; border-spacing: 0">
					<tr>
						<th class = "TableHeader" style = "background-color: #283a89; text-align: left;">Product</th>
						<th class = "TableHeader" style = "background-color: #283a89;">Quantity</th>
						<th class = "TableHeader" style = "background-color: #283a89; text-align: right;">Subtotal</th>
					</tr>
					<tr>
						<td>
							<img class = "CartIcon" src="product_pics/advil.jfif" alt="product image"> 
							<p class = "SignikaText" id = "CartProductText">Advil</p> 
							<p class = "SignikaText" id = "CartPriceText">Price: $6.00</p>
							<a href = "" class = "RemoveItem">Remove</a>
						</td>
						<td style = "padding: 0; margin: 0">
							<form>
								<select name = "quantity">
									<option value = "one">1</option>
									<option value = "two">2</option>
									<option value = "three">3</option>
									<option value = "four">4</option>
									<option value = "five">5</option>
									<input class = "OptionSubmit" type = "submit">
								</select>
							</form>
						</td>
						<td>
							<p class = "SignikaText" id = "SubtotalText">$6.00</p> 
						</td>
					</tr>
				</table>
				<table class = "TotalTable">
					<tr>
						<th class = "TableHeader" id = "TotalText">Total:</th>
						<td id = "TotalQuantityText">$6.00</td>
					</tr>
				</table>

				<form>
					<input class = "SubmitButton" type = "submit" value = "Place Order">
				</form>
			</div>
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
