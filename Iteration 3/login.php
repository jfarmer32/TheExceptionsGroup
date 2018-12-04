<!-- login

     Used to login to the system

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php


	session_start(); // Creates a session for the user
	$error = "";

	if(isset($_POST['send']))  // If the send button is clicked (User)
	if (empty($_POST['Username']) || empty($_POST['Password']))
	{
		$error = "Username or Password is Blank"; // Throws an error if un or pw is blank
	}
	else
	{

		$Username = $_POST['Username'];  //Sets the username
		$Password = $_POST['Password'];  //Sets the password

		// (Below) Initiate connection to system database
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Username = stripslashes($Username); //Sanatize user input
		$Password = stripslashes($Password);
		$Username = mysql_real_escape_string($Username);
		$Password = mysql_real_escape_string($Password);
		$DB = mysql_select_db("team04", $ServerConnection);
		$query = mysql_query("select * from Cadet where Password='$Password' AND Username='$Username'", $ServerConnection);
		$fname = mysql_query("select Fname from Cadet where Username='$Username'", $ServerConnection);
		$fnameresult = mysql_fetch_array($fname);
		$lname = mysql_query("select Lname from Cadet where Username='$Username'", $ServerConnection);
		$lnameresult = mysql_fetch_array($lname);
		$array = mysql_fetch_array($query);
		$rows = mysql_num_rows($query);
		$Password_From_DB = $array['Password'];
		$length = strlen($Password);
		
		// Relocate to the User Homepage
		if ($rows == 1)
		{
			$Password_From_DB = $array['Password'];
			$check = strcmp($Password, $Password_From_DB); 
			//echo $check;
			if($check == 0)
			{
				$_SESSION["loggedon"] = true;
				$_SESSION['login_user']=$_POST['Username'];
				$_SESSION['first_name'] = $fnameresult[0];
				$_SESSION['last_name'] =$lnameresult[0];
				$error = "You Did it";
				header("location: UserHomepage.php");
			}
			else
		{

			$error = "Username or Password is invalid";
		}
			



		}
		// Declare login error
		else
		{

			$error = "Username or Password is invalid";
		}
		mysql_close($ServerConnection);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------

	if(isset($_POST['sendAdmin'])) // If the send button is clicked (User)
	// Declare the textfields as blank
	if (empty($_POST['UsernameAdmin']) || empty($_POST['PasswordAdmin']))
	{
		$error = "Username or Password is Blank";

	}
	else
	{
		$Username = $_POST['UsernameAdmin']; //Sets the username
		$Password = $_POST['PasswordAdmin']; //Sets the password

		// (Below) Initiate connection to system database
		$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
		$Username = stripslashes($Username);
		$Password = stripslashes($Password);
		$Username = mysql_real_escape_string($Username);
		$Password = mysql_real_escape_string($Password);
		$DB = mysql_select_db("team04", $ServerConnection);
		$query = mysql_query("select * from Admin where Password='$Password' AND Username='$Username'", $ServerConnection);
		$fname = mysql_query("select Rank from Admin where Username='$Username'", $ServerConnection);
		$fnameresult = mysql_fetch_array($fname);
		$lname = mysql_query("select Lname from Admin where Username='$Username'", $ServerConnection);
		$lnameresult = mysql_fetch_array($lname);
		$rows = mysql_num_rows($query);
		
		// Relocate to the Admin Homepage
		if ($rows == 1)
		{

			$_SESSION["loggedon"] = true;
			$_SESSION['login_user']=$_POST['UsernameAdmin'];
			$_SESSION['last_name'] = $fnameresult[0];
			$_SESSION['first_name'] = $lnameresult[0];
			$error = "You Did it";
			header("location: AdminHomepage.php");


		}
		// Declare login error
		else
		{
			$error = "Username or Password is invalid";
		}
		mysql_close($ServerConnection);
	}
?>
