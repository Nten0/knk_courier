<html>
<head>
	<title> Σάρωση QR code </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="grid.js"></script>
	<script type="text/javascript" src="version.js"></script>
	<script type="text/javascript" src="detector.js"></script>
	<script type="text/javascript" src="formatinf.js"></script>
	<script type="text/javascript" src="errorlevel.js"></script>
	<script type="text/javascript" src="bitmat.js"></script>
	<script type="text/javascript" src="datablock.js"></script>
	<script type="text/javascript" src="bmparser.js"></script>
	<script type="text/javascript" src="datamask.js"></script>
	<script type="text/javascript" src="rsdecoder.js"></script>
	<script type="text/javascript" src="gf256poly.js"></script>
	<script type="text/javascript" src="gf256.js"></script>
	<script type="text/javascript" src="decoder.js"></script>
	<script type="text/javascript" src="qrcode.js"></script>
	<script type="text/javascript" src="findpat.js"></script>
	<script type="text/javascript" src="alignpat.js"></script>
	<script type="text/javascript" src="databr.js"></script>
	<script type="text/javascript" src="webqr.js"></script>
	
</head>

<body onload="load()">


<nav class="navbar navbar-default" style="margin-top:  0;">
  <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li class="active"><a  href="index.php">Σάρωση QR Code</a></li>
             
        </ul>
          <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Αρχική Σελίδα</a></li>
        </ul>
      
      </div>
    </nav>
    <div class="center">
<canvas id="qr-canvas" width="640" height="480" style="display:none"></canvas>

<div id="outdiv"> </div>

<div id="result">Αποτέλεσμα Σάρωσης</div>
<p id ="route"> </p>



<button id ="btn"class="btn green" type="button" onclick="processBtn()">Υποβολή</button>

</div>



</body>
<footer>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<style type="text/css">
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

	 .btn {
		  border-radius: 5px;
		  padding: 10px 55px;
		  font-size: 200%;
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

p{
	font-size:20px;
}

	</style>
	<script>

function processBtn() { 
	 var x = document.getElementById('btn');
	 x.style.display = 'none';
       	myqr=qrcode.decode();
        //alert(a);
        //$.post("qr_db_update.php", a);*/
        $.ajax({
			  type: "POST",
			  url: "qr_db_update.php",
			  data: {myqr},
			  complete: function(data){
			           // alert(data.responseText);
			           temp = "Η διαδρομή που πρέπει να ακολουθηθεί είναι: "
			           temp+=data.responseText;
			           	document.getElementById("route").innerHTML = temp;
			        }
			});
}

</script>
</footer>
</html>

