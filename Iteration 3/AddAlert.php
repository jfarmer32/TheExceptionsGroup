<!-- addAlert.php

     Used to add an alert to the system

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php 
// When Called
if(isset($_POST['addAlert'])) {
	
	$Id = $_POST['Id'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	// When connection fails
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "DELETE FROM Alert
				WHERE Id = '$Id'";

	// When record is created
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>