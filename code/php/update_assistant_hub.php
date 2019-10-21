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


if (isset($_GET["Username"]))
{
    $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
        mysqli_query($link,$sql) or die('No charset in Database');

        $Username = $_GET['Username'];
        $mysql = "SELECT * FROM AssistantHub WHERE Username='".$Username."'";

  

                    if($result = mysqli_query($link, $mysql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                            $Username=$row['Username'];
                            $Password=$row['Password'];
                            $HubID=$row['HubID'];}
                        }

}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
 



        mysqli_query($link,$sql) or die('No charset in Database');

        // Escape user inputs for security
        $Username = mysqli_real_escape_string($link, $_POST['Username']);
        $Password = mysqli_real_escape_string($link, $_POST['Password']);
        $HubID = mysqli_real_escape_string($link, $_POST['HubID']);

        if (empty($_POST["Username"])) {
            $UsernameErr = "Username is required";
        }

        if (empty($_POST["Password"])) {
            $PasswordErr = "Password is required";
        }

        if (empty($_POST["HubID"])) {
            $HubIDErr = "HubID is required";
        }


        if ($UsernameErr=="" && $PasswordErr == "" && $HubIDErr == ""){
        // attempt insert query execution
        //$mysql = "UPDATE AssistantHub SET Password='".$Password.", HubID='".$HubID." WHERE Username='".$Username."";
        $mysql = "UPDATE AssistantHub SET Password='$_POST[Password]', HubID='$_POST[HubID]' WHERE Username='".$Username."'";
        //$mysql = "INSERT INTO AssistantHub (Username, Password, HubID) VALUES ('$Username', '$Password', '$HubID')";

        if(mysqli_query($link, $mysql)) {//&& !empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["HubID"])){
            echo "H εγγραφή ενημερώθηκε επιτυχώς";
            header("location: ../admin_assistant_hub.php");
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
    <title>Ενημέρωση Υπαλλήλου Transit Hub</title>
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
                        <h2>Ενημέρωση Υπαλλήλου Transit Hub</h2>
                    </div>
                    <p>Εισάγετε τις νέες τιμές</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                            <div class="alert alert-danger fade in">
                            <input type="hidden" name="Username" value="<?php echo trim($_GET["Username"]); ?>"/>


                        <div class="form-group <?php echo (!empty($UsernameErr)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="Username" class="form-control" value="<?php echo $Username; ?>">
                            <span class="help-block"><?php echo $UsernameErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PasswordErr)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="text" name="Password" class="form-control" value="<?php echo $Password; ?>">
                            <span class="help-block"><?php echo $PasswordErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($HubIDErr)) ? 'has-error' : ''; ?>">
                            <label>HubID</label>
                            <input type="text" name="HubID" class="form-control" value="<?php echo $HubID; ?>">
                            <span class="help-block"><?php echo $HubIDErr;?></span>
                        </div>
                        <input type="hidden" name="Username" value="<?php echo $Username; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../admin_assistant_hub.php" class="btn btn-default">Cancel</a>
                    </div>

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>