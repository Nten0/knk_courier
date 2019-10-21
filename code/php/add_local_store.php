<?php

    session_start();
    if($_SESSION['login_admin'])
    {}
    else
    {
        header("location:../index.php");
    }
    $ID = $Name = $Address = $AddressNum = $City = $TK = $PhoneNum = $Longitude = $Latitude = $TransitHubID = "";
    $IDErr = $NameErr = $AddressErr = $AddressNumErr = $CityErr = $TKErr = $PhoneNumErr = $LongitudeErr = $LatitudeErr = $TransitHubIDErr = $GenErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
         mysqli_query($link,$sql) or die('No charset in Database');

        // Escape user inputs for security
        $ID = mysqli_real_escape_string($link, $_REQUEST['ID']);
        $Name = mysqli_real_escape_string($link, $_REQUEST['Name']);
        $Address = mysqli_real_escape_string($link, $_REQUEST['Address']);
        $AddressNum = mysqli_real_escape_string($link, $_REQUEST['AddressNum']);
        $City = mysqli_real_escape_string($link, $_REQUEST['City']);
        $TK = mysqli_real_escape_string($link, $_REQUEST['TK']);
        $PhoneNum = mysqli_real_escape_string($link, $_REQUEST['PhoneNum']);
        $Longitude = mysqli_real_escape_string($link, $_REQUEST['Longitude']);
        $Latitude = mysqli_real_escape_string($link, $_REQUEST['Latitude']);
        $TransitHubID = mysqli_real_escape_string($link, $_REQUEST['TransitHubID']);

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
        if ($IDErr == "" && $NameErr == "" && $AddressErr == "" && $CityErr == "" && $TKErr == "" && $LongitudeErr == "" && $LatitudeErr == "" && $TransitHubIDErr == ""){
            $mysql = "INSERT INTO Store (ID, Name, Address, AddressNum, City, TK, PhoneNum, Longitude, Latitude, TransitHubID) VALUES ('$ID', '$Name', '$Address', '$AddressNum', '$City', '$TK', '$PhoneNum', '$Longitude', '$Latitude', '$TransitHubID')";
        
        

            if(mysqli_query($link, $mysql)){// && $IDErr == "" && $NameErr == "" && $AddressErr == "" && $CityErr == "" && $TKErr == "" && $LongitudeErr == "" && $LatitudeErr == "" && $TransitHubIDErr == ""){
                echo "Records added successfully.";
                header("location: ../admin_local_store.php");
            } else{  
         
               
                        $GenErr = "Διπλότυπο ID ή Λάθος TransitHubID";
                
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
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
                        <h2>Δημιουργία Τοπικού Καταστήματος</h2>
                    </div>
                    <p>Δώσε τα ακόλουθα στοιχεία</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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


                        <div class="form-group <?php echo (!empty($GenErr)) ? 'has-error' : ''; ?>">
                            <span class="help-block"><?php echo $GenErr;?></span>
                        </div>



                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin_local_store.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html> 