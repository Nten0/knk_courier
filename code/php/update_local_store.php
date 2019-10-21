<?php

    session_start();
    if($_SESSION['login_admin'])
    {}
    else
    {
        header("location:index.php");
    }

    //$Username = $Password = $HubID = "";
    $UsernameErr = $PasswordErr = $HubIDErr = $GenErr = "";


if (isset($_GET["ID"]))
{
    $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
        mysqli_query($link,$sql) or die('No charset in Database');

        $ID = $_GET['ID'];
        $mysql = "SELECT * FROM Store WHERE ID='".$ID."'";

   

                    if($result = mysqli_query($link, $mysql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                            $ID=$row['ID'];
                            $Name=$row['Name'];
                            $Address=$row['Address'];
                            $AddressNum=$row['AddressNum'];
                            $City=$row['City'];
                            $TK=$row['TK'];
                            $PhoneNum=$row['PhoneNum'];
                            $Longitude=$row['Longitude'];
                            $Latitude=$row['Latitude'];
                            $TransitHubID=$row['TransitHubID'];
                        }
                        }

}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
 



        mysqli_query($link,$sql) or die('No charset in Database');

        // Escape user inputs for security
        $ID = mysqli_real_escape_string($link, $_POST['ID']);
        $Name = mysqli_real_escape_string($link, $_POST['Name']);
        $Address = mysqli_real_escape_string($link, $_POST['Address']);
        $AddressNum = mysqli_real_escape_string($link, $_POST['AddressNum']);
        $City = mysqli_real_escape_string($link, $_POST['City']);
        $TK = mysqli_real_escape_string($link, $_POST['TK']);
        $PhoneNum = mysqli_real_escape_string($link, $_POST['PhoneNum']);
        $Longitude = mysqli_real_escape_string($link, $_POST['Longitude']);
        $Latitude = mysqli_real_escape_string($link, $_POST['Latitude']);
        $TransitHubID = mysqli_real_escape_string($link, $_POST['TransitHubID']);

        if (empty($_POST["ID"])) {
            $IDErr = "ID is required";
        }
        if (empty($_POST["Name"])) {
            $NameErr = "Name is required";
        }
        if (empty($_POST["Address"])) {
            $AddressErr = "Address is required";
        }
        if (empty($_POST["City"])) {
            $CityErr = "City is required";
        }
        if (empty($_POST["TK"])) {
            $TKErr = "TK is required";
        }
        if (empty($_POST["Longitude"])) {
            $LongitudeErr = "Longitude is required";
        }
        if (empty($_POST["Latitude"])) {
            $LatitudeErr = "Latitude is required";
        }
        if (empty($_POST["TransitHubID"])) {
            $TransitHubIDErr = "TransitHubID is required";
        }
        // attempt insert query execution
        //$mysql = "UPDATE AssistantHub SET Password='".$Password.", HubID='".$HubID." WHERE Username='".$Username."";
        if ($NameErr == "" && $AddressErr == "" && $CityErr == "" && $TKErr == "" && $LongitudeErr == "" && $LatitudeErr == "" && $TransitHubIDErr == ""){
        $mysql = "UPDATE Store SET Name='$_POST[Name]', Address='$_POST[Address]', AddressNum='$_POST[AddressNum]', City='$_POST[City]', TK='$_POST[TK]', PhoneNum='$_POST[PhoneNum]', Longitude='$_POST[Longitude]', Latitude='$_POST[Latitude]', TransitHubID='$_POST[TransitHubID]' WHERE ID='".$ID."'";
        //$mysql = "INSERT INTO AssistantHub (Username, Password, HubID) VALUES ('$Username', '$Password', '$HubID')";


        if(mysqli_query($link, $mysql)){
            echo "Records updated successfully.";
            header("location: ../admin_local_store.php");
        } else{  
         
                        $GenErr = "Διπλότυπο Username ή Λάθος HubID";
                    
        }      
    }
}
    // close connection
    mysqli_close($link);
?>




 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ενημέρωση Τοπικού Καταστήματος</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 580px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Ενημέρωση Τοπικού Καταστήματος</h2>
                    </div>
                    <p>Εισάγετε τις νέες τιμές</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="alert alert-danger fade in">
                         <input type="hidden" name="ID" value="<?php echo trim($_GET["ID"]); ?>"/>


                        <div class="form-group <?php echo (!empty($IDErr)) ? 'has-error' : ''; ?>">
                            <label>ID</label>
                            <input type="text" name="ID" class="form-control" value="<?php echo $ID; ?>">
                            <span class="help-block"><?php echo $IDErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($NameErr)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
                            <span class="help-block"><?php echo $NameErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($AddressErr)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="Address" class="form-control" value="<?php echo $Address; ?>">
                            <span class="help-block"><?php echo $AddressErr;?></span>
                        </div>
                        <div class="form-group <?php //echo (!empty($AddrNumErr)) ? 'has-error' : ''; ?>">
                            <label>AddressNum</label>
                            <input type="text" name="AddressNum" class="form-control" value="<?php echo $AddressNum; ?>">
                            <span class="help-block"><?php //echo $AddrNumErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CityErr)) ? 'has-error' : ''; ?>">
                            <label>City</label>
                            <input type="text" name="City" class="form-control" value="<?php echo $City; ?>">
                            <span class="help-block"><?php echo $CityErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TKErr)) ? 'has-error' : ''; ?>">
                            <label>TK</label>
                            <input type="text" name="TK" class="form-control" value="<?php echo $TK; ?>">
                            <span class="help-block"><?php echo $TKErr;?></span>
                        </div>
                        <div class="form-group <?php //echo (!empty($PhoneNumErr)) ? 'has-error' : ''; ?>">
                            <label>PhoneNum</label>
                            <input type="text" name="PhoneNum" class="form-control" value="<?php echo $PhoneNum; ?>">
                            <span class="help-block"><?php //echo $PhoneNumErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($LongitudeErr)) ? 'has-error' : ''; ?>">
                            <label>Longitude</label>
                            <input type="text" name="Longitude" class="form-control" value="<?php echo $Longitude; ?>">
                            <span class="help-block"><?php echo $LongitudeErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($LatitudeErr)) ? 'has-error' : ''; ?>">
                            <label>Latitude</label>
                            <input type="text" name="Latitude" class="form-control" value="<?php echo $Latitude; ?>">
                            <span class="help-block"><?php echo $LatitudeErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($TransitHubIDErr)) ? 'has-error' : ''; ?>">
                            <label>TransitHubID</label>
                            <input type="text" name="TransitHubID" class="form-control" value="<?php echo $TransitHubID; ?>">
                            <span class="help-block"><?php echo $TransitHubIDErr;?></span>
                        </div> 

                        <input type="hidden" name="ID" value="<?php echo $ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../admin_local_store.php" class="btn btn-default">Cancel</a>
                    </div>

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>