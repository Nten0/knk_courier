<?php
session_start();
/*
if($_SESSION['login_hubuser']){
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

      $sql = "SELECT City FROM TransitHub WHERE ID = (SELECT HubID FROM AssistantHub WHERE Username = '$username')";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active2 = $row2['City'];

      $sql = "SELECT * FROM AssistantHub WHERE Username = '$username' AND Password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count >= 1) 
      {
         $_SESSION['login_hubuser'] = $username;
         //echo $_SESSION['login_hubuser'];
         $_SESSION['location'] = $active2;
         //echo $_SESSION['location'];
         //header("location: https://83.212.104.40/webqr/");
         echo "Success";

      }
      else 
      {
      	//print '<script>alert("Incorrect Credentials");</script>';
        echo "Error";
      }
}
?>