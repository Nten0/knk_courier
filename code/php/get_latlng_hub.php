<?php

//echo $_POST['send'];

			$name = $_POST['hub_name'];
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
			 

			$sql = "SELECT * FROM TransitHub WHERE City = '".$name."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	$lat= $row["Latitude"];
			    	$lng= $row["Longitude"];

			    }
			} 

			$conn->close();	
			echo $lat;
			echo ",".$lng;	
				
			

?>
