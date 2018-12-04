<?php 
if(isset($_POST['addAlert'])) {
	
	$Id = $_POST['Id'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "DELETE FROM Alert
				WHERE Id = '$Id'";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>