<!-- update_attributes.php

Updates all attributes

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
$error = "";

// when update is called
if(isset($_POST['update_attributes']))
	{
    $Username = $_SESSION['login_user'];
		$Message = $_POST['attributes'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Message = stripslashes($Message);
		$Message = mysql_real_escape_string($Message);
		$DB = mysql_select_db("team04", $ServerConnection);
		mysql_query("UPDATE Cadet_Gear
								 SET Attributes = '$Message'
								 WHERE Username = '$Username'");
		mysql_close($ServerConnection);
	}
?>
