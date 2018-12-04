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
  <title>View Cadet Gear</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css">

  <style>
  html,body {
    background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url("Digital_Camo_Background.jpg");
  }

  input[type = submit]{
    margin-right: 130px;
    background-color: #003C71;
  }
  a[type = pass]{
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
<body>
  <br></br>
  <div class="topWorkBox" align="center">
    <h2 style = "font-style: bold;" align="left">Individual Cadet Inventory</h2>
  </div>
  <div class="workBox" align="left" style = "overflow: auto; height: 80%;">
    <form action="" method="post">
      <br><br>
      <select name="username" align = "center">
        <?php
        $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
        mysql_select_db("team04", $ServerConnection);
        $query = mysql_query("SELECT Username FROM Cadet", $ServerConnection);

        while($array = mysql_fetch_array($query)){
          $usernameunder = $array['Username'];
          $fname = mysql_query("select Fname from Cadet where Username='$usernameunder'", $ServerConnection);
          $fnameresult = mysql_fetch_array($fname);
          $lname = mysql_query("select Lname from Cadet where Username='$usernameunder'", $ServerConnection);
          $lnameresult = mysql_fetch_array($lname);
          $first_name = $fnameresult[0];
          $last_name =$lnameresult[0];
          $name = $last_name . ", " . $first_name;
          //$usernameread = preg_replace("/_/"," ", $usernameunder);
          echo "<option value = '$usernameunder'>$name</option>";
        }
        ?>
      </select>
      <br>
      <h3><input name = "submit" type = "submit" value = "View Cadet"></h3><br>
      <input name = 'view'  type = 'submit' value = 'View their Discrepcies'>
      <a href="AdminCadetList.php"  type="pass">Return</a><br>
    </form>
    <?php

    $error = "";
    if(isset($_POST['submit']))
    {
      $Username = $_POST['username'];
	$Username = stripslashes($Username );
	$Username = mysql_real_escape_string($Username);
      $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

      $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
      $query = mysqli_query($ServerConnection, $sql);
      $col = "SHOW COLUMNS FROM Cadet_Gear";
      $colQuery = mysqli_query($ServerConnection, $col);
      $rowcount = mysqli_num_rows($colQuery);
      $array = mysqli_fetch_array($query, MYSQLI_NUM);

      echo "<div>";
      echo "<table style='width:auto;' align='center'>";
      echo "<tr>
      <th>GearName</th>
      <th>Ammount</th>
      </tr>";

      for($i = 0;$i < $rowcount; $i++)
      {
        $fieldinfo = mysqli_fetch_field($query);
        $gearname = $fieldinfo->name;
        $gearnameread = preg_replace("/_/"," ", $gearname);
        echo "<tr><td>" . $gearnameread . "</td><td>" . $array[$i] . "</td></tr>";
      }

      $error = "Unable to view Cadet gear for $Username";
      mysqli_close($ServerConnection);
      echo "</table>";

      echo "<form method='POST' action='admin_print_cadet_gear.php'>";
      echo "<input name = 'admin_print_cadet_gear' type = 'submit' value = 'Print Table'>";
      echo "<input type = 'text' value='$Username' name='username2' style='visibility: hidden'>";
      echo "</form>";
    }
    // echo "<h3><center> $error</center></h3>"

    ?>


    <?php
    if(isset($_POST['view']))
    {
      $ServerConnection = mysql_connect("localhost", "team04", "Team04!");
      mysql_select_db("team04", $ServerConnection);
      $query = mysql_query("SELECT Username FROM Cadet", $ServerConnection);


      $usernameunder = $_POST['username'];
      $fname = mysql_query("select Fname from Cadet where Username='$usernameunder'", $ServerConnection);
      $fnameresult = mysql_fetch_array($fname);
      $lname = mysql_query("select Lname from Cadet where Username='$usernameunder'", $ServerConnection);
      $lnameresult = mysql_fetch_array($lname);
      $first_name = $fnameresult[0];
      $last_name =$lnameresult[0];
      $name = $last_name . ", " . $first_name;
      $Username = $_POST['username'];
      $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");

      $sql = "SELECT * FROM Cadet_Gear WHERE Username = '$Username'";
      $query = mysqli_query($ServerConnection, $sql);
      $col = "SHOW COLUMNS FROM Cadet_Gear";
      $colQuery = mysqli_query($ServerConnection, $col);
      $rowcount = mysqli_num_rows($colQuery);
      $array = mysqli_fetch_array($query, MYSQLI_NUM);

      echo "<div>";
      echo "<table style='width:auto;' align='center'>";
      echo "<tr>
      <th>GearName</th>
      <th>Needed or Surplus</th>
      </tr>";

      echo "<tr><td> Cadet </td><td>" . $name. "</td></tr>";
      for($i = 0;$i < $rowcount; $i++)
      {
        $fieldinfo = mysqli_fetch_field($query);
        if($i >= 3)
        {
          $gearname = $fieldinfo->name;
          $sql2 = sprintf("SELECT Allowed FROM Gear WHERE Gearname = '%s'",$gearname);
          $query2 = mysqli_query($ServerConnection, $sql2);
          if (!mysqli_query($ServerConnection,$sql2))
          {
            echo("Error description: " . mysqli_error($ServerConnection));
          }
          $array2 = mysqli_fetch_array($query2, MYSQLI_NUM);
          //echo $array;
          //echo $array[$i];
          //echo $gearname;
          //echo $array2[0];
          $CadetGear = $array[$i];
          $Allowed = $array2[0];

          if($CadetGear !== $Allowed)
          {
            $needed = $Allowed - $CadetGear;

            $gearnameread = preg_replace("/_/"," ", $gearname);
            if($needed > 0)
            {
              echo "<tr><td>" . $gearnameread . "</td><td>They need " . $needed. " more</td></tr>";

            }
            else
            {
              $needed = $needed * -1;
              echo "<tr><td>" . $gearnameread . "</td><td>They have a Surplus of " . $needed. "</td></tr>";
            }


          }
        }
      }

      $error = "Unable to view Cadet gear for $Username";
      mysqli_close($ServerConnection);
      echo "</table>";

      echo "<form method='POST' action='admin_print_cadet_def.php'>";
      echo "<input name = 'admin_print_cadet_def' type = 'submit' value = 'Print Table'>";
      echo "<input type = 'text' value='$Username' name='username3' style='visibility: hidden'>";
      echo "</form>";
    }
    ?>
  </div>
</body>
</html>
