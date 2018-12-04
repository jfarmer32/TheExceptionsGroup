<!-- edit_gear_type.php

     Used to edit gear types

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

<!-- Title -->
<title>Edit Gear Type</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- styleSheet.css -->

<!-- Default CSS -->
<style>
html,body { /* <---- HTML and Body */
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }
input[type = submit]{ /* <---- Input Submit */
    margin-right: 130px;
    background-color: #003C71;
}
a[type = pass]{ /* <---- type Pass */
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

<!-- topLogin Code -->
<div class="topWorkBox" align="center">
	<h2 style = "font-style: bold;" align="left">Edit Gear Type</h2>
</div>

<!-- Login Code -->
<div class="workBox" align="left">
 <form action="" method="post">
	<br><br>
	<select name="gearname" align = "center">

	<!-- Connect to Server and Display -->
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


	<br>

	<!-- Insert Gear Code -->
	<?php
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	mysql_select_db("team04", $ServerConnection);
	$Gearname = $_POST['gearname'];
	$query = mysql_query("SELECT Allowed FROM Gear WHERE Gearname = '$Gearname'", $ServerConnection);
	$array = mysql_fetch_array($query);
	$Allowed = $array['Allowed'];
	echo "<input name='Allowed' type='text' value='$Allowed' placeholder = 'Allowed'  id='Username' >";
	?>
    <br>
    <?php
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	mysql_select_db("team04", $ServerConnection);
	$Gearname = $_POST['gearname'];
	$query = mysql_query("SELECT On_Hand FROM Gear WHERE Gearname = '$Gearname'", $ServerConnection);
	$array = mysql_fetch_array($query);
	$On_Hand = $array['On_Hand'];
	echo "<input name='On_Hand' type='text' value='$On_Hand' placeholder = 'On Hand'  id='Username' >";
	?>

    <br>



	<h3><input name = "submit" type = "submit" value = "Edit Gear Type"></h3><br>
	<a href="AdminInventory.php"  type="pass">Return</a><br>
	</form>
	<?php
	$error = "";

	// Make needed changes
	if(isset($_POST['submit']))
		{

			$Gearname = $_POST['gearname'];
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
			$name = "Allowed";
			$sql = sprintf("UPDATE Gear SET %s ='$Allowed' WHERE Gearname = '$Gearname'",
			mysql_real_escape_string($name));
			mysql_query($sql,$ServerConnection);
			mysql_query("UPDATE Gear SET On_Hand ='$On_Hand' WHERE Gearname = '$Gearname'");
			$error = "Updated Gear Type $Gearname";
			mysql_close($connection);
		}
		echo "<h3><center> $error</center></h3>"
	?>



</div>

</body>
</html>
