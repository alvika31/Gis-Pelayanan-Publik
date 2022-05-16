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
  h7{
    font-family: poppins;
  }
  a{
    font-family: poppins;
  }
  h5{
    font-family: poppins;
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
    var v_lat = parseFloat(result[i].lat_absen);
    var v_long = parseFloat(result[i].long_absen);

    
    
    var icon_bangunan = "";

    if(result[i].nama_kategori == "kantor pos"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/post-office.png',
      iconSize: [40,40]
    });

    }


    if(result[i].nama_kategori == "kantor polisi"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/kantor_polisi.png',
      iconSize: [40,40]
    });

    }
    if(result[i].nama_kategori == "Hotel"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/hotel.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Rumah sakit"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/hospital.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Masjid"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/masjid.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "puskesmas"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/puskesmas.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Terminal"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/terminal.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Kantor Kepala Desa"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/kepala_desa.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Kantor Kecamatan"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/kecamatan.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Stasiun"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/station.png',
      iconSize: [40,40]
    });

    }

    if(result[i].nama_kategori == "Kantor Sistem Administrasi Daerah"){
        icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/administrasi.png',
      iconSize: [40,40]
    });

    }

    

  // create popup contents
  var customPopup = "<center><h5><b>Informasi Lokasi</b></h5></center>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].gambar+"' alt='map photo' width='300px'/><br>"+'<b><p style="weight: 700; font-size: 20px; font-family: poppins">Nama: '+result[i].nama_tempat+" </p></b><h7>Detail : "+result[i].keterangan+"</h7><h7><br>Kategori: "+result[i].nama_kategori+"</h7><h7><br>Kecamatan: "+result[i].name_polygon+"</h7><br><br><a class='btn btn-danger btn-sm' style='color: white' href='<?=base_url()?>index.php/map/deleteMarker/"+result[i].id_tempat+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-sm' style='color: white' href='<?=base_url()?>index.php/page/update_landmark/"+result[i].id_tempat+"'>Update</a>";

  // specify popup options
  var customOptions =
      {
      'maxWidth': '500',
      'maxHeight': '1000',
      'className' : 'custom',
      'margin': '0px'
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
          var customPopup = "<center><h5><b>Kecamatan Informasi</b></h5></center>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].photo+"' alt='map photo' width='300px'/>"+"<br><b><p style='weight: 700; font-size: 20px; font-family: poppins'>Name:"+result[i].name_polygon+"</p></b>"+"<h7>Detail :"+result[i].information+" </h7><br/><br/><a class='btn btn-danger btn-sm' style='color: white' href='<?=base_url()?>index.php/mappolygon/deletePolygon/"+result[i].id_polygon+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-sm' style='color: white' href='<?=base_url()?>index.php/page/update_landmark_polygon/"+result[i].id_polygon+"'>Update</a>";

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
            color: 'red', // Color the shape will turn when intersects
            message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
        },
        shapeOptions: {
            color: 'red'
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
            <label for="landmark_info">Kecamatan:</label><br> 
            <select  id="l_kec" name="l_kec" required>
            <option value="">Pilih Kecamatan</option>
              <?php foreach ($m as $mah) { ?>
                <option value="<?=$mah->id_polygon?>">
                  <?=$mah->id_polygon.'/'.$mah->name_polygon?>
                </option>
              <?php } ?>
              </select><br>
            <label for="landmark_info">Detail Information:</label><br>
                <input type="text" id="l_info" name="l_info" required><br>
           <label for="landmark_info">Kategori:</label><br>
                <select id="l_kate" name="l_kate"  required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategoris as $mah) { ?>
                <option value="<?=$mah->id_kategori?>">
                  <?=$mah->id_kategori.'/'.$mah->nama_kategori?>
                </option>
              <?php } ?>
                </select><br>               
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