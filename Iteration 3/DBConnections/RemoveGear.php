<?php 
if(isset($_POST['removeGear'])) {
	
	$Gearname = $_POST['Gearname'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "DELETE FROM Gear
				WHERE Gearname = '$Gearname'";

	if ($conn->query($sql) === TRUE) {
    	echo "Record removed successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>