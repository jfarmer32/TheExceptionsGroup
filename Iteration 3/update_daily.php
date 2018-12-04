<!-- update_daily.php

Updates all attributes daily

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
$error = "";

// When the update is called
if(isset($_POST['update_daily']))
	{
		$Message = $_POST['daily_message'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Message = stripslashes($Message);
		$Message = mysql_real_escape_string($Message);
		$DB = mysql_select_db("team04", $ServerConnection);
		mysql_query("UPDATE Homepage
								 SET Content = '$Message'
								 WHERE Homepage_Id = 1");
		mysql_close($ServerConnection);
	}
?>
