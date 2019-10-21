<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Δίκτυο Καταστημάτων</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height:100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="client.php">Πελάτης</a></li>
            <li><a href="track_order.php">Παρακολούθηση Παραγγελίας</a></li>
          <li class="active"><a href="client_courier_network.php">Προβολή Δικτύου </a></li>
          <li><a href="find_store_zip.html">Αναζήτηση Καταστήματος</a></li>         
        </ul>
         <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Αρχική Σελίδα</a></li>
        </ul>
      </div>
    </nav>
    
    <div id="map"></div>
     <ul></ul>

    <script>
      var customLabel = {
        hub: {
          label: 'H'
        },
        store: {
          label: 'S'
        }
      };

      var data;

     
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(38.2490092, 21.7105863),
          zoom: 6
        });

        $(document).ready(function(){
               
                $.getJSON('php/fetch_hubs.php', function(data) {
                        /* data will hold the php array as a javascript object */

                var infoWindow = new google.maps.InfoWindow;
               
               data = JSON.stringify(data);
               data = JSON.parse(data);

               
              var infowincontent = [data.length];
               for(var i = 0;i<data.length;i++)
               {
                console.log(data[i].id);
              
              var id = data[i].id;
              var name = data[i].name;
              var address = data[i].address;
              var num = data[i].number;
              var type = "hub";
              
              
              var point = new google.maps.LatLng(
                  parseFloat(data[i].lat),
                  parseFloat(data[i].long));

              infowincontent[i] = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent[i].appendChild(strong);
              infowincontent[i].appendChild(document.createElement('br'));

              var text = document.createElement('text');
             text.textContent = "Διεύθυνση: "+ address + " " +num;
              infowincontent[i].appendChild(text);
              var icon = customLabel[type] || {};

             var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });


            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {
                infoWindow.setContent(infowincontent[i]);
                infoWindow.open(map, marker);
                    }
                  })(marker, i));
             google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                    return function() {
                //infoWindow.setContent(infowincontent[i]);
                infoWindow.close(map, marker);
                    }
                  })(marker, i));

           
            }
          });

              $.getJSON('php/fetch_stores.php', function(data) {
                        /* data will hold the php array as a javascript object */

               var infoWindow = new google.maps.InfoWindow;
               
               data = JSON.stringify(data);
               data = JSON.parse(data);

               
              var infowincontent = [data.length];
               for(var i = 0;i<data.length;i++)
               {
                console.log(data[i].id);
              
              var id = data[i].id;
              var name = data[i].name;
              var address = data[i].address;
              var num = data[i].number;
              var phone = data[i].phone;
              var type = "store";
              var hub = data[i].hubID;
              
              
              var point = new google.maps.LatLng(
                  parseFloat(data[i].lat),
                  parseFloat(data[i].long));

              infowincontent[i] = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent[i].appendChild(strong);
              infowincontent[i].appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.setAttribute('style', 'white-space: pre;');
              text.textContent = "Διεύθυνση: "+ address+ " " + num +" \r\n";
              text.textContent +="Τηλέφωνο: " + phone;
              infowincontent[i].appendChild(text);
              var icon = customLabel[type] || {};

             var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });


            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {
                infoWindow.setContent(infowincontent[i]);
                infoWindow.open(map, marker);
                    }
                  })(marker, i));
             google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                    return function() {
                //infoWindow.setContent(infowincontent[i]);
                infoWindow.close(map, marker);
                    }
                  })(marker, i));

           
            }
          });
       });
      }

       </script>
    <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5yGdcf1mqkMGqf92d_XZXBHgl2VMfhwM&callback=initMap">
    </script>
  </body>
</html>