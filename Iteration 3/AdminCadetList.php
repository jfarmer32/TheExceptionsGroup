<!-- AdminCadetList

Used to access the Cadet List.

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
session_start();
//include('session.php');
include('logout.php');
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
  <li><a href="AdminHomepage.php" >Home</a></li>
  <li><a class="active" href="AdminCadetList.php" >Cadet List</a></li>
  <li><a href="AdminInventory.php" >Inventory</a></li>
  <li><a href="AdminNotification.php" >Notifications</a></li>
  <li><a href="AdminContact.php" >Contacts</a></li>
  <input name = "logout" type = "submit" value = " Logout " style="margin-top:0px">

</div>
  <div class="contents">
    <div class="welcome">
      <h1>Valor Inventory Management System</h1><br>
      <h2>Cadet List</h2>
      <?php
      $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
      mysql_select_db("team04", $ServerConnection);
      $query = mysql_query("SELECT * FROM Cadet ORDER BY Cadet_Id ASC", $ServerConnection);

      $rows = mysql_num_rows($query);
      echo "<div style='overflow: auto;'> ";
      echo "<table style='width:60%;' align='center'>";
      echo "<tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Username</th>
      <th>Password</th>
      </tr>";
      $i = 0;
      $array = "";

      // Display Cadet from Cadet List (User Page)
      for($x= 0; $x < $rows/2; $x++){
        $array = mysql_fetch_array($query);
        $i++;
        echo  "<tr><td>" . $array['Lname'] . "</td><td>" . $array['Fname'] . "</td><td>" . $array['Username'] . "</td><td>" . $array['Password'] . "</td><td><input type='checkbox' name='chkbox[]' value= " . $array['Cadet_Id'] . " ></td></tr>";
      }
      echo "</table>";
      echo "<table style='width:60%;' align='center'>";
      echo "<tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Username</th>
      <th>Password</th>
      </tr>";

      // Display Cadet from Cadet List (Admin Page)
      for($x= $i; $x < $rows; $x++){
        $i++;
        $array = mysql_fetch_array($query);
        echo  "<tr><td>" . $array['Lname'] . "</td><td>" . $array['Fname'] . "</td><td>" . $array['Username'] . "</td><td>" . $array['Password'] . "</td><td><input type='checkbox' name='chkbox2[]' value= " . $array['Cadet_Id'] . "></td></tr>";
      }
      echo "</table>";
      mysql_close();
      echo "</div>";
      echo "<br>";
      echo "<div style='margin-bottom:2%;margin-top:2%'>";
      echo "<input align='right' name = 'delete' type = 'submit' value = 'Delete Selected Cadet'>";
      echo "<input name = 'print' formaction='/~pklene/print_cadets.php' type = 'submit' value = 'Print Table'>";
      echo "<input name = 'edit' formaction='/~pklene/view_or_edit_cadet_gear.php' type = 'submit' value = 'View Cadet Gear'>";
      echo "</div>";
      echo "<input name = 'add' formaction='/~pklene/add_new_cadet.php' type = 'submit' value = 'Add New Cadet'>";
      echo "<input name = 'reset' type = 'submit' value = 'Reset Cadet Password'>";
      echo "<input name = 'edit_cadet_gear' formaction='/~pklene/edit_cadet.php' type = 'submit' value = 'Edit Cadet'>";

      // When Delete is Called
      if(isset($_POST['delete']))
      {

        $cnt=array();
        $cnt=count($_POST['chkbox']);

        for($i=0;$i<$cnt;$i++)
        {
          $del_id=$_POST['chkbox'][$i];
          $user = mysql_query("SELECT Username FROM Cadet WHERE Cadet_Id=$del_id", $ServerConnection);
          $usertemp = mysql_fetch_array($user);
          $username = $usertemp['Username'];
          echo ($del_id);
          echo ($username);
          //mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
          mysql_query("DELETE FROM Cadet WHERE Username='$username'", $ServerConnection);
          mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);

        }
        $cnt2=array();
        $cnt2=count($_POST['chkbox2']);

        for($i=0;$i<$cnt2;$i++)
        {
          $del_id=$_POST['chkbox2'][$i];
          $user = mysql_query("SELECT Username FROM Cadet WHERE Cadet_Id=$del_id", $ServerConnection);
          $usertemp = mysql_fetch_array($user);
          $username = $usertemp['Username'];
          echo ($del_id);
          echo ($username);
          //mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
          mysql_query("DELETE FROM Cadet WHERE Username='$username'", $ServerConnection);
          mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);

        }

        header('Refresh:0');
        if(isset($_POST['add']))
        {
          header("location: index.php");
        }

        if(isset($_POST['edit'])) // <-------  NOT IN USE
        {
          /*
          $cnt=array();
          $cnt=count($_POST['chkbox']);

          for($i=0;$i<$cnt;$i++)
          {
            $view_id=$_POST['chkbox'][$i];
            $user = mysql_query("SELECT Username FROM Cadet WHERE Cadet_Id=$view_id", $ServerConnection);
            $usertemp = mysql_fetch_array($user);
            $username = $usertemp['Username'];
            echo ($view_id);
            echo ($username);
          }
          $cnt2=array();
          $cnt2=count($_POST['chkbox2']);

          for($i=0;$i<$cnt2;$i++)
          {
            $view_id=$_POST['chkbox2'][$i];
            $user = mysql_query("SELECT * FROM Cadet_Gear WHERE Cadet_Id=$view_id", $ServerConnection);
            $usertemp = mysql_fetch_array($user);
            $username = $usertemp['Username'];
            echo ($view_id);
            echo ($username);
            //mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
            mysql_query("DELETE FROM Cadet WHERE Username='$username'", $ServerConnection);
          }

          $query = mysql_query("SELECT * FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
          $colQuery = mysql_query("SHOW COLUMNS FROM Cadet_Gear", $ServerConnection);

          $rows = mysql_num_rows($query);
          echo "<div style='overflow: auto;'> ";
          echo "<table style='width:50%;' align='center'>";
          echo "<tr>
          <th>Gearname</th>
          </tr>";
          for($x= $i; $x < $rows; $x++)
          {
            $i++;
            $colArray = mysql_fetch_array($colQuery);
            echo  "<tr><td>" . $colArray['Field'] . "></td></tr>";
          }
          echo "</table>";
          mysql_close();
          echo "</div>";
          */
        }
      }

      // When reset is called
      if(isset($_POST['reset'])){
        $cnt=array();
        $cnt=count($_POST['chkbox']);

                for($i=0;$i<$cnt;$i++)
                {
                  $del_id=$_POST['chkbox'][$i];
                  $user = mysql_query("SELECT Username FROM Cadet WHERE Cadet_Id=$del_id", $ServerConnection);
                  $usertemp = mysql_fetch_array($user);
                  $username = $usertemp['Username'];
                  echo ($del_id);
                  echo ($username);
                  //mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
                  mysql_query("UPDATE Cadet set Password = 'Password123!' WHERE Username='$username'", $ServerConnection);

                }
                $cnt2=array();
                $cnt2=count($_POST['chkbox2']);

                for($i=0;$i<$cnt2;$i++)
                {
                  $del_id=$_POST['chkbox2'][$i];
                  $user = mysql_query("SELECT Username FROM Cadet WHERE Cadet_Id=$del_id", $ServerConnection);
                  $usertemp = mysql_fetch_array($user);
                  $username = $usertemp['Username'];
                  echo ($del_id);
                  echo ($username);
                  //mysql_query("DELETE FROM Cadet_Gear WHERE Username='$username'", $ServerConnection);
                  mysql_query("UPDATE Cadet set Password = 'Password123!' WHERE Username='$username'", $ServerConnection);
                }
      }
      ?>
    </div>
  </div>
</form>
</body>
</html>
