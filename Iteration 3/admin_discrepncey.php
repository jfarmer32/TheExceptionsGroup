<?php
session_start();
//include('session.php');
include('logout.php');
include('login.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
{
  header("location: index.php");
}
?>
<html>
<head>
  <title>Company Supply Deficiencies</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css">
  <style>
html,body {
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }

input[type = submit]{
    margin-right: 130px;
    background-color: #003C71;
}
a[type = pass]{
  padding-left: 170px;
}
</style>
</head>
<body>
<br></br>
<div class="topWorkBox" align="center">
  <h2 style = "font-style: bold;" align="left">Company Supply Deficiencies</h2>
</div>
<div class="workBox" align="left" style = "overflow: auto; height: 80%;">
<a href="AdminInventory.php"  type="pass">Return</a><br>
 <?php
    $Username = $_SESSION['login_user'];
    $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

    $sql = "SELECT * FROM Gear";
    $query = mysqli_query($ServerConnection, $sql);
    $Cadet_num = "SELECT * FROM Cadet";
    $Cadet_numQuery = mysqli_query($ServerConnection, $Cadet_num);
    $num_cadets = mysqli_num_rows($Cadet_numQuery);


    echo "<div>";
    echo "<table style='width:auto;' align='center'>";
    echo "<tr>
    <th>GearName</th>
    <th>Needed or Surplus</th>
    </tr>";
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




    $error = "Unable to view Cadet gear for $Username";
    mysqli_close($ServerConnection);
    echo "</table>";
	echo "<form>";
	echo "<input name = 'print' formaction='/~pklene/print_discrepcies.php' type = 'submit' value = 'Print Table'>";
	echo "</form>";
  ?>

</div>
</body>
</html>
