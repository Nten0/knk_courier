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
            
      $destination = $_POST['city'];
      $username=$_SESSION['login_store'] ;
     
      $sql = "SELECT City FROM Store WHERE ID = (SELECT Store FROM AssistantStore WHERE Username = '$username')";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $active3 = $row2['City'];

      $from = $active3;

      $sql = "SELECT Abbreviation FROM StoreAbbr WHERE City = '".$from."'";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $from_abbr = $row2['Abbreviation'];



      $sql = "SELECT Abbreviation FROM StoreAbbr WHERE City = '".$destination."'";
      $location = mysqli_query($conn,$sql);
      $row2 = mysqli_fetch_array($location,MYSQLI_ASSOC);
      $destination_abbr = $row2['Abbreviation'];
         if($destination_abbr=="")
      {
      	$destination_abbr ="NS";
      }

      $tod = getdate(date("U"));
      $tracknumber = $from_abbr.$tod[0].$destination_abbr;
      //echo $from;
      //echo $destination;
      echo $tracknumber;
      $_SESSION['tracknumber'] = $tracknumber;
}
?>