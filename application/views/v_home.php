<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>

<style type="text/css">
  .user{
    padding:5px;
    margin-bottom: 5px;
  }
  #mapid {
       height: 750px;
        width: 1000px;
        z-index: 3;
       }
</style>
</head>
<body>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h3>Maps Kabupaten Bandung</h3><br>
                <div id="mapid"></div>

                <div>
            </div>
        </div>
    </div>
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  <script src="<?=base_url()?>assets/leaflet-kml-master/L.KML.js"></script>



    <script>
        var map = L.map('mapid').setView([-7.040658720358119, 107.64135932404132], 13);


var base_url = "<?=base_url()?>";

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  maxZoom: 100
}).addTo(map);



var myFeatureGroup = L.featureGroup().addTo(map);

$.getJSON("<?=base_url()?>index.php/map/bangunan_json", function(result){
  $.each(result, function(i, field){
    var v_lat = parseFloat(result[i].tempat_lat);
    var v_long = parseFloat(result[i].tempat_long);

    var icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/marker.png',
      iconSize: [30,40]
    });

  // create popup contents
  var customPopup = "<center><h5><b>Landmark Information</b></h5></center>"+'<h7>Name: </h7>'+result[i].nama_tempat+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].gambar+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].keterangan+"<br/><a href='<?=base_url()?>index.php/map/deleteMarker/"+result[i].id_tempat+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark/"+result[i].id_tempat+"'>Update</a>";

  // specify popup options
  var customOptions =
      {
      'maxWidth': '500',
      'maxHeight': '1000',
      'className' : 'custom'
      }

  var bangunanMarker = L.marker([v_lat,v_long],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
  });
});

$.getJSON("<?=base_url()?>index.php/mappolygon/getPolygon", function(result){
    $.each(result, function(i, field){
      var coordinates =  JSON.parse(result[i].coordinates)
          for(var x=0; x<coordinates.length; x++){
              coordinates[x] = [coordinates[x][1], coordinates[x][0]]
          }

          // create popup contents
          var customPopup = "<center><h3><b>Landmark Information</b></h3></center>"+'<h7>Name: </h7>'+result[i].name_polygon+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].photo+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].information+"<br/><a href='<?=base_url()?>index.php/mappolygon/deletePolygon/"+result[i].id_polygon+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark_polygon/"+result[i].id_polygon+"'>Update</a>";

          // specify popup options
          var customOptions =
              {
              'maxWidth': '500',
              'maxHeight': '1000',
              'className' : 'custom'
              }

          var polygon = L.polygon(coordinates).bindPopup(customPopup,customOptions).addTo(map);
    });
});

    //Add function to Polygon or Marker
    // Initialise the FeatureGroup to store editable layers
    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);

    var drawPluginOptions = {
    position: 'topright',
    draw: {
        polygon: {
        allowIntersection: false, // Restricts shapes to simple polygons
        drawError: {
            color: '#e1e100', // Color the shape will turn when intersects
            message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
        },
        shapeOptions: {
            color: '#97009c'
        }
        },
        // disable toolbar item by setting it to false
        polyline: false,
        circle: false, // Turns off this drawing tool
        circlemarker: false,
        rectangle: false,
        marker: true,
        },
    edit: {
        featureGroup: editableLayers, //REQUIRED!!
        remove: false
    }
    };

    // Initialise the draw control and pass it the FeatureGroup of editable layers
    var drawControl = new L.Control.Draw(drawPluginOptions);
    map.addControl(drawControl);

    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);
    //editableLayers.on('click', addMarker);

    var polygon = null;
    //Function to send coordinates to Database
    map.on('draw:created', function(e) {

    var type = e.layerType,
        layer = e.layer;

    polygon = layer.toGeoJSON()
    var coordMarkerLat = JSON.stringify(polygon.geometry.coordinates[1]);
    var coordMarkerLong = JSON.stringify(polygon.geometry.coordinates[0]);
    var coordPolygon = JSON.stringify(polygon.geometry.coordinates[0]);

    if(type === 'marker'){
        var addPopup =  `<h3>Add Landmark</h3>`+coordMarkerLat+", "+coordMarkerLong+
        `<form action="<?=base_url()?>index.php/map/addMarker" method="POST" enctype="multipart/form-data">
            <label for="landmark_nama">Name:</label><br>
                <input type="text" id="l_name" name="l_name" required><br>
            <label for="landmark_latitude">Latitude:</label><br>
                <input type="text" id="l_lat" name="l_lat" required><br>
            <label for="landmark_longitude">Longitude:</label><br>
                <input type="text" id="l_long" name="l_long" required><br>
            <label for="landmark_info">Detail Information:</label><br>
                <input type="text" id="l_info" name="l_info" required><br>
            <label for="landmark_foto">Photo:</label><br>
                <input type="file" id="l_foto" name="l_foto" required><br><br>
                <input type="submit" value="Submit">
        </form>`;

        var customOptions =
            {
            'maxWidth': '500',
            'className' : 'custom'
            };
        layer.bindPopup(addPopup,customOptions);
    }
    else if(type === 'polygon'){
    var addPopup =  `<h3>Add Landmark</h3>`+coordPolygon+`
      <form action="<?=base_url()?>index.php/mappolygon/addPolygon" method="POST" enctype="multipart/form-data">
          <label for="landmark_nama">Name:</label><br>
              <input type="text" id="l_name" name="l_name" required><br>
          <label for="landmark_coordinates">Coordinates:</label><br>
              <input type="text" id="l_coord" name="coordinates" required><br>
          <label for="landmark_info">Detail Information:</label><br>
              <input type="text" id="l_info" name="l_info" required><br>
          <label for="landmark_foto">Photo:</label><br>
              <input type="file" id="l_foto" name="l_foto" required><br><br>
          <input type="submit" value="Submit">
      </form>`;

    var customOptions =
        {
        'maxWidth': '500',
        'className' : 'custom'
        };

        layer.bindPopup(addPopup,customOptions);
    }

    editableLayers.addLayer(layer);
    });

</script>
</body>
</html>