<?php 
if(isset($_POST['login'])) {
	
	$Username = $_POST['Username'];

	$conn = new mysqli('localhost', 'team04', 'Team04!', 'team04');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT Fname, Lname 
				FROM Cadet 
				WHERE Username = '$Username'";

	if ($conn->query($sql) === TRUE) {
    	echo "Record removed successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>