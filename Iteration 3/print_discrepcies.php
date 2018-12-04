<!-- print_discrepcies.php

prints all discrepcies

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

<!-- PHP Code -->
<?php
    
	// Username Variable and Connection
    $Username = $_SESSION['login_user'];
    $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

    // Make Connections
    $sql = "SELECT * FROM Gear";
    $query = mysqli_query($ServerConnection, $sql);
    $Cadet_num = "SELECT * FROM Cadet";
    $Cadet_numQuery = mysqli_query($ServerConnection, $Cadet_num);
    $num_cadets = mysqli_num_rows($Cadet_numQuery);

    // Display
    echo "<div>";
    echo "<table style='width:40%;' align='left'>";
    echo "<tr>
    <th>GearName</th>
    <th>Needed or Surplus</th>
    </tr>";
	
    // Loop through all discrepcies
	$rows = mysqli_num_rows($query);
	for($x= 0; $x < $rows; $x++)
    {
		$array = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$Allowed = $array['Allowed'] * $num_cadets;
		$On_Hand = $array['On_Hand'];
		$gearname = $array['Gearname'];

		if((int)$On_Hand !== (int)$Allowed)
		{
			$needed = $Allowed - $On_Hand;

			$gearnameread = preg_replace("/_/"," ", $gearname);
			if($needed > 0)
			{
				echo "<tr><td>" . $gearnameread . "</td><td>" . $needed. " are needed</td></tr>";


			}
			else
			{
					$needed = $needed * -1;
				echo "<tr><td>" . $gearnameread . "</td><td>Surplus of " . $needed. "</td></tr>";

			}


		}
	  }



	// Display error
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
		  <tr><td>Return to VIMS : </td><td><a href='admin_discrepncey.php'  type='pass' align='center'>Return</a></td></tr>";
	echo "</div>";

  ?>
</body>
</html>
