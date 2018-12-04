<?php
	session_start();

	include('logout.php');
	include('login.php');
	include('update_attributes.php');

	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true || $_SESSION['login_user'] == "Admin")
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
    <a class="active" href="UserInventory.php">Inventory</a>
    <a href="UserNotification.php">Notifications</a>
    <a href="UserAccount.php">Account</a>
    <input name = "logout" type = "submit" value = " Logout ">


  </div>
  <div class="contents">
    <div class="welcome">
      <h1>Valor Inventory Management System</h1><br>
      <h2>Inventory</h2>
    	<div>
    		<input name = "attributes" type = "text" placeholder="Attributes"> <br>
    		<input   name = "update_attributes" type = "submit" value = " Update Arributes ">
    	</div>
    	<?php
        $error = "";
        $Username = $_SESSION['login_user'];
        $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

        $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
        $query = mysqli_query($ServerConnection, $sql);
        $col = "SHOW COLUMNS FROM Cadet_Gear";
        $colQuery = mysqli_query($ServerConnection, $col);
        $rowcount = mysqli_num_rows($colQuery);
        $array = mysqli_fetch_array($query, MYSQLI_NUM);

        echo "<table style='width:50%;' align='center'>";
        echo "<tr>
        <th>Gear Name</th>
        <th>Amount</th>
        </tr>";

        for($i = 0;$i < $rowcount; $i++)
        {
          $fieldinfo = mysqli_fetch_field($query);
    	  if($i >= 1)
    	  {
          $gearname = $fieldinfo->name;
    	  $gearnameread = preg_replace("/_/"," ", $gearname);
          echo "<tr><td>" . $gearnameread . "</td><td>" . $array[$i] . "</td></tr>";
    	  }
        }

        $error = "Unable to view Cadet gear for $Username";
        mysqli_close($ServerConnection);
        echo "</table>";
    	echo "<input name = 'print' formaction='/~pklene/print_cadet_gear.php' type = 'submit' value = 'Print Table'>";
    	echo "<input name = 'filter' formaction='/~pklene/gear_filter.php' type = 'submit' value = 'Filter By Gear Type'>";
    	echo "<input name = 'view' formaction='/~pklene/user_discrepncey.php' type = 'submit' value = 'View Inventory deficiencies'>";
      ?>
    </div>
  </div>
</form>
</body>
</html>
