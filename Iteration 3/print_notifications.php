<!-- print_notifications.php

prints all notifications

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
<title>Print Notifcations</title>

<!-- Default CSS -->
<style>
table, th, td { /* <---- Table, th, td */
	border: 1px solid black;
}

th{ /* <---- th*/
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
$query = mysql_query("SELECT * FROM Alert ORDER BY Id ASC", $ServerConnection);

// Display
echo "<table style='width:60%;' align='left'>";
echo "<tr>
  <th>Username</th>
  <th>Subject</th>
  <th>Message</th>

</tr>";

// Loop through the array
while($array = mysql_fetch_array($query)){
$Username = $array['Username'];
$fname = mysql_query("select Fname from Cadet where Username='$Username'", $ServerConnection);
$fnameresult = mysql_fetch_array($fname);
$lname = mysql_query("select Lname from Cadet where Username='$Username'", $ServerConnection);
$lnameresult = mysql_fetch_array($lname);
$first_name = $fnameresult[0];
$last_name =$lnameresult[0];
$name = $last_name . ", " . $first_name;
echo  "<tr style='border: 1px;'><td>" . $name . "</td><td>" . $array['Subject'] . "</td><td>" . $array['Message'] . "</td></tr>";
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
      <tr><td>Return to VIMS : </td><td><a href='AdminNotification.php'  type='pass' align='center'>Return</a></td></tr>";
echo "</div>";
?>
</body>
</html>
