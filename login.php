<?php 
	
	//echo ($_POST['username'];
	$error = "";
	if(isset($_POST['send']))
	if (empty($_POST['username']) || empty($_POST['password']))
	{
		$error = "Username or Password is Blank";
		//echo("hey empty");
	}
	else
	{
		//echo("hey");
		$username = $_POST['username'];
		$password = $_POST['password'];
		/*
		if($username == "admin" && $password == "admin")
		{
			echo file_get_contents("Landing Page.html");
		}
		else
		{
			if($username != "admin" && $password == "admin")
			{
				$error = "Username is Inccorect";
			}
			else if($password != "admin" && $username == "admin")
			{
				$error = "Password is Inccorect";
			}
			else
			{
				$error = "Username and Password is Incorrect";
			}
		}
		*/
		$SeverConnection = mysql_connect("localhost", "root", "");
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$DB = mysql_select_db("jfarmer32", $SeverConnection);
		$query = mysql_query("select * from demo_table where password='$password' AND username='$username'", $SeverConnection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) 
		{
			echo file_get_contents("Landing Page.html");
			//$_SESSION['login_user']=$username; // Initializing Session
			//header("location: profile.php"); // Redirecting To Other Page
		}
		else 
		{
			$error = "Username or Password is invalid";
		}
		mysql_close($connection); // Closing Connection
	}	
?>