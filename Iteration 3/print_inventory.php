<!-- print_inventory.php

prints all inventory items

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
<title>Print Company Inventory</title>

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
$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
mysql_select_db("team04", $ServerConnection);
$query = mysql_query("SELECT * FROM Gear ORDER BY Id ASC", $ServerConnection);

// Print rows
$rows = mysql_num_rows($query);
echo "<table style='width:40%;' align='left'>";
echo "<tr>
<th> Gearname </th>
<th> Allowed </th>
<th> On Hand </th>
<th> Issued </th>
</tr>";
$array = "";

// Loop through array
for($x= 0; $x < $rows; $x++){
$array = mysql_fetch_array($query);
$i++;
$gear = $array['Gearname'];
$gear = preg_replace("/_/"," ", $gear);
echo  "<tr><td>" . $gear . "</td><td>" . $array['Allowed'] . "</td><td>" . $array['On_Hand'] . "</td><td>" . $array['Issued'] . "</td></tr>";
}

// Display final result
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
      <tr><td>Return to VIMS : </td><td><a href='AdminInventory.php'  type='pass' align='center'>Return</a></td></tr>";
echo "</div>";
?>
</body>
</html>
