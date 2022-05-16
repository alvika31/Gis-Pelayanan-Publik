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
<link rel="stylesheet" href="<?=base_url('')?>leaflet-search/src/leaflet-search.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
<script src="<?=base_url('')?>tilelayer/leaflet-tilelayer-here.js"></script>
<!-- <link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/> -->




<style type="text/css">
  html, body {
    width: 100%;
    height: 100%;
    padding: 0;
       margin: 0;
}
 
  #mapid {
       height: 100%;
       width: 100%;
       position: relative;
       padding: 0;
       margin: 0;
      
       }
      
 
</style>
</head>
<body>

        <div id="mapid"></div>
       


    

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  <script src="<?=base_url()?>assets/leaflet-kml-master/L.KML.js"></script>
  <script src="<?=base_url()?>leaflet-search/src/leaflet-search.js"></script>
  <script src="<?=base_url()?>select-layer/dist/leaflet.active-layers.min.js"></script>
  <script src="<?=base_url()?>select-layer/dist/leaflet.select-layers.min.js"></script>



  



    <script>
          var map = L.map('mapid').setView([-7.040658720358119, 107.64135932404132], 13);


var base_url = "<?=base_url()?>";

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  maxZoom: 100
}).addTo(map);

var data = [
        <?php foreach($lks as $key => $value) { ?>
            {
            "nama_tempat":"<?= $value->nama_tempat; ?>",
          "tempat_lat":"<?= $value->tempat_lat; ?>",
           "tempat_long": "<?= $value->tempat_long; ?>",
            "gambar":"<?= $value->gambar; ?>",
            "keterangan":"<?= $value->keterangan; ?>",
            "name_polygon":"<?= $value->name_polygon; ?>",
            "nama_kategori":"<?= $value->nama_kategori; ?>"
            }, 
            <?php } ?>
	];
  var icon1 = "";
    var markersLayer = new L.LayerGroup();

    map.addLayer(markersLayer);

    map.addControl( new L.Control.Search({
      position:'topright',		
      layer: markersLayer,
      initial: false,
      zoom: 17,
      collapsed: true
    }) );

    
    for(i in data) {

      if(data[i].nama_kategori == "kantor pos"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/post-office.png',
      iconSize: [40,40], 
      
    });

    }


    if(data[i].nama_kategori == "kantor polisi"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/kantor_polisi.png',
      iconSize: [40,40],
      
    });

    }
    if(data[i].nama_kategori == "Hotel"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/hotel.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Rumah sakit"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/hospital.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Masjid"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/masjid.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "puskesmas"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/puskesmas.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Terminal"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/terminal.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Kantor Kepala Desa"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/kepala_desa.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Kantor Kecamatan"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/kecamatan.png',
      iconSize: [40,40],
      
    });

    }

    if(data[i].nama_kategori == "Stasiun"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/station.png',
      iconSize: [40,40],
      
    });

    }    

    if(data[i].nama_kategori == "Kantor Sistem Administrasi Daerah"){
       icon1 = L.icon({
      iconUrl: base_url+'assets/images/administrasi.png',
      iconSize: [40,40],
      
    });

    }

    console.log(i);
		var nama_tempat = data[i].nama_tempat;
    var tempat_lat = parseFloat(data[i].tempat_lat);
    var tempat_long = parseFloat(data[i].tempat_long);
    var keterangan = data[i].keterangan;
    var gambar = data[i].gambar;
    var nama_kategori = data[i].nama_kategori;
    var name_polygon = data[i].name_polygon;	//value searched		//position found
		var marker = new L.Marker([tempat_lat, tempat_long], {title: nama_tempat, icon: icon1} );//se property searched      
      
      var customPopup = "<center><h5><b>Informasi Lokasi</b></h5></center>"+"<img src='<?=base_url()?>assets/uploads/"+gambar+"' alt='map photo' width='300px'/><br>"+'<b><p style="weight: 700; font-size: 20px; font-family: poppins">Nama: '+nama_tempat+" </p></b><h7>Detail : "+keterangan+"</h7><h7><br>Kategori: "+nama_kategori+"</h7><h7><br>Kecamatan: "+name_polygon+"";

  // specify popup options
  var customOptions =
      {
      'maxWidth': '500',
      'maxHeight': '1000',
      'className' : 'custom',
      'margin': '0px'
      }

      marker.bindPopup(customPopup,customOptions);
      markersLayer.addLayer(marker);
	}

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
        featureGroup: asik, //REQUIRED!!
        remove: false
    }
    };

    

    

    
</script>
</body>
</html>



