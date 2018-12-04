<!-- admin_print_cadet_def.php

     Prints all cadet information for a given cadet

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php?>

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

<!-- PHP -->
<?php

// Variables
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to server
$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
mysql_select_db("team04", $ServerConnection);
$query = mysql_query("SELECT Username FROM Cadet", $ServerConnection);

// Get First and Last names
$usernameunder = $_POST['username3'];
$fname = mysql_query("select Fname from Cadet where Username='$usernameunder'", $ServerConnection);
$fnameresult = mysql_fetch_array($fname);
$lname = mysql_query("select Lname from Cadet where Username='$usernameunder'", $ServerConnection);
$lnameresult = mysql_fetch_array($lname);
$first_name = $fnameresult[0];
$last_name =$lnameresult[0];
$name = $last_name . ", " . $first_name;
$Username = $_POST['username3'];
$ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

// Connect to server
$sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
$query = mysqli_query($ServerConnection, $sql);
$col = "SHOW COLUMNS FROM Cadet_Gear";
$colQuery = mysqli_query($ServerConnection, $col);
$rowcount = mysqli_num_rows($colQuery);
$array = mysqli_fetch_array($query, MYSQLI_NUM);

// Display information
echo "<div>";
echo "<table style='width:auto;' align='left'>";
echo "<tr>
<th>GearName</th>
<th>Needed or Surplus</th>
</tr>";

// Loop through all user's equipment
echo "<tr><td> Cadet </td><td>" . $name. "</td></tr>";
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

    if($CadetGear !== $Allowed)
    {
      $needed = $Allowed - $CadetGear;

      $gearnameread = preg_replace("/_/"," ", $gearname);
      if($needed > 0)
      {
        echo "<tr><td>" . $gearnameread . "</td><td>They need " . $needed. " more</td></tr>";

      }
      else
      {
        $needed = $needed * -1;
        echo "<tr><td>" . $gearnameread . "</td><td>They have a Surplus of " . $needed. "</td></tr>";
      }


    }
  }
}

// Display Error
$error = "Unable to view Cadet gear for $Username";
mysqli_close($ServerConnection);
echo "</table>";

// Display Information
echo "<div>";
echo "<table style='width:20%;' align='right'>";
echo "<tr>
    <th> Action </th>
    <th> Keys </th>
    </tr>";
echo "<tr><td>Select All : </td><td>Control + A</td></tr>
    <tr><td>Save Table  : </td><td>Control + S</td></tr>
    <tr><td>Print Table : </td><td>Contorl + P</td></tr>
    <tr><td>Return to VIMS : </td><td><a href='view_or_edit_cadet_gear.php'  type='pass' align='center'>Return</a></td></tr>";
echo "</div>";
?>
</body>
</html>
