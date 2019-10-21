<!DOCTYPE html>
  <head>
  <title> Σελίδα Πελάτη </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  <script>
    function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "php/get_autocomplete.php?q=" + str, true);
        xmlhttp.send();
    }
  }
  </script>

  <style>
  html, body {
  color: #black;
  background: #eee;
  min-width: 700px;
  font-size: 16px;
}

    
    .btn {
  border-radius: 5px;
  padding: 10px 55px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  position: relative;
  display: inline-block;
}

  @media only screen and (max-device-width: 1000px) {
      .btn {
        border-radius: 5px;
        padding: 10px 55px;
        font-size: 100%;
        text-decoration: none;
        margin: 20px;
        position: relative;
        display: inline-block;
      }
  }

.btn:active {
  transform: translate(0px, 5px);
  -webkit-transform: translate(0px, 5px);
  box-shadow: 0px 1px 0px 0px;
}


.green {

  background-color: #4CAF50;
  color: white;
  box-shadow: 3px 5px 5px #888888;
  transition: all 1s ease;
  transform: scale(1);
}

.green:hover {
    color: white;
  background-color: #4CAF50;
  transform: scale(1.1) perspective(1px)
}

.wrapper{
  margin: 0 auto;
}


  </style>
  </head>

  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="client.php">Πελάτης</a></li>
            <li><a href="track_order.php">Παρακολούθηση Παραγγελίας</a></li>
          <li><a href="client_courier_network.php">Προβολή Δικτύου </a></li>
          <li><a href="find_store_zip.html">Αναζήτηση Καταστήματος</a></li>         
        </ul>
        <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αρχική Σελίδα</a></li>
        </ul>

      </div>
    </nav>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header clearfix">
                            <a href="track_order.php" class="btn green"><span></span>Παρακολούθηση Παραγγελίας</a>
                    </div>
                    <div class="page-header clearfix">
                            <a href="client_courier_network.php" class="btn green"><span></span>Προβολή Δικτύου</a>
                     </div> 
                     <div class="page-header clearfix">  
                            <a href="find_store_zip.html" class="btn green"><span></span>Αναζήτηση Καταστήματος</a>
                    </div>   
                </div>
            </div>        
        </div>
    </div>
  </body>
</html>