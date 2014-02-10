<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>_Finaldestination - Taxiroutes</title>
    <link rel="shortcut icon" href="<?php echo Config::get('base_url');?>/assets/img/fdIcon.ico"/>
    <style>
      html, body, #googlemap {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
    <style>
      #directions-panel {
        height: 100%;
        float: right;
        width: 35%;
        overflow: auto;
      }

      #googlemap {
        margin-right: 100px;
      }

      #control {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #googlemap {
          height: 500px;
          margin: 0;
        }

        #directions-panel {
          float: none;
          width: auto;
        }
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<script>
var directionsDisplay;

var directionsService = new google.maps.DirectionsService();

function initialize() {
  
  directionsDisplay = new google.maps.DirectionsRenderer();
  
  //draw the map
  var mapOptions = {
    zoom: 9,
    center: new google.maps.LatLng(7.064459, 125.607746)
  };

  var map = new google.maps.Map(document.getElementById('googlemap'),mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
}



function calcRoute() {
  
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
  </head>
  <body>
    <div id="control">
      <strong>Start:</strong>
      <input id="start" onchange="calcRoute();"/>
      
      <strong>End:</strong>
      <input id="end" onchange="calcRoute();"/>
        
    </div>
    <div id="directions-panel"></div>
    <div id="googlemap"></div>
  </body>
</html>