<?php

    session_start();
    if($_SESSION['login_admin'])
    {}
    else
    {
        header("location:../index.php");
    }
    $Username = $Password = $Store = "";
    $UsernameErr = $PasswordErr = $StoreErr = $GenErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
        mysqli_select_db($link,"project") or die("No connection to Database");
        $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
 



        mysqli_query($link,$sql) or die('No charset in Database');

        // Escape user inputs for security
        $Username = mysqli_real_escape_string($link, $_REQUEST['Username']);
        $Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
        $Store = mysqli_real_escape_string($link, $_REQUEST['Store']);
 
        if (empty($_POST["Username"])) {
            $UsernameErr = "Username is required";
        } //else {
            //$Username = test_input($_POST["name"]);
        //}

        if (empty($_POST["Password"])) {
            $PasswordErr = "Password is required";
        }

        if (empty($_POST["Store"])) {
            $StoreErr = "Store is required";
        }





if ($UsernameErr=="" && $PasswordErr == "" && $StoreErr == ""){
        // attempt insert query execution
        $mysql = "INSERT INTO AssistantStore (Username, Password, Store) VALUES ('$Username', '$Password', '$Store')";
        
        

        if(mysqli_query($link, $mysql)){//&& !empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["HubID"])){
            echo "Records added successfully.";
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
                        <h2>Δημιουργία υπαλλήλου Local Store</h2>
                    </div>
                    <p>Δώσε τα ακόλουθα στοιχεία</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

                        <div class="form-group <?php echo (!empty($GenErr)) ? 'has-error' : ''; ?>">
                            <span class="help-block"><?php echo $GenErr;?></span>
                        </div>



                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../admin_assistant_store.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html> 