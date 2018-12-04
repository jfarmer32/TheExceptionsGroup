<!-- add_gear_type.php

Adds gear of a given type to the system

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();
//include('session.php');
include('logout.php');
include('login.php');

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
  header("location: index.php");
}
?>

<html>
<head>

  <title>Add Gear Type</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- StyleSheet CSS -->

  <style>
  html,body { /* <---- HTML Body */
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }

  input[type = submit]{ /* <---- Submit Input */
    margin-right: 130px;
    background-color: #003C71;
  }
  a[type = pass]{ /* <---- pass 'a' */
  padding-left: 170px;
}
h2{ /* <---- Header 2 */
	background-color:  #003C71;
	padding-left: 30px;
	align: left;
	font-family: 'PT Sans Narrow', sans-serif;
}
</style>
</head>

<div class="bg"></div>
<br></br>
<br></br>

<h1><center></center></h1>

<br></br>

<!-- TopLogin code -->
<div class="topWorkBox" align="center">
  <h2 style = "font-style: bold;" align="left">Add New Gear Type</h2>
</div>

<!-- Login code -->
<div class="workBox" align="left">
  <form action="" method="post">
    <br><br>
    <div class="tooltip">

      <!-- Gearname input -->
      <input name="Gearname" type="text" placeholder="Gearname" id="Username">
      <span class="tooltiptext">Notice: No Spaces Must Use Underscores Example: Ruck_Sack</span>

    </div>
    <br>
    <!-- Allowed input -->
    <input name="Allowed" type="text" placeholder="Allowed"  id="Username" >

    <br>
    <!-- On_Hand input -->
    <input name="On_Hand" type="text" placeholder="On Hand"  id="Username" >

    <br>

    <!-- Submit Code -->
    <h3><input name = "submit" type = "submit" value = "Add Gear Type"></h3><br>
    <a href="AdminInventory.php"  type="pass">Return</a><br>
  </form>

  <?php
  $error = "";

  // When Submit is called
  if(isset($_POST['submit']))
  {

    $Gearname = $_POST['Gearname'];
    $On_Hand = $_POST['On_Hand'];
    $Allowed = $_POST['Allowed'];
    $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
    $Gearname = stripslashes($Gearname);
    $Gearname = mysql_real_escape_string($Gearname);
    $On_Hand = stripslashes($On_Hand);
    $On_Hand = mysql_real_escape_string($On_Hand);
    $Allowed = stripslashes($Allowed);
    $Allowed = mysql_real_escape_string($Allowed);
    $DB = mysql_select_db("team04", $ServerConnection);
    mysql_query("INSERT INTO Gear(Gearname, Allowed, On_Hand) VALUES ('$Gearname','$Allowed','$On_Hand')");
    mysql_query("ALTER TABLE Cadet_Gear ADD COLUMN $Gearname INT NOT NULL");
    $error = "Added Gear Type $Gearname";
    mysql_close($connection);
  }
  // Call Error
  echo "<h3><center> $error</center></h3>"
  ?>

</div>

</body>
</html>
