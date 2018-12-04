<!-- ForgotPasswordAlert
	 
     Used to send an alert if the password is forgotten

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<!-- PHP -->
<?php
$error = "";

// When password is called to reset
if(isset($_POST['password_reset']))
	{
		$Username = $_POST['user'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Username = stripslashes($Username);
		$Username = mysql_real_escape_string($Username);
		$DB = mysql_select_db("team04", $ServerConnection);
		$query = mysql_query("select * from Cadet where Username='$Username'", $ServerConnection);
		$rows = mysql_num_rows($query);
		
		// Send alert message
		if ($rows == 1) 
		{ 
			mysql_query("INSERT INTO Alert (Username, Subject, Message) VALUES ('$Username','Password Reset','A cadet has forgotten there password a needs a default reset')");
			$error = "Sent Request";	
		}
		
		// Deploy error message
		else 
		{
			$error = "Username does not exist";	
		}
		mysql_close($ServerConnection);
	}
?>