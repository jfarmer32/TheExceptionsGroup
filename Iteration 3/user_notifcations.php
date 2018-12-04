<?php
$error = "";
if(isset($_POST['alert_send']))
	{
		$Username = $_SESSION['login_user'];
		$Subject = $_POST['subject'];
		$Message = $_POST['message'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Username = stripslashes($Username);
		$Username = mysql_real_escape_string($Username);
		$Subject = stripslashes($Subject);
		$Subject = mysql_real_escape_string($Subject);
		$Message = stripslashes($Message);
		$Message = mysql_real_escape_string($Message);
		$DB = mysql_select_db("team04", $ServerConnection);
		mysql_query("INSERT INTO Alert (Username, Subject, Message) VALUES ('$Username','$Subject','$Message')");
		$error = "Sent Request";	
		mysql_close($ServerConnection);
	}
?>