
<?php

session_start();

//if($_SERVER["REQUEST_METHOD"] == "POST") {
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

$qrcode = $_POST['myqr'];
//echo $qrcode;
$location = $_SESSION['location'];

$temp = "SELECT Locations FROM Package WHERE TrackingID='$qrcode'";
$result = mysqli_query($conn,$temp);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['Locations'];

$input = $active . "Hub " . $location . ",";

$sql = "UPDATE Package SET Locations='$input' WHERE TrackingID='$qrcode'";
mysqli_query($conn,$sql);

/*if(mysqli_query($conn, $sql)) {
	echo "Records updated successfully.";
    //header("location: index.php");
} else{
	echo "Διπλότυπο QR code";
}*/

$sql = "SELECT Route FROM Package WHERE TrackingID='$qrcode'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['Route'];
echo $active;

mysqli_close($conn);
?>
