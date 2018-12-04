<!-- Edit.php

     Used to edit data in the System

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
	// Edit is called
	if(isset($_POST['edit']))
		{
			session_start(); // Start Session
			$_Session['selected1'] = $_POST['chkbox']; // box 1
			$_Session['selected2'] = $_POST['chkbox2']; // box 2
			header('location: edit_select.php'); // go to edit select
		}
?>

    
