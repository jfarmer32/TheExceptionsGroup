<!-- AdminNotification

     Allows the admin user to gain access to notifications

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->


<?php
    session_start();
	//include('session.php');
	include('logout.php');
	include('login.php');

	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
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
    <a  href="AdminHomepage.php" >Home</a>
    <a href="AdminCadetList.php" >Cadet List</a>
    <a href="AdminInventory.php" >Inventory</a>
    <a class="active" href="AdminNotification.php" >Notifications</a>
    <a href="AdminContact.php" >Contacts</a>
  <input name = "logout" type = "submit" value = " Logout ">


  </div>

<div class="contents">
<div class="welcome">
  <h1>All Notifications</h1>
	<?php
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	mysql_select_db("team04", $ServerConnection);
	$query = mysql_query("SELECT * FROM Alert ORDER BY Id ASC", $ServerConnection);

	echo "<table align='center'>";
	echo "<tr>
    <th>Username</th>
    <th>Subject</th>
    <th>Message</th>
	<th>Select</th>
	</tr>";
	while($array = mysql_fetch_array($query)){
	$Username = $array['Username'];
	$fname = mysql_query("select Fname from Cadet where Username='$Username'", $ServerConnection);
	$fnameresult = mysql_fetch_array($fname);
	$lname = mysql_query("select Lname from Cadet where Username='$Username'", $ServerConnection);
	$lnameresult = mysql_fetch_array($lname);
	$first_name = $fnameresult[0];
	$last_name =$lnameresult[0];
	$name = $last_name . ", " . $first_name;
	echo  "<tr><td>" . $name . "</td><td>" . $array['Subject'] . "</td><td>" . $array['Message'] . "</td><td><input type='checkbox' name='chkbox[]' value= " . $array['Id'] . " id='checkbox'></td></tr>";
	}
	echo "</table>";
	mysql_close();
  echo "<div style ='padding-top: 10px;'>";
  echo "<input style = 'margin-left: 2%;' name = 'print' formaction='/~pklene/print_notifications.php' type = 'submit' value = 'Print Table'>";
	echo "<input style = 'margin-left: 2%;' name = 'delete' type = 'submit' value = 'Delete Selected'>";
  echo "</div>";
	if(isset($_POST['delete']))
	{
		 $cnt=array();
		 $cnt=count($_POST['chkbox']);
		 for($i=0;$i<$cnt;$i++)
		  {

			$del_id=$_POST['chkbox'][$i];
			mysql_query("DELETE FROM Alert WHERE Id=$del_id", $ServerConnection);

		  }
		$query = mysql_query("SELECT Username, Subject, Message FROM Alert", $ServerConnection);

		header("Refresh:0");
	}
	?>
</div>
</div>
</form>
</body>

</html>
