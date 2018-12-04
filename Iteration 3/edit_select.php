<!-- edit_select.php

     Used to edit gear all selected types

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
    session_start();
	//include('session.php');
	include('logout.php'); // Required PHP
	include('login.php');

	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
	{
    header("location: index.php");
	}
?>

<html>
<head>

<!-- Title -->
<title>Add Gear Type</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- StyleSheet.css -->

</head>
<body>
<div class="bg"></div>
<br></br>
<br></br>
<h1><center></center></h1>
<br></br>

<!-- TopLogin Code -->
<div class="topWorkBox" align="center">
	<h2 style = "font-style: bold;" align="left">Edit Selected Gear Types</h2>
</div>

<!-- Login Code -->
<div class="workBox" align="left">
 <form action="" method="post">
 <?php

	// Connect to the server
	$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
	$cnt=array();
	$cnt=count($_Session['selected1']);
	echo ($_Session['selected1']);
	echo "hi";

	// Make needed edits and display
	for($i=0;$i<$cnt;$i++)
	{
		$del_id=$_Session['selected1'][$i];
		$gear = mysql_query("SELECT Gearname FROM Gear WHERE Id=$del_id", $ServerConnection);
		$geartemp = mysql_fetch_array($gear);
		$gearname = $geartemp['Gearname'];
		echo "<br><br>
		 <div class='tooltip'>

		<h3>'$gearname'</h3>
		<span class='tooltiptext'>Notice: FUCK</span>



		</div>
		<br>
		<input name='Allowed' type='text' placeholder='Allowed'  id='Username' >

		<br>
		<input name='On_Hand' type='text' placeholder='On Hand'  id='Username' >

		<br>
		<h3><input name = 'submit' type = 'submit' value = 'Add Gear Type'></h3><br>
		<a href='AdminInventory.php'  type='pass'>Return</a><br>";
	}
	$cnt2=array();
	$cnt2=count($_Session['selected2']);

	// Make needed edits and display
	for($i=0;$i<$cnt2;$i++)
   {
		$del_id=$_Session['selected1'][$i];
		$gear = mysql_query("SELECT Gearname FROM Gear WHERE Id=$del_id", $ServerConnection);
		$geartemp = mysql_fetch_array($gear);
		$gearname = $geartemp['Gearname'];
		echo "<br><br>
		 <div class='tooltip'>

		<h3>'$gearname'</h3>
		<span class='tooltiptext'>Notice: FUCK</span>



		</div>
		<br>
		<input name='Allowed' type='text' placeholder='Allowed'  id='Username' >

		<br>
		<input name='On_Hand' type='text' placeholder='On Hand'  id='Username' >

		<br>
		<h3><input name = 'submit' type = 'submit' value = 'Add Gear Type'></h3><br>
		<a href='AdminInventory.php'  type='pass'>Return</a><br>";
	}

	?>
	</form>



</div>

</body>
</html>
