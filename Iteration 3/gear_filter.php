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
<title>Filter by Gear Type</title>
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
	<h2 style = "font-style: bold;" align="left">Filter By Gear Type</h2>
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


    <br>



	<h3><input name = "submit" type = "submit" value = "Edit Gear Type"></h3><br>
	<a href="AdminInventory.php"  type="pass">Return</a><br>
	</form>
	<?php
	$error = "";

	// Make needed changes
	if(isset($_POST['submit']))
		{
			$ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");
			$Username = $_SESSION['login_user'];
			$Gearname = $_POST['gearname'];
			$Gearname = stripslashes($Gearname );
			$Gearname = mysql_real_escape_string($Gearname );

			$sql =sprintf("SELECT %s FROM Cadet_Gear WHERE Username = '$Username'",$Gearname);
			 //"SELECT * FROM Cadet_Gear WHERE Username = '$Username' AND Gearname = '$Gearname'";
		  $query = mysqli_query($ServerConnection, $sql);

		  $array = mysqli_fetch_array($query, MYSQLI_NUM);

		 $Ammount = $array[0];
		  echo "<div>";
		  echo "<table style='width:auto;' align='center'>";
		  echo "<tr>
		  <th>GearName</th>
		  <th>Amount</th>
		  </tr>";
			$gearnameread = preg_replace("/_/"," ", $Gearname);

		echo "<tr><td>" . $gearnameread . "</td><td>" . $Ammount. "</td></tr>";

		  $error = "Unable to view Cadet gear for $Username";
		  mysqli_close($ServerConnection);
		  echo "</table>";
			}

	?>



</div>

</body>
</html>
