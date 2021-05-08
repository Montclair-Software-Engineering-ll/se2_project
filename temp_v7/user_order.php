<!DOCTYPE html>
<html>
  <head>
    <title>Swift Care - Place Order</title>
    <meta charset="utf-8" />
    <meta name="author" content="SE2 - Group 2" />
    <meta name="description" content="Main store page of Swift Care" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- First link refers to the main.css file and second link is used for website icon -->
    <link rel="stylesheet" href="css/blue_page.css" type="text/css" />
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="icon" href="images/sc_logo_CY8_icon.ico" />
  </head>
  <body>
    <div class="BoxPanel" id="LoginPanel" style=" width: 900px; height: 800px">
    	<div id="imageTextCenter">
        	<img class="LogoSmall" id="LogoForm" src="images/sc_logo.png" alt="Swift Care logo"/>
      		<h1 class="OrbitronTitle" id="TitleForm">Swift Care - Place Order</h1>
      	</div>
      	<form action="#" method="post" autocomplete="off">
      		<div style = "display: inline-block; width: 40%">
      		
      		<h3 id="orderTitle"> Shipping Address</h3>
        	<div class="marginContentSpace">
        		<label class="SignikaLabel" id="LabelForm">Full name</label>
        		<input class="InputField" id="LoginSignupField" name="fullname" type="name" id="username_sec" required/>
        	</div>

        	<div class="marginContentSpace">
       			<label class="SignikaLabel" id="LabelForm">Street address</label>
            	<input class="InputField" id="LoginSignupField" name="streetAddress" type="name" required/>
        	</div>

        	<div class="marginContentSpace">
        		<label class="SignikaLabel" id="LabelForm">City</label>
            	<input class="InputField" id="LoginSignupField" name="city" type="name" required/>
        	</div>

			<div class="marginContentSpace">
                <label class="SignikaLabel" id="LabelForm">State</label>
                <select name="state" id="state">
                	<option value="" selected="selected">Select a State</option>
                  	<option value="AL">Alabama</option>
                  	<option value="AK">Alaska</option>
                  	<option value="AZ">Arizona</option>
                  	<option value="AR">Arkansas</option>
                  	<option value="CA">California</option>
                  	<option value="CO">Colorado</option>
                  	<option value="CT">Connecticut</option>
                  	<option value="DE">Delaware</option>
                  	<option value="DC">District Of Columbia</option>
                  	<option value="FL">Florida</option>
                  	<option value="GA">Georgia</option>
                  	<option value="HI">Hawaii</option>
                  	<option value="ID">Idaho</option>
                  	<option value="IL">Illinois</option>
                  	<option value="IN">Indiana</option>
                  	<option value="IA">Iowa</option>
                  	<option value="KS">Kansas</option>
                  	<option value="KY">Kentucky</option>
                  	<option value="LA">Louisiana</option>
                  	<option value="ME">Maine</option>
                  	<option value="MD">Maryland</option>
                  	<option value="MA">Massachusetts</option>
                  	<option value="MI">Michigan</option>
                  	<option value="MN">Minnesota</option>
                  	<option value="MS">Mississippi</option>
                  	<option value="MO">Missouri</option>
                  	<option value="MT">Montana</option>
                  	<option value="NE">Nebraska</option>
                  	<option value="NV">Nevada</option>
                  	<option value="NH">New Hampshire</option>
                  	<option value="NJ">New Jersey</option>
                  	<option value="NM">New Mexico</option>
                  	<option value="NY">New York</option>
                  	<option value="NC">North Carolina</option>
                  	<option value="ND">North Dakota</option>
                  	<option value="OH">Ohio</option>
                  	<option value="OK">Oklahoma</option>
                  	<option value="OR">Oregon</option>
                  	<option value="PA">Pennsylvania</option>
                  	<option value="RI">Rhode Island</option>
                  	<option value="SC">South Carolina</option>
                  	<option value="SD">South Dakota</option>
                  	<option value="TN">Tennessee</option>
                  	<option value="TX">Texas</option>
	                <option value="UT">Utah</option>
	                <option value="VT">Vermont</option>
	                <option value="VA">Virginia</option>
	                <option value="WA">Washington</option>
	                <option value="WV">West Virginia</option>
	                <option value="WI">Wisconsin</option>
	                <option value="WY">Wyoming</option>
                </select>
            </div>

            <div class="marginContentSpace">
            	<label class="SignikaLabel" id="LabelForm">ZIP Code</label>
                <input class="InputField" id="LoginSignupField" name="zipcode" type="text" maxlength="5" required/>
            </div>
              
            <div class="marginContentSpace">
                <label class="SignikaLabel" id="LabelForm">Email</label>
                <input class="InputField" id="LoginSignupField" name="streetAddress" type="email" required/>
            </div>
        	</div>
        	<div style = "display: inline-block; width: 40%; vertical-align: top">
      		<h3 id="orderTitle">Payment Method</h3>

        	<div class="marginContentSpace">
          		<label class="SignikaLabel" id="LabelForm">Card number</label>
          		<input class="InputField" id="LoginSignupField" name="cardnumber" type="name" placeholder="Credit/Debit Number" maxlength="19" required/>
        	</div>

          	<div class="marginContentSpace">
            	<label class="SignikaLabel" id="LabelForm" for="username_sec">Expiration Date</label>
            	<input class="InputField" id="LoginSignupField" name="cardexpiration" type="month" required/>
          	</div>
              
            <div class="marginContentSpace">
                <label class="SignikaLabel" id="LabelForm">Security</label>
                <input class="InputField" id="LoginSignupField" name="security" type="email" placeholder="CVV" maxlength="3" required/>
            </div>
            <div class="marginContentSpace">
              <label class="SignikaLabel" id="LabelForm" style = "position: relative; bottom: 12px">Accepted Cards</label>
              <img src = "images/credit_cards.png" style = "width: 180px"alt = "Accepted Cards"/>
            </div>
        	</div>
            <input class="SubmitButton" type="submit" value="Place Order"/>   
      </form>
      <a href = "https://www.paypal.com/us/signin">
        <img src = "images/paypal_logo.png" class = "PaypalLogo" alt = "Paypal Logo"/>
      </a>
      <a href = "cart.php">
      	<img class = "Icon" id = "UserIcon" style = "position: absolute; left: 20px; bottom: 25px;" src = "images/back_arrow.png" alt = "Back Arrow"/>
	  </a>
  </div> 
  <!-- Footer portion is used to showcase group number, college, and course. -->
  <footer style="text-align: center;">
    <p class="SignikaText" id="footerText">
      &copy; 2021 - 2021 Group 2.<br />
      Montclair State University - Computer Science and Technology.<br />
      CSIT415 - Software Engineering II.
    </p>
  </footer>
</html>
