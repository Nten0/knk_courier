<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$db = "project";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$utf8 = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
$conn->query($utf8);

$sql = "SELECT City FROM Store";
$result = $conn->query($sql);
//echo $result;

if ($result->num_rows > 0) {
    $i=0;
    $city=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $city[$i]=$row["City"];
        $i++;
    }
} else {
    echo "0 results";
}

/*foreach ($city as $value) {
    echo $value . "<br>";
}*/

//echo json_encode($city);


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($city as $value) {
        if (stristr($q, substr($value, 0, $len))) {
            if ($hint === "") {
                $hint = $value;
            } else {
                $hint .= ", $value";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;

$conn->close();

?>
 