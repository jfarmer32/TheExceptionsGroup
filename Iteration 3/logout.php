<!-- logout

     Used to log out of the system

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start(); // Creates a session for the user
if(isset($_POST['logout'])) // Destroying All Sessions
{
	session_destroy();
	session_unset();
	header("Location: index.php"); // Redirecting To Home Page
}
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // request 10 minates ago
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>