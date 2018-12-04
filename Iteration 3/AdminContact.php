<!-- AdminContact

Used to login as an Admin and have access to all admin pages.

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();
//include('session.php');
include('logout.php'); // Include the following PHP codes
include('login.php');

if(!isset($_SESSION["loggedon"]) || $_SESSION["loggedon"] !== true || $_SESSION['login_user'] !== "Admin")
{
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<header>
  <h1 class="logo"><?php echo $_SESSION['last_name'] ?>, <?php echo $_SESSION['first_name'] ?></h1>

  <nav>
    <form action="" method="post">
      <ul>
        <li><a id="txt"></a></li>
        <a id="link" href="https://www.goarmyed.com/cadet/" type="topLink2">Go Army ED</a>
        <a id="link" href="https://www.radford.edu/content/radfordcore/home.html" type="topLink" >Radford Homepage</a>
      </ul>
    </nav>
  </label>
  <link rel="stylesheet" type="text/css" .css = "text/css" href="webpage.css">
</header>
<body onload="startTime()">
  <script src="timeJavaScript.js"></script>

  <div class="title">
    <label>Valor Inventory Management System</label>

  </div>

  <div class="sidenav">
    <a href="AdminHomepage.php" >Home</a>
    <a href="AdminCadetList.php" >Cadet List</a>
    <a href="AdminInventory.php" >Inventory</a>
    <a href="AdminNotification.php" >Notifications</a>
    <a class="active" href="AdminContact.php" >Contacts</a>
    <input name = "logout" type = "submit" value = " Logout ">


  </div>
  <!-- Content Code -->
  <div class="contents">
  <div class="welcome">

    <!-- Titles -->
    <h1>Contact Cadets</h1>

    <!-- PHP -->
    <?php

    // Connnect to server
    $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
    mysql_select_db("team04", $ServerConnection);
    $query = mysql_query("SELECT * FROM Cadet ORDER BY Cadet_Id ASC", $ServerConnection);

    // Display name and contact
    $rows = mysql_num_rows($query);
    echo "<div style='overflow: auto;'> ";
    echo "<table style='width:60%;' align='center'>";
    echo "<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Email</th>
    </tr>";

    // Obtain and display the information
    $i = 0;
    $array = "";
    for($x= 0; $x < $rows/2; $x++){
      $array = mysql_fetch_array($query);
      $i++;
      $email = '@radford.edu';
      echo  "<tr><td>" . $array['Lname'] . "</td><td>" . $array['Fname'] . "</td><td>" . $array['Username'].$email;
    }
    echo "</table>";
    echo "<table style='width:60%;' align='center'>";
    echo "<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Email</th>
    </tr>";
    for($x= $i; $x < $rows; $x++){
      $i++;
      $array = mysql_fetch_array($query);
      echo  "<tr><td>" . $array['Lname'] . "</td><td>" . $array['Fname'] . "</td><td>". $array['Username'].$email;
    }
    echo "</table>";

    // Finish
    mysql_close();
    echo "</div>";
    echo "<br>";

    echo "<input name = 'print' formaction='/~pklene/print_contacts.php' type = 'submit' value = 'Print Table'>";
    ?>
  </div>
</div>
</form>
</body>
</html>
