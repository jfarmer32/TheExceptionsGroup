<!-- Change_Password_Function
	 
     The functionality used to change the password to a cadet user or admin user

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->


<?php
$error = "";
if(isset($_POST['Change_Password']))
	
	// Error called if any of the textfields are blank
	if (empty($_POST['New_Password']) || empty($_POST['Confirm_Password']))
	{
		$error = "New Password or Confirm Password is Blank";
		
	}

	// Continue to change password
	else
	{
		// Fill in the new password and confirm password
		$New_Password = $_POST['New_Password'];
		$Confirm_Password = $_POST['Confirm_Password'];
		
		// Start Session with the logged in user
		$Username = $_SESSION['login_user'];
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		
		// Attempt to Change Password
		$New_Password = stripslashes($New_Password);
		$Confirm_Password = stripslashes($Confirm_Password);
		$Username = stripslashes($Username);
		$Username = mysql_real_escape_string($Username);
		$New_Password = mysql_real_escape_string($New_Password);
		$Confirm_Password = mysql_real_escape_string($Confirm_Password);
		$DB = mysql_select_db("team04", $ServerConnection);
		$query = mysql_query("select * from Cadet where Username='$Username'", $ServerConnection);
		$rows = mysql_num_rows($query);
		
		// Confirm new password
		if ($rows == 1) 
		{
			mysql_query("UPDATE Cadet SET Password='$New_Password' WHERE Username = '$Username'");
			$error = "Changed Password to $New_Password";	
		}
		// Declare the session failed
		else 
		{
			$error = "Session is invalid";	
		}
		mysql_close($connection);
	}
?>