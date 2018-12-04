<?php 
if(isset($_POST['addGear'])) {
	
	$Gearname = $_POST['Gearname'];
	$Allowed = $_POST['Allowed'];
	$Issued = $_POST['Issued'];
	$On_Hand = $_POST['On_Hand'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO Gear(Gearname, Allowed, Issued, On_Hand) 
				VALUES ('$Gearname','$Allowed','$Issued','$On_Hand') ";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>