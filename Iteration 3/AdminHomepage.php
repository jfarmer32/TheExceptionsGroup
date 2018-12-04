<!-- AdminHomepage

Used to get to the Admin Homepage.

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();

// All required PHP classes
include('logout.php');
include('login.php');
include('update_daily.php');
include('update_weekly.php');
include('update_monthly.php');
include('update_w_image.php');
include('update_m_image.php');
include('change_admin_password.php');

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true || $_SESSION['login_user'] !== "Admin")
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
    <a class="active" href="AdminHomepage.php" >Home</a>
    <a href="AdminCadetList.php" >Cadet List</a>
    <a href="AdminInventory.php" >Inventory</a>
    <a href="AdminNotification.php" >Notifications</a>
    <a href="AdminContact.php" >Contacts</a>
  <input name = "logout" type = "submit" value = " Logout ">


  </div>
      <!-- Display Homepage Message -->
      <div class="contents">

      <div class="welcome" >
        <h1>Welcome to VIMS <?php echo $_SESSION['last_name'] ?> <?php echo $_SESSION['first_name'] ?></h1>
        <h2>From here you may change what all Cadets will see on their homepage.</h2>
      </div>

      <!-- Display all Messages -->

      <div class ="welcome">
        <h2>Modify daily announcement:</h2>
        <div>
          <textarea name = "daily_message" maxlength = "255" rows = "6" cols = "100" > Enter Daily Message Here </textarea>
          <input name = "update_daily" type = "submit" value = " Update Message ">
        </div>
      </div>

      <!-- Give ability to edit announcements (weekly) -->
      <div class="welcome" >
        <h2>Modify weekly announcement:</h2>
        <div>
          <div class ="admin_hp">
            <textarea style ="margin-bottom: 15px" name = "weekly_message" maxlength = "255" rows = "6" cols = "100" > Enter Weekly Message Here </textarea>
            <input name = "update_weekly" type = "submit" value = " Update Message ">
          </div>

          <!-- Make needed changes -->
          <?php
          $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");
          $sql = "SELECT Content FROM Homepage WHERE Homepage_Id = 3";
          $query = mysqli_query($ServerConnection, $sql);
          $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
          $image = $array['Content'];
          ?>

          <div class="hp_image">
            <img class = hp src="uploads/weekly_image.jpg" >
          </div>
        </div>
      </div>

      <!-- Give ability to edit announcements (monthly) -->
      <div class="welcome" >
        <h2>Modify monthly announcement:</h2>
        <div>
          <div class ="admin_hp" >
            <textarea style ="margin-bottom: 15px" name = "monthly_message" maxlength = "255" rows = "6" cols = "100" > Enter Monthly Message Here </textarea>
            <input name = "update_monthly" type = "submit" value = " Update Message ">
          </div>

          <!-- Make needed changes -->
          <?php
          $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");
          $sql = "SELECT Content FROM Homepage WHERE Homepage_Id = 5";
          $query = mysqli_query($ServerConnection, $sql);
          $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
          $image = $array['Content'];
          ?>


          <div class ="hp_image" >
            <img class = hp src="uploads/monthly_image.jpg" >
          </div>
        </div>
      </div>
    </form>
    <div class="welcome" >
      <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <h2 align = "center">Image upload station:</h2><br>
        <div class ="admin_hp">
          <input align="left" type="file" name="image_to_upload2" id="image_to_upload2"/>
          <input align="right" type="submit" name="update_w_image" value =" Update Weekly "/>
        </div>
      </form>

      <form action="" method="POST" enctype="multipart/form-data">
        <br><br><br>
        <div>
          <input align="left" type="file" name="image_to_upload" id="image_to_upload"/>
          <input align="right" type="submit" name="update_m_image" value ="Update Monthly"/><br>
        </div>
      </form>
    </div>

    <form action="" method="POST" >
    <div class="welcome">
      <h2>Account</h2>
      <h4>Change Password</h4>
       <input name="New_Password" type="text" placeholder="New Password" name="uname" id="Username" ><br>
       <input name="Confirm_Password" type="text" placeholder="Confirm Password" name="uname" id="Username" ><br><br><br>
       <input name = "Change_Admin_Password" type = "submit" value = " Change Password "><br><br><br>
    </div>
  </div>
  </form>
  </body>
  </html>
