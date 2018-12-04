<!-- AddAThing
   
     Used to add gear into the mySql database.

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php 
// Add is called
if(isset($_POST['add'])) {
	
	$Gearname = $_POST['gn'];
	$Allowed = $_POST['a'];
	$Issued = $_POST['i'];
	$OnHand = $_POST['o'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	// Connection Error
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO Gear(Gearname, Allowed, Issued, OnHand) 
						VALUES ('$Gearname','$Allowed','$Issued','$OnHand') ";

	// Connection Working
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>