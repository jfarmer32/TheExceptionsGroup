<?php
session_start();
if(isset($_POST['logout'])) // Destroying All Sessions
{
	session_destroy();
header("Location: index.php"); // Redirecting To Home Page
}
?>