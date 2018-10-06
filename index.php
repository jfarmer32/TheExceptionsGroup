<?php
	include('login.php');
	

?>


<!DOCTYPE html>
<html>
<head>
<title>VIMS</title>
<style>
button {
    background-color: #E6E6E6;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 5%;
	font-weight: bold;
	text-align: center;
}


input[type=text], input[type=password] {
	background-color: white;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.login{
    border: 3px solid;
	border-color: black;
	padding:10px;
	width: 350px;
	margin: auto;
}
</style>
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
