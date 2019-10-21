<?php

session_start();

if($_SESSION['login_admin']){
}else{
    header("location: index.php");
}

if (isset($_POST["ID"]))
{
    $link = mysqli_connect("localhost", "root", "root") or die(mysql_error());
    //$username = mysqli_real_escape_string($conn,$_POST['username']);
    mysqli_select_db($link,"project") or die("No connection to Database");
    $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
    mysqli_query($link,$sql) or die('No charset in Database');
    $ID=$_POST['ID'];
    $mysql = "DELETE FROM Store WHERE ID='".$ID."'";
    $retval=mysqli_query($link,$mysql);
    if( $retval ) {
        echo "Deleted data successfully.";
        header("location: ../admin_local_store.php");
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
    <title>Διαγραφή Τοπικού Καταστήματος</title>
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
                        <h1>Διαγραφή Τοπικού Καταστήματος</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="ID" value="<?php echo trim($_GET["ID"]); ?>"/>
                            <p>Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το κατάστημα;</p><br>
                            <p>
                                <input type="submit" value="Ναι" class="btn btn-danger">
                                <a href="../admin_local_store.php" class="btn btn-default">Όχι</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>