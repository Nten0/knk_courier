<?php

session_start();

			$track = $_POST['tracking_no'];

			//echo $track;
			$servername = "localhost";
			$dbusername = "root";
			$password = "root";
			$dbname = "project";
			$conn = new mysqli($servername, $dbusername, $password,$dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
			$result = $conn->query($sql);
			 

			$sql = "UPDATE Package SET Delivered = 1 WHERE TrackingID = '".$track."'";
			$result = $conn->query($sql);

			$temp = "SELECT Locations FROM Package WHERE TrackingID='".$track."'";
			$result = mysqli_query($conn,$temp);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$active = $row['Locations'];
			$location= $_SESSION['store_name'] ;

			$input = $active . $location . ",";

			$sql = "UPDATE Package SET Locations='$input' WHERE TrackingID='".$track."'";
			mysqli_query($conn,$sql);
		
			 
			$conn->close();	
			echo("OK");
			
				
			

?>
