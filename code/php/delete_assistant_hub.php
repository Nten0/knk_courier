<?php

session_start();

if($_SESSION['login_admin']){
}else{
    header("location: index.php");
}

if (isset($_POST["Username"]))
{
    $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
    //$username = mysqli_real_escape_string($conn,$_POST['username']);
    mysqli_select_db($link,"project") or die("No connection to Database");
    $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
    mysqli_query($link,$sql) or die('No charset in Database');
    $Username=$_POST['Username'];
    $mysql = "DELETE FROM AssistantHub WHERE Username='".$Username."'";
    $retval=mysqli_query($link,$mysql);
    if( $retval ) {
        echo "Deleted data successfully.";
        header("location: ../admin_assistant_hub.php");
            }
            else{
            die('Could not delete data: ' . mysql_error());}
}
mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Διαγραφή Υπαλλήλου Transit Hub</title>
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
                        <h1>Διαγραφή Υπαλλήλου Transit Hub</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="Username" value="<?php echo trim($_GET["Username"]); ?>"/>
                            <p>Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το κατάστημα;</p><br>
                            <p>
                                <input type="submit" value="Ναι" class="btn btn-danger">
                                <a href="../admin_assistant_hub.php" class="btn btn-default">Όχι</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>