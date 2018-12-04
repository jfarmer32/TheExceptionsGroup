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
<title>Inventory Deficiencies</title>

  <title></title>
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
  <h2 style = "font-style: bold;" align="left">Inventory Deficiencies</h2>
</div>
<div class="workBox" align="left" style = "overflow: auto; height: 80%;">
<a href="UserInventory.php"  type="pass">Return</a><br>
 <?php
    $Username = $_SESSION['login_user'];
    $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

    $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
    $query = mysqli_query($ServerConnection, $sql);
    $col = "SHOW COLUMNS FROM Cadet_Gear";
    $colQuery = mysqli_query($ServerConnection, $col);
    $rowcount = mysqli_num_rows($colQuery);
    $array = mysqli_fetch_array($query, MYSQLI_NUM);

    echo "<div>";
    echo "<table style='width:auto;' align='center'>";
    echo "<tr>
    <th>GearName</th>
    <th>Needed or Surplus</th>
    </tr>";

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
		//echo $array;
		//echo $array[$i];
		//echo $gearname;
		//echo $array2[0];
		$CadetGear = $array[$i];
		$Allowed = $array2[0];
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

    $error = "Unable to view Cadet gear for $Username";
    mysqli_close($ServerConnection);
    echo "</table>";

    echo "<form>";
  	echo "<input name = 'print' formaction='/~pklene/print_cadet_discrepncies.php' type = 'submit' value = 'Print Table'>";
  	echo "</form>";

  ?>

</div>
</body>
</html>
