<!-- Index

The page to start the website

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
Header("Cache-Control: max-age=3000, must-revalidate");
include('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIMS</title>
	<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- StyleSheet.css -->
	<link rel="stylesheet" type="text/css" href="login.css"> <!-- login.css -->
	<style>
	html,body { /* <---- HTML Body */
		background: linear-gradient( rgba(0, 0, 0, .6), rgba(0, 0, 0, .6) ), url(images/building_kyle-hall.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		background-color: black;
		height: 100%;
		margin: 0;
	}
	input[type = submit]{ /* <---- Input Submit */
		margin-right: 165px;
	}

</style>
</head>
<body>

	<!-- bg Class -->
	<div class="bg"></div>
	<br></br>
	<br></br>
	<h1><center></center></h1>
	<br></br>

	<!-- topLogin Class -->
	<div class="topLogin" align="center">
		<h2 style = "font-style: bold;" align="left">VIMS Login</h2>
	</div>

	<!-- login Class -->
	<div class="login" align="left">
		<form action="" method="post">
			<br><br>

			<!-- tooltip Class -->
			<div class="tooltip">

				<!-- Username Input -->
				<input name="Username" type="text" placeholder="Username">
				<span class="tooltiptext">Notice: This is Vims login not RU login</span>

				<br>
				<!-- Password Input -->
				<input name="Password" type="Password" placeholder="Password"><br>

				<br>
			</div>

			<!-- Send Input -->
			<input name = "send" type = "submit" value = "Login"><br><br><br>

			<!-- ForgotPassword Class -->
			<br><a href="ForgotPassword.php"  type="pass">Forgot Password?</a>
			<br><br>
			<!-- adminLogin Class -->
			<a href="adminLogin.php"  type="pass">  Login as admin</a><br>


		</form>
	</div>
	<h1><center style = "color: white" > <?php echo $error; ?></center></h1>
</body>
</html>
