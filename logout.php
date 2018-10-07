<?php
	session_start();
	if(session_destroy()) 
	{
		echo file_get_contents("index.php");
	}
?>