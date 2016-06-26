<html>
 <head>
    <title>Show Alerts</title>
    <meta http-equiv="refresh" content="10"; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="formstyle.css">
 </head>
 <body>
    <h1>Bullying Alerts</h1>
	<br><br>
	<?php
		require_once("mysql_connect.php");
     
		if(mysqli_connect_errno()){
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$LOCS = array("Collabitat First Floor Left Wing", "Collabitat First Floor TV Place");
		
		$query = "SELECT * FROM BULLY_ALERTS ORDER BY ID DESC";
	
	    //Open the table and its first row
		echo "<table>";
		
		if ( !($sth = $dbc->query($query))) {
			die('<p>Error reading database</p></body></html>');
		} else {
			for ($i = 0; $i < mysqli_num_rows($sth) ; $i++ ) {
				$result=mysqli_fetch_array($sth);
				$time = $result['CreatedTime'];
				
				$image = $result['Picture'];
				
				$deviceID = $result['DeviceID'] - 1;
				
				$location = $LOCS[$deviceID];
				
				echo "<tr><td>$location</td><td>$time</td>";
				
				if($image !== "BullyImages/")
				{
					echo "<td><img width='250px' height='250px' src='$image'/></td>";
				}
				else{
					echo "<td>No picture</td>";
				}
                echo "</tr>";
			}
			
        //Close the table row and the table
        echo "</table>";
		}
	?>
 </body>
</html>