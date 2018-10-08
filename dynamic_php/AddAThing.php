<?php 
if(isset($_POST['add'])) {
	
	$gearname = $_POST['gn'];
	$allowed = $_POST['a'];
	$issued = $_POST['i'];
	$onhand = $_POST['o'];
	
	$conn = new mysqli('localhost', 'jfarmer32', 'Exceptions370', 'jfarmer32');
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO demo_gear(gearname, allowed, issued, onhand) 
						VALUES ('$gearname','$allowed','$issued','$onhand') ";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
$conn->close();
}
?>