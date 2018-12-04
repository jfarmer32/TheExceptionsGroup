<?php 
if(isset($_POST['addCadet'])) {
	
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	
	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO Cadet(Username, Password, Issued, OnHand) 
				VALUES ('$Username','$Password','$Fname','$Lname') ";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>