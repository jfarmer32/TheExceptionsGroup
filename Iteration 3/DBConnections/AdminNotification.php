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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>
<body>
<ul class="topbar">
	<img src = "https://i.imgur.com/wlzBiEp.png" width="90" height="90" style="float:left;padding-left: 100px;padding-top: 5px;">
	<h1 class = "help" style = "padding-right: 140px" >Valor Inventory Management System</h1>
</ul>
<ul class="BufferBar">
	 <h3> USER: <?php echo $_SESSION['last_name'] ?> <?php echo $_SESSION['first_name'] ?></h3>
</ul>
<form action="" method="post">	
<ul class="sidenav">
  <li><a href="AdminHomepage.php" >Home</a></li>
  <li><a href="AdminCadetList.php" >Cadet List</a></li>
  <li><a href="AdminInventory.php" >Inventory</a></li>
  <li><a class="active" href="AdminNotification.php" >Notifications</a></li>
  <li><a href="AdminAccounts.php" >Accounts</a></li>
  <li><a href="AdminContact.php" >Contact Cadets</a></li><br><br>
  <li><input name = "logout" type = "submit" value = " Logout "></li>
</ul>

<div class="content">
  <h1>Valor Inventory Management System</h1><br>
  <h2>Notifications</h2>
	<?php 
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	mysql_select_db("team04", $ServerConnection);
	$query = mysql_query("SELECT * FROM Alert", $ServerConnection);
	
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
	echo "<input name = 'delete' type = 'submit' value = 'Delete Selected'>";
	if(isset($_POST['delete']))
	{
	 $cnt=array();
	 $cnt=count($_POST['chkbox']);
	 for($i=0;$i<$cnt;$i++)
	  {
		 
		 $del_id=$_POST['chkbox'][$i];
		 echo $del_id;
		 mysql_query("DELETE FROM Alert WHERE Id=$del_id", $ServerConnection);
		 header("Refresh:0");
	  }
	}	
	?>
</div>
</form>
</body>

</html>