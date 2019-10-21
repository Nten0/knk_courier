<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {


$servername = "localhost";
$username = "root";
$password = "root";
$db = "project";



$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$utf8 = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($conn,$utf8);
      
     
      $username = $_POST['username'];
      $password = $_POST['password'];    

      
      $sql = "SELECT * FROM Admin WHERE Username = '$username' AND Password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
      
      if($count >= 1) 
      {
         $_SESSION['login_admin'] = $username;
         echo "Success";
      }
      else 
      {
      	echo "Error";
      }
}
?>

