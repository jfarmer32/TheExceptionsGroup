<!-- print_cadet_gear.php

prints all cadet gear items

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();

// All PHP classes
include('logout.php');
include('login.php');

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
header("location: index.php");
}
?>
<!DOCTYPE html>
<head>
<title>Print Cadet Gear</title>

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
  $error = "";
  $Username = $_SESSION['login_user'];
  $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

  $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
  $query = mysqli_query($ServerConnection, $sql);
  $col = "SHOW COLUMNS FROM Cadet_Gear";
  $colQuery = mysqli_query($ServerConnection, $col);
  $rowcount = mysqli_num_rows($colQuery);
  $array = mysqli_fetch_array($query, MYSQLI_NUM);
  
  // Show details
  echo "<table style='width:30%;' align='left'>";
  echo "<tr>
  <th>Gear Name</th>
  <th>Amount</th>
  </tr>";

  // Loop through row count
  for($i = 0;$i < $rowcount; $i++)
  {
    $fieldinfo = mysqli_fetch_field($query);
  if($i >= 1)
  {
    $gearname = $fieldinfo->name;
  $gearnameread = preg_replace("/_/"," ", $gearname);
    echo "<tr><td>" . $gearnameread . "</td><td>" . $array[$i] . "</td></tr>";
  }
  }

  // Display Error
  $error = "Unable to view Cadet gear for $Username";
  mysqli_close($ServerConnection);
  
  // Display results
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
<tr><td>Return to VIMS : </td><td><a href='AdminCadetList.php'  type='pass' align='center'>Return</a></td></tr>";
echo "</div>";
?>
</body>
</html>
