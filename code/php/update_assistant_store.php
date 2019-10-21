<?php

    session_start();
    if($_SESSION['login_admin'])
    {}
    else
    {
        header("location:index.php");
    }


    $UsernameErr = $PasswordErr = $StoreErr = $GenErr = "";


if (isset($_GET["Username"]))
{
    $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
        mysqli_query($link,$sql) or die('No charset in Database');

        $Username = $_GET['Username'];
        $mysql = "SELECT * FROM AssistantStore WHERE Username='".$Username."'";



                    if($result = mysqli_query($link, $mysql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                            $Username=$row['Username'];
                            $Password=$row['Password'];
                            $Store=$row['Store'];}
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
        $Store = mysqli_real_escape_string($link, $_POST['Store']);

        if (empty($_POST["Username"])) {
            $UsernameErr = "Username is required";
        } 

        if (empty($_POST["Password"])) {
            $PasswordErr = "Password is required";
        }

        if (empty($_POST["Store"])) {
            $StoreErr = "Store is required";
        }


        if ($UsernameErr=="" && $PasswordErr == "" && $StoreErr == ""){
        // attempt insert query execution
       
        $mysql = "UPDATE AssistantStore SET Password='$_POST[Password]', Store='$_POST[Store]' WHERE Username='".$Username."'";
        

        if(mysqli_query($link, $mysql)) {//&& !empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["HubID"])){
            echo "Records updated successfully.";
            header("location: ../admin_assistant_store.php");
        } else{  
         
                


                        $GenErr = "Διπλότυπο Username ή Λάθος StoreID";
                       
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
    <title>Ενημέρωση Υπαλλήλου Τοπικού Καταστήματος</title>
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
                        <h2>Ενημέρωση Υπαλλήλου Τοπικού Καταστήματος</h2>
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
                        <div class="form-group <?php echo (!empty($StoreErr)) ? 'has-error' : ''; ?>">
                            <label>Store</label>
                            <input type="text" name="Store" class="form-control" value="<?php echo $Store; ?>">
                            <span class="help-block"><?php echo $StoreErr;?></span>
                        </div>
                        <input type="hidden" name="Username" value="<?php echo $Username; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../admin_assistant_store.php" class="btn btn-default">Cancel</a>
                    </div>

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>