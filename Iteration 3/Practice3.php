<?php
session_start();

// Include the Login and Logout php
include('logout.php');
include('login.php');

// Change header to index.php
if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<header>
<h1 class="logo"><?php echo $_SESSION['last_name'] ?>, <?php echo $_SESSION['first_name'] ?></h1>

<nav>
<form action="" method="post">
<ul>
  <li><a id="txt"></a></li>
  <a id="link" href="https://www.goarmyed.com/cadet/" type="topLink2">Go Army ED</a>
  <a id="link" href="https://www.radford.edu/content/radfordcore/home.html" type="topLink" >Radford Homepage</a>
</ul>
</nav>
</label>
<link rel="stylesheet" type="text/css" .css = "text/css" href="webpage.css">
</header>
<body onload="startTime()">
<script src="timeJavaScript.js"></script>

<div class="title">
  <label>Valor Inventory Management System</label>

</div>

  <div class="sidenav">
    <a class="active" href="UserHomepage.php">Home</a>
    <a href="UserInventory.php">Inventory</a>
    <a href="UserNotification.php">Notifications</a>
    <a href="UserAccount.php">Account</a>
    <input name = "logout" type = "submit" value = " Logout ">


  </div>
  <div class="contents">
    <div class="welcome" >
      <h1>Account Information</h1>
    	<h2 style="text-align: left;">User: <?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['last_name'] ?> </h2>
    	<h2 style="text-align: left;">Username: <?php echo $_SESSION['login_user'] ?></h2>
    	<h2 style="text-align: left;">User Status: Cadet User</h2>
      <h2>Change Password</h2>
       <input name="New_Password" type="text" placeholder="New Password" name="uname" id="Username" ><br>
       <input name="Confirm_Password" type="text" placeholder="Confirm Password" name="uname" id="Username" ><br><br><br>
       <input name = "Change_Password" type = "submit" value = " Change Password "><br><br><br>
       <h1><center> <?php echo $error; ?></center></h1>
    </div>
  </div>
</form>
</body>
</html>
