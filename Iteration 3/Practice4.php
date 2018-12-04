<?php
session_start();

// Include the Login and Logout php
include('logout.php');
include('login.php');

// Change header to index.php
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
    <a href="UserHomepage.php">Home</a>
    <a href="UserInventory.php">Inventory</a>
    <a class="active" href="UserNotification.php">Notifications</a>
    <a href="UserAccount.php">Account</a>
    <input name = "logout" type = "submit" value = " Logout ">


  </div>
  <div class="contents">
    <div class="welcome">
      <h1>Valor Inventory Management System</h1><br>
      <h2>Notification</h2>
      <div>
      <input name = "subject" type = "text" placeholder="Subject"> <br>
      <textarea name = "message" maxlength = "255" rows = "6" cols = "55" > Enter Message Here </textarea><br>
      <input   name = "alert_send" type = "submit" value = " Submit Notifcations ">
      <h3> <?php echo $error; ?></h3>
      </div>
    	<br>
    	<br>
    	<br>
     <?php
    	$Username = $_SESSION['login_user'];
    	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
    	mysql_select_db("team04", $ServerConnection);
    	$query = mysql_query("SELECT * FROM Alert WHERE Username = '$Username' ORDER BY Id ASC ", $ServerConnection);
    	$rows = mysql_num_rows($query);

    	if($rows > 0)
    	{

    		echo "<table align='center'>";
    		echo "<tr>
    		<th>Username</th>
    		<th>Subject</th>
    		<th>Message</th>
    		<th>Select</th>
    		</tr>";
    		while($array = mysql_fetch_array($query)){

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
    		echo "<br>";
    		echo "<br>";
    		echo "<input name = 'delete' type = 'submit' value = 'Delete Selected'>";
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
    	}
    	?>

    </div>
  </div>
</form>
</body>
</html>
