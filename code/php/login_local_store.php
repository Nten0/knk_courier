<?php
session_start();

/*if($_SESSION['login_store']){
}else{
	header("location: index.php");
}*/

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

$servername = "localhost";
$username = "root";
$password = "root";
$db = "project";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$utf8 = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($conn,$utf8);
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

      $sql = "SELECT Name FROM TransitHub WHERE ID = (SELECT TransitHubID FROM Store WHERE ID = (SELECT Store FROM AssistantStore WHERE Username = '$username'))";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active2 = $row2['Name'];
     // echo $active2;


      $sql = "SELECT City FROM Store WHERE ID = (SELECT Store FROM AssistantStore WHERE Username = '$username')";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active3 = $row2['City'];
     // echo $active3;
      $_SESSION['current_city'] = $active3;

        $sql = "SELECT Name FROM Store WHERE ID = (SELECT Store FROM AssistantStore WHERE Username = '$username')";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active4 = $row2['Name'];
     // echo $active3;
      $_SESSION['store_name'] = $active4;


      $sql = "SELECT * FROM AssistantStore WHERE Username = '$username' AND Password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      //echo $active;

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count >= 1) 
      {
         $_SESSION['login_store'] = $username;
        
         $_SESSION['location'] = $active2;
        
          echo "Success";
      }
      else 
      {
      	//print '<script>alert("Incorrect Credentials");</script>';
         echo "Error";
      }
}
?>