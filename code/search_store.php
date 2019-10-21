
<!DOCTYPE html>
<html>
  <head>
    <title>Αναζήτηση Καταστημάτων</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
 p{
  font-size: 18px;
 }

   html, body {
  color: #black;
  background: #eee;
  min-width: 700px;
  font-size: 16px;
}
.center {
    margin: auto;
    text-align: center;
    padding: 10px;

}
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        /*top: 50px;*/
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

	input[type=text] {
    width: 20%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 40%;
}

	@media only screen and (max-device-width: 1000px) {
    	input[type=text] {
	    width: 40%;
	    box-sizing: border-box;
	    border: 2px solid #ccc;
	    border-radius: 4px;
	    font-size: 14px;
	    background-color: white;
	    background-image: url('searchicon.png');
	    background-position: 10px 10px; 
	    background-repeat: no-repeat;
	    padding: 12px 20px 12px 40px;
	    -webkit-transition: width 0.4s ease-in-out;
	    transition: width 0.4s ease-in-out;
		}

		input[type=text]:focus {
	    	width: 50%;
	    }
	}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  </head>
  <body>
	<nav class="navbar navbar-default" style="margin: 0;">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="client.php">Πελάτης</a></li>
            <li><a href="track_order.php">Παρακολούθηση Παραγγελίας</a></li>
          <li><a href="client_courier_network.php">Προβολή Δικτύου </a></li>
          <li class="active"><a href="find_store_zip.html">Αναζήτηση Καταστήματος</a></li>         
        </ul>
         <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αρχική Σελίδα</a></li>
        </ul>
      </div>
    </nav>
    
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="find_store_zip.html">Αναζήτηση Πλησιέστερου Καταστήματος</a></li> 
          <li class="active"><a href="search_store.php">Αναζήτηση Συγκεκριμένου Καταστήματος</a></li>        
        </ul>
      </div>
    </nav>

    <div class = "center">

    <form> 
      <p>City: <input type="text" name="search" placeholder="e.g Αθήνα" onkeyup="showHint(this.value)"></p>
    </form>
    <p>Suggestions: <span id="txtHint"></span></p> 
 </div>
 
  </body>
</html>