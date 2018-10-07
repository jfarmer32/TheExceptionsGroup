<?php 
	
	session_start(); 
	$error = "";
	if(isset($_POST['send']))
	if (empty($_POST['username']) || empty($_POST['password']))
	{
		$error = "Username or Password is Blank";
		
	}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$SeverConnection = mysql_connect("localhost", "jfarmer32", "Exceptions370");
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$DB = mysql_select_db("jfarmer32", $SeverConnection);
		$query = mysql_query("select * from demo_table where password='$password' AND username='$username'", $SeverConnection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) 
		{
			echo file_get_contents("UserHomepage.html");
			$_SESSION['login_user']=$username; 
		}
		else 
		{
			$error = "Username or Password is invalid";
		}
		mysql_close($connection); 
	}	
?>
