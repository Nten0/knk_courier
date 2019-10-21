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
    <title>Διαχείριση Υπαλλήλων Transit Hubs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
    
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        #btn{ /*Style back button*/
            line-height: 20px;
            width: auto;
            font-size: 12pt;
            font-family: tahoma;
            margin-top: 5px;
            margin-right: 5px;
            position:absolute;
            top:0; 
            left:0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }



    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    
</head>
<body>


    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">Διαχειριστής</a>
    </div>
        <ul class="nav navbar-nav">
          <li><a href="admin_local_store.php">Διαχείριση Τοπικών Καταστημάτων</a></li>
          <li><a href="admin_assistant_store.php">Διαχείριση Υπαλλήλλων Τοπικού Καταστήματος</a></li>
          <li class="active"><a href="admin_assistant_hub.php">Διαχείριση Υπαλλήλλων Transit Hubs</a></li>          
        </ul>
        <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αποσύνδεση</a></li>
        </ul>
      </div>
    </nav>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Υπάλληλοι Transit Hubs</h2>
                        <a href="php/add_assistant_hub.php" class="btn btn-success pull-right">Προσθήκη Νέου Υπαλλήλου</a>
                    </div>
                    <?php
                    require_once 'php/config.php';
                    
                    $sql = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
                    mysqli_query($link,$sql) or die('No charset in Database');

                    // Attempt select query execution
                    $sql = "SELECT * FROM AssistantHub";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Username</th>";
                                        echo "<th>Password</th>";
                                        echo "<th>HubID</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Username'] . "</td>";
                                        echo "<td>" . $row['Password'] . "</td>";
                                        echo "<td>" . $row['HubID'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='php/update_assistant_hub.php?Username=". $row['Username'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='php/delete_assistant_hub.php?Username=". $row['Username'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>