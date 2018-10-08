<?php
	session_start();
	include('session.php');
	include('logout.php');
	include('login.php');
	
	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
	{
    header("location: index.php");
	}
   
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact CO - VIMS</title>
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
  <li><a href="UserInventory.php" >Inventory</a></li>
  <li><a href="UserNotification.php" >Notifications</a></li>
  <li><a href="UserAccount.php" >Account</a></li>
  <li><a class="active" href="UserContact.php" >Contact CO</a></li>
   <li><input name = "logout" type = "submit" value = " Logout "></li>
</ul>

<div class="content">
  <h1>Valor Inventory Management System</h1><br>
  <h2>Contact</h2>
  <h2>fname lname</h2>
 
  
</div>
</form>

</body>
</html>
