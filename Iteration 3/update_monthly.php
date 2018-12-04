<!-- update_monthly.php

Updates all attributes monthly

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
$error = "";

// When update is called
if(isset($_POST['update_monthly']))
	{
		$Message = $_POST['monthly_message'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Message = stripslashes($Message);
		$Message = mysql_real_escape_string($Message);
		$DB = mysql_select_db("team04", $ServerConnection);
		mysql_query("UPDATE Homepage
								 SET Content = '$Message'
								 WHERE Homepage_Id = 4");
		mysql_close($ServerConnection);
	}
?>
