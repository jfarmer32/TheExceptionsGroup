<!-- admin_print_cadet_gear.php

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

// Error Variables
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
  // Get Username
  $Username = $_POST['username2'];
  $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

  // Get information
  $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
  $query = mysqli_query($ServerConnection, $sql);
  $col = "SHOW COLUMNS FROM Cadet_Gear";
  $colQuery = mysqli_query($ServerConnection, $col);
  $rowcount = mysqli_num_rows($colQuery);
  $array = mysqli_fetch_array($query, MYSQLI_NUM);

  // Display gear and amount
  echo "<div>";
  echo "<table style='width:auto;' align='left'>";
  echo "<tr>
  <th>GearName</th>
  <th>Ammount</th>
  </tr>";

  // Loop through gear
  for($i = 0;$i < $rowcount; $i++)
  {
    $fieldinfo = mysqli_fetch_field($query);
    $gearname = $fieldinfo->name;
    $gearnameread = preg_replace("/_/"," ", $gearname);
    if($i>=3){
    echo "<tr><td>" . $gearnameread . "</td><td>" . $array[$i] . "</td></tr>";
  }
  }

  // Display error
  $error = "Unable to view Cadet gear for $Username";
  mysqli_close($ServerConnection);
  echo "</table>";

  // Display information
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
