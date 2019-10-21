<?php
session_start();

if($_SESSION['login_admin']){
}else{
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Διαχειριστής</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li class="active"><a class="navbar-brand" href="admin.php">Διαχειριστής</a></li>
          <li><a href="admin_local_store.php">Διαχείριση Τοπικών Καταστημάτων</a></li>
          <li><a href="admin_assistant_store.php">Διαχείριση Υπαλλήλλων Τοπικού Καταστήματος</a></li>
          <li><a href="admin_assistant_hub.php">Διαχείριση Υπαλλήλλων Transit Hubs</a></li>         
        </ul>
          <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αποσύνδεση</a></li>
        </ul>
      
      </div>
    </nav>

      

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header clearfix">
                            <a href="admin_local_store.php" class="btn green"><span></span>Διαχείριση Τοπικών Καταστημάτων</a>
                    </div>
                    <div class="page-header clearfix">
                            <a href="admin_assistant_store.php" class="btn green"><span></span>Διαχείριση Υπαλλήλλων Τοπικού Καταστήματος</a>
                     </div> 
                     <div class="page-header clearfix">  
                            <a href="admin_assistant_hub.php" class="btn green"><span></span>Διαχείριση Υπαλλήλλων Transit Hubs</a>
                    </div>   
                </div>
            </div>        
        </div>
    </div>
</body>
</html>