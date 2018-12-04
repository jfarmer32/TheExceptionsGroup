	<!-- adminLogin

     Allows an admin to login to the website

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->


<?php
	include('login.php'); // Login Page php
?>
<!DOCTYPE html>
<html>
<head>

<title>VIMS</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- styleSheet.css -->
<link rel="stylesheet" type="text/css" href="adminLogin.css"> <!-- adminLogin.css -->

<!-- Default CSS -->
<style>
html,body { /* <---- HTML and Body */
	background: linear-gradient( rgba(0, 0, 0, .6), rgba(0, 0, 0, .6) ), url(images/Muse.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-color: black;
	height: 100%;
	margin: 0;
}
input[type = submit]{ /* <---- Submit Input */
	margin-right: 165px;
}
</style>

</head>
<body>
<br></br>
<br></br>
<br></br>
<div class="topLogin" align="center">
	<h2 align="left">Admin Login</h2>
</div>
<div class="login" align="left">
 <form action="" method="post">
	<br>

    <!-- Assigned inputs for Username and Admin inputs -->
    <input name="UsernameAdmin" type="text" placeholder="Username" name="uname" id="username"> <br><br>
    <input name="PasswordAdmin" type="password" placeholder="Password" name="psw"><br>

	<br>

    <!-- Assigned input to submit -->
    <input name = "sendAdmin" type = "submit" value = " Login "><br><br><br><br>
	<a href="index.php" type="return">Return</a><br>

</form>
</div>
<h1 style = "color: white; "><center> <?php echo $error; ?></center></h1>
</body>
</html>
