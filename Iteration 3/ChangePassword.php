<!-- ChangePassword
	 
     Used to change the password of a cadet or admin user

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<!DOCTYPE html>
<html>
<head>
<title>VIMS</title>S
<link rel="stylesheet" type="text/css" href="changePassword.css"> <!-- changePassword.css -->
</head>
<body>
<br></br><br></br><br></br>

<!-- Title -->
<div class="topLogin" align="center">
	<h2 align="Center">Change Password</h2>
</div>

<!-- Class Login -->
<div class="login" align="left">
 <form action="PasswordConfirmation.php" method="post">
	<br></br>
    
    <!-- required inputs -->
    <input name="password" type="password" placeholder="Enter New Password" name="psw" id="password1"> <br>
    <input name="password" type="password" placeholder="Confirm New Password" name="psw" id="password2"> <br>
	
	</br>
	
	<!-- send input -->
	<input name = "send" type = "submit" href = "PasswordConfirmation.php" value = " Enter ">
	
</form>
</div>
</body>
</html>