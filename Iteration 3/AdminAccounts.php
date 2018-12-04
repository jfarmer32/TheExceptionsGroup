<!-- AdminAccounts
   
     Used to login as an Admin.

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
    session_start();
	//include('session.php');
	include('logout.php');
	include('login.php');
	
	// Sends admin back to index.php
  if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true || $_SESSION['login_user'] !== "Admin")
	{
    header("location: index.php");
	}
?>

<!-- HTML code -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- Call CSS -->

<!-- CSS Default -->
<style>
a[type = topLink]{ /* <---- a of type TopLink */
	color: White;
  text-decoration: none;
  margin-left: 30px;
  font-size: 14px;
}
a[type = topLink2]{ /* <---- a of type TopLink2 */
  color: White;
  text-decoration: none;
  margin-left: 550px;
  font-size: 14px;
}
a:hover[type = topLink],a:hover[type = topLink2]{ /* <---- a of type TopLink1 and TopLink2 */
  color: gold;
}
input[type = submit]{ /* <---- Submit Input */
  margin-right: 25px;
}
label[id = txt]{ /* <---- Text Label */
  margin-left: 5px;
  font-size: 18px;
}
label{ /* <---- Label */
  margin-left: 120px;
  font-size: 18px;
}
</style>
</head>

<body onload="startTime()">
<script src="timeJavaScript.js"></script>

<!-- Topbar code -->
<ul class="topbar">
	<img src = "https://i.imgur.com/wlzBiEp.png" width="90" height="90" style="float:left;padding-left: 100px;padding-top: 5px;">
	<h1 class = "help" style = "padding-right: 140px" >Valor Inventory Management System</h1>
</ul>

<!-- BufferBar code -->
<ul class="BufferBar">
  <h3><?php echo $_SESSION['last_name'] ?>, <?php echo $_SESSION['first_name'] ?>
    <label>Current Time: </label>
    <label id="txt"></label>
    <a href="https://www.goarmyed.com/cadet/" type="topLink2">Go Army ED</a>
    <a href="https://www.radford.edu/content/radfordcore/home.html" type="topLink" >Radford Homepage</a>
    <input name = "logout" type = "submit" value = " Logout "></h3>
</ul>

<!-- Sidenav code -->
<form action="" method="post">	
<ul class="sidenav">
  <li><a href="AdminHomepage.php" >Home</a></li>
  <li><a href="AdminCadetList.php" >Cadet List</a></li>
  <li><a href="AdminInventory.php" >Inventory</a></li>
  <li><a href="AdminNotification.php" >Notifications</a></li>
  <li><a class="active" href="AdminAccounts.php" >Accounts</a></li>
  <li><a href="AdminContact.php" >Contact Cadets</a></li><br><br>
</ul>

<!-- Class Content code -->
<div class="content">
  <h1>Valor Inventory Management System</h1><br>
  <h2>Cadet Accounts</h2>
</div>
</form>
</body>
</html>
