<!-- edit_cadet.php

     Used to edit information of a cadet user

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();
//include('session.php');
include('logout.php');
include('login.php');   // PHP Code needed

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
  header("location: index.php");
}
?>

<html>
<head>
  <title>Edit Cadet Gear</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- styleSheet.css -->

<!-- Default CSS -->
  <style>
html,body { /* <---- HTML and Body */
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }
input[type = submit]{ /* <---- Submit Input */
    margin-right: 130px;
    background-color: #003C71;
}
a[type = pass]{ /* <---- Type Pass */
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

<!-- TopLogin Code -->
<div class="topWorkBox" align="center">
  <h2 style = "font-style: bold;" align="left">Edit Individual Cadet Inventory</h2>
</div>

<!-- login Code -->
<div class="workBox" align="left" >
  <form action="" method="post">
    <br><br>

    <!-- Edit Username -->
    <select name="username" align = "left">
      <?php
      $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
      mysql_select_db("team04", $ServerConnection);
      $query = mysql_query("SELECT Username FROM Cadet", $ServerConnection);

      while($array = mysql_fetch_array($query)){
        $usernameunder = $array['Username'];
		$fname = mysql_query("select Fname from Cadet where Username='$usernameunder'", $ServerConnection);
		$fnameresult = mysql_fetch_array($fname);
		$lname = mysql_query("select Lname from Cadet where Username='$usernameunder'", $ServerConnection);
		$lnameresult = mysql_fetch_array($lname);
		$first_name = $fnameresult[0];
		$last_name =$lnameresult[0];
		$name = $last_name . ", " . $first_name;
        //$usernameread = preg_replace("/_/"," ", $usernameunder);
        echo "<option value = '$usernameunder'>$name</option>";
      }
      ?>
    </select>

    <!-- Edit Gear -->
    <select name="gearname" align = "center">
      <?php
      $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
      mysql_select_db("team04", $ServerConnection);
      $query = mysql_query("SELECT Gearname FROM Gear", $ServerConnection);

      while($array = mysql_fetch_array($query)){
        $gearnameunder = $array['Gearname'];
        $gearnameread = preg_replace("/_/"," ", $gearnameunder);
        echo "<option value = '$gearnameunder'>$gearnameread</option>";
      }
      ?>
    </select>

    <select name="numIssued" align = "right">
      <?php
      $i = 0;
      while($i<10){
        echo "<option value = $i>$i</option>";
        $i++;
      }
      ?>
    </select>

    <br>
    <h3><input name = "edit" type = "submit" value = "Edit Cadet Gear"></h3><br>
    <a href="AdminCadetList.php"  type="pass">Return</a><br>
  </form>
  <?php

  $error = "";

  $Username = $_POST['username'];
  $Gearname = $_POST['gearname'];
  $Issued = $_POST['numIssued'];
$Username = stripslashes($Username );
$Username = mysql_real_escape_string($Username);
$Gearname = stripslashes($Gearname );
$Gearname = mysql_real_escape_string($Gearname );
$Issued = stripslashes($Issued );
$Issued = mysql_real_escape_string($Issued );



  // Make all needed changes to cadet user
  if(isset($_POST['edit']))
  {

    $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
    $DB = mysql_select_db("team04", $ServerConnection);
    $sql = sprintf("UPDATE Cadet_Gear SET %s ='$Issued' WHERE Username= '$Username'", mysql_real_escape_string($Gearname));
    mysql_query($sql,$ServerConnection);
	$fname = mysql_query("select Fname from Cadet where Username='$Username'", $ServerConnection);
	$fnameresult = mysql_fetch_array($fname);
	$lname = mysql_query("select Lname from Cadet where Username='$Username'", $ServerConnection);
	$lnameresult = mysql_fetch_array($lname);
	$first_name = $fnameresult[0];
	$last_name =$lnameresult[0];
	$name = $last_name . ", " . $first_name;
	$gearnameread = preg_replace("/_/"," ", $Gearname);
	$error = "Issued ". $name . " " . $Issued . " " . $gearnameread;
  }
  echo "<h3><center> $error</center></h3>"
  ?>
</body>
</html>
