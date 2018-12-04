<!-- add_new_cadet.php

     Adds a new cadet to the system

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
    session_start();
	//include('session.php');
	include('logout.php');
	include('login.php');

	if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true)
	{
    header("location: index.php");
	}
?>
<html>
<head>
<title>Add New Cadet</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css"> <!-- StyleSheet CSS -->
<style>
html,body { /* <---- HTML Body */
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }

input[type = submit]{ /* <---- Submit Input */
    margin-right: 130px;
    background-color: #003C71;
}
a[type = pass]{ /* <---- pass 'a' */
  padding-left: 170px;
}
h2{ /* <---- Header 2 */
	background-color:  #003C71;
	padding-left: 30px;
	align: left;
	font-family: 'PT Sans Narrow', sans-serif;
}
</style>
</head>
<div class="bg"></div>
<br></br>
<br></br>
<h1><center></center></h1>
<br></br>

<!-- TopLogin code -->
<div class="topWorkBox" align="center">
	<h2 style = "font-style: bold;" align="left">Add New Cadet</h2>
</div>

<!-- Login code -->
<div class="workBox" align="left">
 <form action="" method="post">
	<br><br>

  <!-- Fname input -->
  <input name="Fname" type="text" placeholder="First Name" id="Username">
	<br>

  <!-- Lname input -->
  <input name="Lname" type="text" placeholder="Last Name"  id="Username" >
  <br>

  <!-- Login code -->
  <div class="tooltip">

  <!-- Username input -->
  <input name="Username" type="text" placeholder="Username"  id="Username" >

  <!-- tooltiptext code -->
  <span class="tooltiptext">Notice: Username is all lowercase and is the first letter of user's first name attached to user's last name. Example: zfennell</span>
  </div>
  <br>
    <h3><input name = "submit" type = "submit" value = "Add New Cadet"></h3><br>
	  <a href="AdminCadetList.php"  type="pass">Return</a><br>
	</form>

	<?php
	$error = "";

	// When Submit is called
	if(isset($_POST['submit']))
		{

			$Fname = $_POST['Fname'];
			$Lname = $_POST['Lname'];
			$Username = $_POST['Username'];
      $Password = "Password123!";
			$ServerConnection = mysql_connect("localhost", "team04", "Team04!");
			$Fname = stripslashes($Fname);
			$Fname = mysql_real_escape_string($Fname);
			$Lname = stripslashes($Lname);
			$Lname = mysql_real_escape_string($Lname);
			$Username = stripslashes($Username);
			$Username = mysql_real_escape_string($Username);
			$DB = mysql_select_db("team04", $ServerConnection);
			mysql_query("INSERT INTO Cadet(Username, Fname, Lname,Password) VALUES ('$Username','$Fname','$Lname','$Password')", $ServerConnection);
      mysql_query("INSERT INTO Cadet_Gear(Username) VALUES ('$Username')", $ServerConnection);
      $error = "Added Cadet $Username";
			mysql_close($connection);
		}
		// Call error
		echo "<h3><center> $error</center></h3>"
	?>
</div>
</body>
</html>
