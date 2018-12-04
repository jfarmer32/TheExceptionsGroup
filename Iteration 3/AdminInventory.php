  <?php
    session_start();
	//include('session.php');
	include('logout.php');
	include('login.php');
	include('IssuedTotal.php');
	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true || $_SESSION['login_user'] !== "Admin")
	{
    header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<header>
<h1 class="logo"><?php echo $_SESSION['last_name'] ?>, <?php echo $_SESSION['first_name'] ?></h1>

<nav>
<form action="" method="post">
<ul>
  <li><a id="txt"></a></li>
  <a id="link" href="https://www.goarmyed.com/cadet/" type="topLink2">Go Army ED</a>
  <a id="link" href="https://www.radford.edu/content/radfordcore/home.html" type="topLink" >Radford Homepage</a>
</ul>
</nav>
</label>
<link rel="stylesheet" type="text/css" .css = "text/css" href="webpage.css">
</header>
<body onload="startTime()">
<script src="timeJavaScript.js"></script>

<div class="title">
  <label>Valor Inventory Management System</label>

</div>

  <div class="sidenav">
    <a href="AdminHomepage.php" >Home</a>
    <a href="AdminCadetList.php" >Cadet List</a>
    <a class="active" href="AdminInventory.php" >Inventory</a>
    <a href="AdminNotification.php" >Notifications</a>
    <a href="AdminContact.php" >Contacts</a>
  <input name = "logout" type = "submit" value = " Logout ">


  </div>
<div class="contents">
<div class="welcome">
  <h1>Total Inventory</h1>
  <?php
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	mysql_select_db("team04", $ServerConnection);
	$query = mysql_query("SELECT * FROM Gear ORDER BY Id ASC", $ServerConnection);

	$rows = mysql_num_rows($query);
	echo "<div style='overflow: auto;'>";
	echo "<table align='center' width='60%'>";
	echo "<tr>
    <th>Gearname</th>
    <th>Allowed</th>
    <th>On Hand</th>
	<th>Issued</th>
	</tr>";
	$i = 0;
	$array = "";
		for($x= 0; $x < $rows/2; $x++){
		$array = mysql_fetch_array($query);
		$i++;
		$gear = $array['Gearname'];
		$gear = preg_replace("/_/"," ", $gear);
		echo  "<tr><td>" . $gear . "</td><td>" . $array['Allowed'] . "</td><td>" . $array['On_Hand'] . "</td><td>" . $array['Issued'] . "</td><td><input type='checkbox' name='chkbox[]' value= " . $array['Id'] . " id='checkbox'></td></tr>";
		}
	echo "</table>";
	echo "<table align='center' width='60%'>";
	echo "<tr>
    <th>Gearname</th>
    <th>Allowed</th>
    <th>On Hand</th>
	<th>Issued</th>
	</tr>";
	for($x= $i; $x < $rows; $x++){
	$i++;
	$array = mysql_fetch_array($query);
	$gear = $array['Gearname'];
	$gear = preg_replace("/_/"," ", $gear);
	echo  "<tr><td>" . $gear . "</td><td>" . $array['Allowed'] . "</td><td>" . $array['On_Hand'] . "</td><td>" . $array['Issued'] . "</td><td><input type='checkbox' name='chkbox2[]' value= " . $array['Id'] . " id='checkbox'></td></tr>";
	}
	echo "</table>";
	echo "</div>";
	mysql_close();
	echo "<br>";
	echo "<br>";
	echo "<div>";
  echo "<input style = 'margin-left: 2%;' name = 'print' formaction='/~pklene/print_inventory.php' type = 'submit' value = 'Print Table'>";
	echo "<input style = 'margin-left: 2%;' name = 'delete' type = 'submit' value = 'Delete Selected Gear Type'>";
	echo "<input style = 'margin-left: 2%;' name = 'edit' formaction='/~pklene/edit_gear_type.php' type = 'submit' value = 'Edit Gear Totals'>";
	echo "<input style = 'margin-left: 2%;' name = 'add' formaction='/~pklene/add_gear_type.php' type = 'submit' value = 'Add New Gear Type'>";
	echo "<input style = 'margin-left: 2%;' name = 'view' formaction='/~pklene/admin_discrepncey.php' type = 'submit' value = 'View Inventory Deficiencies'>";
	echo "</div>";
	if(isset($_POST['delete']))
	{
			$cnt=array();
			$cnt=count($_POST['chkbox']);

		 for($i=0;$i<$cnt;$i++)
		  {
			$del_id=$_POST['chkbox'][$i];
			$gear = mysql_query("SELECT Gearname FROM Gear WHERE Id=$del_id", $ServerConnection);
			$geartemp = mysql_fetch_array($gear);
			$gearname = $geartemp['Gearname'];
			mysql_query("ALTER TABLE Cadet_Gear DROP COLUMN '$gearname'", $ServerConnection);
			mysql_query("DELETE FROM Gear WHERE Gearname='$gearname'", $ServerConnection);

		  }
		  $cnt2=array();
		 $cnt2=count($_POST['chkbox2']);

		 for($i=0;$i<$cnt2;$i++)
		  {
			$del_id=$_POST['chkbox2'][$i];
			$gear = mysql_query("SELECT Gearname FROM Gear WHERE Id=$del_id", $ServerConnection);
			$geartemp = mysql_fetch_array($gear);
			$gearname = $geartemp['Gearname'];
			echo ($gearname);
			mysql_query("ALTER TABLE Cadet_Gear DROP COLUMN '$gearname'", $ServerConnection);
			mysql_query("DELETE FROM Gear WHERE Gearname='$gearname'", $ServerConnection);

		  }

	}
	if(isset($_POST['add']))
	{

		header("location: index.php");
	}


	?>
</div>
</div>
</form>
</body>
</html>
