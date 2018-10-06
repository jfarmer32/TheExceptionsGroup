<?php
	include('login.php');
	

?>


<!DOCTYPE html>
<html>
<head>
<title>VIMS</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<h1><center>Valor Inventory Management System</center></h1>


<div class="login" align="center">
 <form action="index.php" method="post">
    <input name="username" type="text" placeholder="Username" name="uname" id="username" > <br>
    <input name="password" type="password" placeholder="Password" name="psw" ><br>
	
    <input name = "send" type = "submit" value = " Login ">
	
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label><br>
	
    <span class="psw">Forgot <a href="#">password?</a></span>
	<span> <?php echo $error; ?></span>
</form>
</div>



</body>
</html>
