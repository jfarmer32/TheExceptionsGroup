<!-- print_cadets.php

prints all cadets

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();

// all PHP classes
include('logout.php');
include('login.php');

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
  header("location: index.php");
}
?>

<!DOCTYPE html>
<head>

<title>Print Cadet List</title>

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
$query = mysql_query("SELECT * FROM Cadet ORDER BY Cadet_Id ASC", $ServerConnection);

$rows = mysql_num_rows($query);

// Display table
echo "<table style='width:40%;' align='left'>";
echo "<tr>
<th> Last Name </th>
<th> First Name </th>
<th> Username </th>
<th> Password </th>
</tr>";
$array = "";

// Loop through rows
for($x= 0; $x < $rows; $x++){
  $array = mysql_fetch_array($query);
  $i++;
  echo  "<tr><td>" . $array['Lname'] . "</td><td>" . $array['Fname'] . "</td><td>" . $array['Username'] . "</td><td>" . $array['Password'] . "</td></tr>";
}

// Display final results
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
