<?php
	session_start();
	include('session.php');
	include('logout.php');
	include('login.php');
	include('AddAThing.php');
	
	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
	{
    header("location: index.php");
	}
    
?>
<!DOCTYPE html>
<html>
<head>
<title>Inventory - VIMS</title>
<style>
body{
	background-color:  #d1d3d4;
}
input[type=text], input[type=password], input[type=number] {
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
.add{
    border: 3px solid;
	border-color: black;
	padding:10px;
	width: 400px;
	margin: auto;
	height: 450px;
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>
<body>
<form action="" method="post">
<ul class="topbar">
	<img src = "https://i.imgur.com/wlzBiEp.png" width="90" height="90" style="float:left;padding-left: 50px;padding-top: 5px;">
	<h1 class = "help" style = "padding-right: 140px" >Valor Inventory Management System</h1>
</ul>

<ul class="sidenav">
  <li><a href="UserHomepage.php" >Home</a></li>
  <li><a class="active" href="UserInventory.php" >Inventory</a></li>
  <li><a href="UserNotification.php" >Notifications</a></li>
  <li><a href="UserAccount.php">Account</a></li>
  <li><a href="UserContact.php" >Contact CO</a></li>
  <li><input  name = "logout" type = "submit" value = " Logout "></li>
</ul>

<div class="content">
  <h1>Valor Inventory Management System</h1><br>
  <h2>Inventory</h2>
  <h2>fname lname</h2>
  <div class="add" align="left">
    <form action="" method="post">
	<br></br>
    <h3 align="Center">Add Gear</h3>
	<label2>Gearname:</label2><br>
    <input name="gn" type="text" placeholder="Gearname" name="gname" id="gearname"> <br><br>
	<label2>Number allowed:</label2><br>
    <input name="a" type="text" placeholder="Allowed" name="allowed" id="allowed"><br>
    <label2>Number issued:</label2><br>
    <input name="i" type="text" placeholder="Issued" name="issued" id="issued"><br>
    <label2>Number on hand:</label2><br>
    <input name="o" type="text" placeholder="On hand" name="onhand" id="onhand"><br>
	<br>
    <input name = "add" type = "submit" value = " ADD ">
	<h1><center> <?php echo $error; ?></center></h1>
</form>
</div>
</form>
</body>
</html>
