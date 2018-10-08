<?php
	include('login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>VIMS</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css">
<style>
body{
	background-color:  #d1d3d4;
}
input[type=text], input[type=password] {
	background-color: white;
    padding: 12px 20px;
    margin: 8px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type=submit]{
	margin: 0 23px;
}
.login{
    border: 3px solid;
	border-color: black;
	padding:10px;
	width: 400px;
	margin: auto;
	height: 300px;
	background-color:#FFFFFF;
	border-bottom-right-radius: 25px;
	border-bottom-left-radius: 25px;
	font-family: 'PT Sans Narrow', sans-serif;
}

.l{
	border: 3px solid;
	border-color: black;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	padding:10px;
	width: 400px;
	margin: auto;		
	background-color:  #c2011b;
	color: #FFFFFF;
}
.psw{
	margin: 0 23px;
}
h2{
	background-color:  #c2011b;
	padding-left: 30px;
	align: left;
	font-family: 'PT Sans Narrow', sans-serif;
}
label2{
	padding-left: 25px;
}
a{
	padding-left: 25px;
	text-decoration: none;
}
</style>
</head>
<body>

<br></br>
<br></br>
<h1><center>Valor Inventory Management System</center></h1>
<br></br>
<div class="l" align="center">
	<h2 style = "font-style: bold;" align="left">Login</h2>
</div>
<div class="login" align="left">
 <form action="" method="post">
	<br>
	<label2>Username:</label2><br>
    <input name="username" type="text" placeholder="Username" name="uname" id="username"> <br><br>
	<label2>Password:</label2><br>
    <input name="password" type="password" placeholder="Password" name="psw"><br>
	<br>
    <input name = "send" type = "submit" value = " Login ">
	
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label><br><br>
	
    <a href="ForgotPassword.html" >Forgot password?</a>
	<a href="adminLogin.php">Login as admin</a><br>
</form>
</div>
<h1><center> <?php echo $error; ?></center></h1>
</body>
</html>