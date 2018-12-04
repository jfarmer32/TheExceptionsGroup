<!-- ForgotPassword

     Allows the user to reset their password

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
	include('ForgotPasswordAlert.php'); // Required PHP
?>
<!DOCTYPE html>
<html>
<head>

<!-- Title -->
<title>Forgot Password</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- StyleSheet.css -->
<link rel="stylesheet" type="text/css" href="forgotPassword.css"> <!-- forgotPassword.css -->

<!-- Default CSS -->
<style>
html,body { /* <---- HTML Body */
		background: linear-gradient( rgba(0, 0, 0, .6), rgba(0, 0, 0, .6) ), url(images/building_kyle-hall.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		background-color: black;
		height: 100%;
		margin: 0;

input[type = submit]{ /* <---- Submit Input */
	margin-right: 150px;
}
a{ /* <---- a */
	text-decoration: none;
	color: black;
}
</style>
</head>

<body>
<br><br><br><br><br><br>
<br></br>

<!-- topLogin Code -->
<div class="topLogin" align="center">
	<h2 align="Center">Forgot Password</h2>
</div>

<!-- topLogin Code -->
<div class="login" align="left">
<form action="" method="post">
	<br><br>
	<div class="tooltip">
    <input name="user" type="text" placeholder="Username"> <br>
	<span class="tooltiptext">Notice: Please Enter RU Username</span><br>
	</div>
    <input name = "password_reset" type = "submit" value = "Confirm"><br><br><br><br><br>
	<a href="index.php">Return</a>
	<br>
	<h3> <?php echo $error; ?></h3>
	<br><br>
</form>
</div>
</body>
</html>
