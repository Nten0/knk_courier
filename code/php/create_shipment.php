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

$trackingnumber = $_POST['tracking_number'];
$store = $_POST['final_id'];
$delivery_type = $_POST['delivery_type'];
$client = $_POST['username'];
$days = $_POST['days'];
$route = $_SESSION['route'];
//$min = $_SESSION['min'];
echo $route;
$today = date("Y-m-d");
$delivery_date_string = "+".$days." days";
$delivery_date = date("Y-m-d",strtotime($delivery_date_string));


if($delivery_type == "Standard")
{
      $delivery_type =0;
}
else
{
       $delivery_type =1;
}
      $assistant = $_SESSION['login_store'] ;
     // echo $assistant;
     

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
      $utf8 = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
      mysqli_query($conn,$utf8);

       $sql = "SELECT Name FROM Store WHERE ID = (SELECT Store FROM AssistantStore WHERE Username = '$assistant')";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active3 = $row2['Name'];
      //echo $active3;

      $from = $active3;
      //echo $from;
      $current_insert=$from.",";
            
     
    $sql = " INSERT INTO Package VALUES ('$trackingnumber','$store','$client',$delivery_type,0,'$today','$delivery_date','$current_insert','$route')";
    mysqli_query($conn,$sql);
      
}
?>