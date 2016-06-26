<?php
	header('Content-Type: application/json');
  	require_once("mysql_connect.php");
     
	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	//GET user input from a web request
	$uid = $_POST['deviceid'];
	$distance = 300; 
	$timestamp = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
	$picture = null;

	$isImageAllowed = $_FILES['image'];
	$image_size = $_FILES['image']['size'];
	
	$folder = "BullyImages/";

	$picture = $folder.$_FILES['image']['name'];
	
	move_uploaded_file($_FILES['image']['tmp_name'] , $picture);
	
	$sql_stmt = "INSERT INTO BULLY_ALERTS (DeviceID, Distance, Picture, CreatedTime) VALUES ('$uid', '$distance', '$picture', '$timestamp')";
	
	if($dbc->query($sql_stmt) == TRUE){
		print "New alert is generated successfully";
	}
	else{
		echo "Oops. We are sorry! Error occurred";
	}	
	$dbc->close();
	/*
	$fields = array(
		'location' => '1',
		'number' => '7326407329'
	);

	$response = http_post_fields(":8080", $fields);
	print "$response";
	*/	
?>
