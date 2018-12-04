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

    <div class="welcome">
    <h1>Welcome to VIMS</h1><br>
    <h2>Hooah <?php echo $_SESSION['last_name'] ?>!</h2>
    <h4><?php
    $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");
    $sql = "SELECT * FROM Homepage WHERE Homepage_Id = 1";
    $query = mysqli_query($ServerConnection, $sql);
    $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
    printf ("%s \n",$array["Content"]);
    ?>
    </h4>
    </div>
    <div class="weekly">
    <h2>Weekly Announcements</h2><br>
    <h4>
      <?php
      $sql = "SELECT * FROM Homepage WHERE Homepage_Id = 2";
      $query = mysqli_query($ServerConnection, $sql);
      $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
      printf ("%s \n",$array["Content"]);
      ?>
    </h4>
    <?php
    $w_image = "SELECT * FROM Homepage WHERE Homepage_Id = 3";
    $query = mysqli_query($ServerConnection, $w_image);
    $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $display = $array['Content'];
    ?>
    <div class="hp_image">
      <h4>Weekly PT Schedule:</h4><br>
      <img class = hp src="uploads/weekly_image.jpg" >
    </div>
    </div>
    <div class="monthly">
    <h2>Monthly Announcements</h2><br>
    <h4>
      <?php
      $sql = "SELECT * FROM Homepage WHERE Homepage_Id = 4";
      $query = mysqli_query($ServerConnection, $sql);
      $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
      printf ("%s \n",$array["Content"]);
      ?>
    </h4>
    <?php
    $m_image = "SELECT * FROM Homepage WHERE Homepage_Id = 5";
    $query = mysqli_query($ServerConnection, $m_image);
    $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $display = $array['Content'];
    ?>
    <div class="hp_image">
      <img class = hp src="uploads/monthly_image.jpg" >
    </div>
    </div>
  </div>
</form>
</body>
</html>
