<!-- Caculates Total amount of each gear issued
	 
     Get the total number of issued gear

     Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
    
    // Connect to server
    $ServerConnection = mysqli_connect("localhost", "team04", "Team04!", "team04");
    $sql = "SELECT * FROM Cadet_Gear";
    $query = mysqli_query($ServerConnection, $sql);
    $col = "SHOW COLUMNS FROM Cadet_Gear";
    $colQuery = mysqli_query($ServerConnection, $col);
    $rowcount = mysqli_num_rows($colQuery);
	
    // count the total issued gear
    for($i = 0;$i < $rowcount; $i++)
    {
	  $total = 0;
      $fieldinfo = mysqli_fetch_field($query);
      $gearname = $fieldinfo->name;
		  $sql2 = sprintf("SELECT %s FROM Cadet_Gear", $gearname);
		  $query2 = mysqli_query($ServerConnection, $sql2);
		  
		  // Display Error
		  if (!mysqli_query($ServerConnection,$sql2))
			  {
			  echo("Error description: " . mysqli_error($ServerConnection));
			  }
		  $rowcount2 = mysqli_num_rows($query2);

		  // Count
		  for($i2 = 0;$i2 < $rowcount2; $i2++)
		  {
				$array = mysqli_fetch_array($query2, MYSQLI_NUM);
			  $total = $total + $array[0]; 
		  }
		
		// Display total gear issued
		//echo $rowcount2;
	   $sql3 = "UPDATE Gear SET Issued ='$total' WHERE Gearname= '$gearname'";
	   $query3 = mysqli_query($ServerConnection, $sql3);
	  
    }
    mysqli_close($ServerConnection);
  
?>