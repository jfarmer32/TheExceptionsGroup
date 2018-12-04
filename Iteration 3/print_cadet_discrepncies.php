<!-- print_discrepcies.php

prints all cadet discrepcies

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<!DOCTYPE html>
<head>

<!-- Default CSS -->
<style>
table, th, td { /* <---- Table, th, td */
	border: 1px solid black;
}

th{ /* <---- th */
	padding: 10px;
}

td{ /* <---- td */
	text-align: left;
	padding: 10px;
}
</style>
</head>
<body>

<!-- PHP Code -->
<?php

// Make connection
$Username = $_SESSION['login_user'];
$ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

$sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
$query = mysqli_query($ServerConnection, $sql);
$col = "SHOW COLUMNS FROM Cadet_Gear";
$colQuery = mysqli_query($ServerConnection, $col);
$rowcount = mysqli_num_rows($colQuery);
$array = mysqli_fetch_array($query, MYSQLI_NUM);

// Display
echo "<div>";
echo "<table style='width:auto;' align='left'>";
echo "<tr>
<th>GearName</th>
<th>Needed or Surplus</th>
</tr>";

// loop through array
for($i = 0;$i < $rowcount; $i++)

{
$fieldinfo = mysqli_fetch_field($query);
 if($i >= 3)
{

$gearname = $fieldinfo->name;
$sql2 = sprintf("SELECT Allowed FROM Gear WHERE Gearname = '%s'",$gearname);
$query2 = mysqli_query($ServerConnection, $sql2);

if (!mysqli_query($ServerConnection,$sql2))
  {
  echo("Error description: " . mysqli_error($ServerConnection));
  }
$array2 = mysqli_fetch_array($query2, MYSQLI_NUM);

$CadetGear = $array[$i];
$Allowed = $array2[0];

// if gear is not allowed
if($CadetGear !== $Allowed)
{
  $needed = $Allowed - $CadetGear;

  $gearnameread = preg_replace("/_/"," ", $gearname);
  
  if($needed > 0)
  {
    echo "<tr><td>" . $gearnameread . "</td><td>You need " . $needed. " more</td></tr>";

  }
  else
  {
      $needed = $needed * -1;
    echo "<tr><td>" . $gearnameread . "</td><td>You have a Surplus of " . $needed. "</td></tr>";
  }

}
}
}

// Display error or final result
$error = "Unable to view Cadet gear for $Username";
mysqli_close($ServerConnection);
echo "</table>";
	echo "<div>";
	echo "<table style='width:20%;' align='right'>";
	echo "<tr>
		  <th> Action </th>
		  <th> Keys </th>
		  </tr>";
	echo "<tr><td>Select All : </td><td>Control + A</td></tr>
		  <tr><td>Save Table  : </td><td>Control + S</td></tr>
		  <tr><td>Print Table : </td><td>Contorl + P</td></tr>
		  <tr><td>Return to VIMS : </td><td><a href='user_discrepncey.php'  type='pass' align='center'>Return</a></td></tr>";
	echo "</div>";

  ?>
</body>
</html>
