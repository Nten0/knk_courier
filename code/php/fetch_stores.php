  <?php
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

      $sql = "SELECT * FROM Store";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $store_array = array();
          while($row = $result->fetch_assoc())
          {
            array_push($store_array,[
            	'id' =>$row['ID'],
            	'name' => $row['Name'],
            	'address' =>$row["Address"],
            	'number'=> $row["AddressNum"],
           		'city' => $row["City"],
           		'TK' => $row["TK"],
           		'phone' => $row["PhoneNum"],
           		'long' => $row["Longitude"],
           		'lat' =>$row["Latitude"],
           		'hubID' =>$row["TransitHubID"]
            ]);
          }
      } 
      $someJSON=json_encode($store_array);
      echo $someJSON;
    ?>