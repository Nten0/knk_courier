<!DOCTYPE html>
<html>
<head>
  <title> Παρακολούθηση Παραγγελίας </title>
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
        xmlhttp.open("GET", "get_autocomplete.php?q=" + str, true);
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
.center {
    margin: auto;
    text-align: center;
    padding: 10px;

}
  
	input[type=text] {
    width: 15%;
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
    width: 25%;
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

	btn {
  border-radius: 5px;
  padding: 10px 55px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  /*color: #fff;*/
  position: relative;
  display: inline-block;
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
/*  border-radius: 2px;
*/  transition: all 1s ease;
  transform: scale(1);
}

.green:hover {
    color: white;
  background-color: #4CAF50;
/*  Making button bigger on hover  */
  transform: scale(1.1) perspective(1px)
}
/* ---- Timeline ---- */

#mylist ol {
	position: relative;
	display: block;
	margin: 100px;
	height: 4px;
	background: #9b2;
}
#mylist ol::before,
#mylist ol::after {
	content: "";
	position: absolute;
	top: -8px;
	display: block;
	width: 0;
	height: 0;
  border-radius: 10px;
	border: 10px solid #9b2;
}
#mylist ol::before {
	left: -5px;
}
#mylist ol::after {
	right: -10px;
	border: 10px solid transparent;
	border-right: 0;
	border-left: 20px solid #9b2;
  border-radius: 3px;
}

/* ---- Timeline elements ---- */

#mylist li {
	position: relative;
	top: -77px;
	display: inline-block;
	float: left;
	width: 150px;
	transform: rotate(-45deg);
	font: bold 14px arial;
}
#mylist li::before {
	content: "";
	position: absolute;
	top: 3px;
	left: -29px;
	display: block;
	width: 6px;
	height: 6px;
	border: 4px solid #9b2;
	border-radius: 10px;
	background: #eee;
}



/* ---- Hover effects ---- */

#mylist li:hover {
	cursor: pointer;
  color: #28e;
}
#mylist li:hover::before {
	top: 1px;
	left: -31px;
	width: 8px;
	height: 8px;
	border-width: 5px;
	border-color: #28e;
}
#mylist li:hover .details {
	display: block;
  color: #444;
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="client.php">Πελάτης</a></li>
            <li class="active"><a href="track_order.php">Παρακολούθηση Παραγγελίας</a></li>
          <li><a href="client_courier_network.php">Προβολή Δικτύου </a></li>
          <li><a href="find_store_zip.html">Αναζήτηση Καταστήματος</a></li>         
        </ul>
         <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αρχική Σελίδα</a></li>
        </ul>
      </div>
    </nav>

    <div class="center">
    
<p>Παρακαλώ Εισάγετε Tracking Number:</p>
<input type="text" id="tracking_no">

<br><br><button type="button" class="btn green" onclick="validateForm()">Submit</button>
<div id="input"></div>
<div id="mylist" style="min-width: 1000px;">
<div id = "mylist" style="min-width: 1000px;"></div>
</div>
<div id="map" style="width:100%;height:500px"></div>
</div>
</body>

<footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		var tracking_no;
		var locations;
		var delivered;

		function validateForm() {
		    tracking_no = document.getElementById("tracking_no").value;		    
		   
		    if (tracking_no == "") {
		        alert("Tracking number must be filled out");
		        return false;
		    }
		    else
		    {
		    	 get_locations();
		    }
		}

		function get_locations(){
		  $.ajax({
			  type: "POST",
			  url: "php/get_locations.php",
			  async:false,
			  data: {tracking_no},
			  complete: function(data){
			            locations=data.responseText;
			           	locations = locations.split(",");
			           	document.getElementById('mylist').appendChild(makeUL(locations));

			           	if(locations[locations.length-2] == "0")
			           	{
			           		delivered = 0;
			           	}
			           	else
			           	{
			           		delivered = 1;
			           	}

			           	var len = locations.length-2 ;
			           	var keys = [len];
			           	
			           	var j =0;
			           	for(var i = 0; i < len; i=i+1) {

			           		if(i==0)
			           		{
			           		keys[i]=locations[0];
			           		}
			           		else
			           		{
			           			if((delivered == 1) && (i == len-1))
			           			{
			           				locations [i] = locations[i].split(" ");
					           		keys[i]=locations[i][0];
					           	}
					           	else
					           	{
					           		locations [i] = locations[i].split(" ");
					           		keys[i]=locations[i][1];
					           	}
					           		
			           		}           		
			           		console.log(keys[i]);					        
					    }
					    get_latlng(keys,delivered);

			           }
			        });			           	
				}
			


		function makeUL(array) {
		    // Create the list element:
		    var list = document.createElement('ol');

		    for(var i = 0; i < array.length-2; i++) {
		        // Create the list item:
		        var item = document.createElement('li');

		        // Set its contents:
		        item.appendChild(document.createTextNode(array[i]));

		        // Add it to the list:
		        list.appendChild(item);
		    }

		    // Finally, return the constructed list:
		    return list;
		}

		function get_latlng(keys,delivered)
		{
			console.log(keys[0]);
			console.log(delivered);
			store_name = keys[0];
			var results = [keys.length];
			var i = 0;

			 $.ajax({
			  type: "POST",
			  url: "php/get_latlng.php",
			  data: {store_name},
			  async:false,
			  complete: function(data){			            
			           
			            results[i] = data.responseText;
			            i++;

			           }
			  });
			 if (delivered == 0)
			 	{
			 		for(var j = 1; j<keys.length;j++)
			 		{
			 			console.log("MPHKA");
			 			hub_name = keys[j];
			 			$.ajax({
						  type: "POST",
						  url: "php/get_latlng_hub.php",
						  data: {hub_name},
						  async:false,
						  complete: function(data){			            
						           
						            results[i] = data.responseText;
						            i++;

						           }
						  });

			 		}
			 	}
			 else
			 {
			 	for(var j = 1; j<keys.length;j++)
			 		{
			 			
			 			if(j==keys.length-1)
			 			{
			 				store_name = keys[keys.length-1];
					 		$.ajax({
								  type: "POST",
								  url: "php/get_latlng.php",
								  data: {store_name},
								  async:false,
								  complete: function(data){			            
								           
								            results[i] = data.responseText;
								            i++;

								           }
								  });

			 			}
			 			else
			 			{
			 			hub_name = keys[j];
			 			$.ajax({
						  type: "POST",
						  url: "php/get_latlng_hub.php",
						  data: {hub_name},
						  async:false,
						  complete: function(data){			            
						           
						            results[i] = data.responseText;
						            i++;

						           }
						  });
			 			}

			 		}
			 		//setTimeout(function(){},200);
			 		
			 }

			 draw_map(results);

		}

		function draw_map(results)
		{
				console.log(results);
				long = [results.length];
				lat = [results.length];
				temp = [results.length];
				for(var i =0; i<results.length;i++)
				{
					var temp = results[i].split(',');
					console.log(temp[0]);
					console.log(temp[1]);
					
					lat[i] = parseFloat(temp[0]);
					long[i] = parseFloat(temp[1]);
					console.log(lat[i]);
					console.log(long[i]);
				
					//console.log(temp[i][1]);

				}
				marks = [results.length];
				var pathCoordinates = [];
				for(var i =0; i<results.length;i++)
				{
					marks[i] = new google.maps.LatLng(lat[i],long[i]);
					pathCoordinates.push(marks[i]);

				}
				
				  var mapCanvas = document.getElementById("map");
				  var mapOptions = {center:marks[results.length-1], zoom: 15};
				  var map = new google.maps.Map(mapCanvas,mapOptions);

				  var flightPath = new google.maps.Polyline({
				    path: pathCoordinates,
				    strokeColor: "#0000FF",
				    strokeOpacity: 0.8,
				    strokeWeight: 2
				  });
				  flightPath.setMap(map);

				   var marker = new google.maps.Marker({
	                map: map,
	                position:marks[results.length-1]
	              });

		}


		 

</script>

  <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5yGdcf1mqkMGqf92d_XZXBHgl2VMfhwM&callback">
    </script>

</footer>
</html>
