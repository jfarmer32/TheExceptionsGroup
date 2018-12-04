To insert new piece of gear into Gear table:
$sql = "INSERT INTO Gear(Gearname, Allowed, Issued, On_Hand) 
		VALUES ('$Gearname','$Allowed','$Issued','$On_Hand') ";

To insert new cadet into Cadet table:
$sql = "INSERT INTO Cadet(Username, Password, Issued, OnHand) 
		VALUES ('$Username','$Password','$Fname','$Lname') ";

To remove a cadet from the Cadet table:
$sql = "DELETE FROM Cadet
		WHERE Username = '$Username'";

To remove a piece of gear from the Gear Table:
$sql = "DELETE FROM Gear
		WHERE Gearname = '$Gearname'";

To add an alert to the Alert table:
$sql = "INSERT INTO Alert(Username, Subject, Message) 
		VALUES ('$Username','$Subject','$Message') ";

To remove a single alert to the Alert table:
$sql = "DELETE FROM Alert
		WHERE Id = '$Id'";

To select First name and Last name of cadet user:
$sql = "SELECT Fname, Lname FROM Cadet WHERE Username = '$Username'";

To reset the column index value:
$sql = "ALTER TABLE Alert AUTO_INCREMENT = 1"