<?php
	$SeverConnection = mysql_connect("localhost", "jfarmer32", "Exceptions370");
	$DB = mysql_select_db("jfarmer32", $SeverConnection);
	session_start();
	$username = $_SESSION['login_user'];
	$user_grab = mysql_query("select * from demo_table where username='$username'", $SeverConnection);
	$user = mysql_fetch_assoc($user_grab);
	$login_session = $user['username'];
	if(!isset($login_session))
	{
		mysql_close($SeverConnection); 
		header('Location: index.php'); 
	}
?>