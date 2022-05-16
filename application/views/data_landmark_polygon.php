<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web GIS</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>

        <!-- Bootstrap core CSS -->
       
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


        </head>
    <body>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Polygon Kabupaten Bandung</h4>
                        <p class="card-description">
                            <a href="<?= site_url('user/add')?>"class="btn btn-info btn-rounded btn-fw">Tambah Polygon</a>
                        </p>
                  <div class="table-responsive">
                  <table class="table table-bordered">
                <thead>
                    <tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Coordinates</th>
                        <th>Detail Information</th>
						<th>Photo</th>
                        <th>ascw</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($landmark as $landmarks): ?>
                    <tr>
						<td>
                            <?php echo $landmarks->id_polygon?>
						</td>
                        <td><?php echo $landmarks->name_polygon?></td>
                        <td><?php echo $landmarks->coordinates?></td>
						<td><?php echo $landmarks->information?></td>
						<td><img src='<?=base_url()?>assets/uploads/<?php echo $landmarks->photo?>' alt='maptime logo gif' width='100px' height='70px'/></td>
                        <td>
                            <a href="#editLandmarkModal" class="edit" onclick="getData('<?php echo $landmarks->id_polygon?>', '<?php echo $landmarks->name_polygon?>', '<?php echo $landmarks->coordinates?>', '<?php echo $landmarks->information?>', '<?php echo $landmarks->photo?>')"><i class="material-icons" data-toggle="tooltip" title="Edit">&#aa;</i></a>
                            <a href="#deleteLandmarkModalID" class="delete" data-toggle="modal" onclick="getID(<?php echo $landmarks->id_polygon?>)"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                  </div>
                </div>
              </div>
            </div>
           </div>
           </body>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->

  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>

  <script type="text/javascript">
    var base_url = "<?=base_url()?>";

    var map = L.map('map').setView([-41.2868811, 174.7723432], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

        //Add function to Polygon
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
            marker: false,
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

        var polygon = null;
        map.on('draw:created', function(e) {

        var type = e.layerType,
            layer = e.layer;

        polygon = layer.toGeoJSON()
        var coordPolygon = JSON.stringify(polygon.geometry.coordinates[0]);

        var addPopup =  `Coordinates: `+coordPolygon;

        var customOptions =
            {
            'maxWidth': '200',
            'className' : 'custom'
            };

            layer.bindPopup(addPopup,customOptions);

        editableLayers.addLayer(layer);
        });

	//Map for edit
	var map1 = L.map('mapedit').setView([-41.2868811, 174.7723432], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	maxZoom: 18,
    }).addTo(map1);

        //Edit function to Polygon
        // Initialise the FeatureGroup to store editable layers
        var editableLayers1 = new L.FeatureGroup();
        map1.addLayer(editableLayers1);

        var drawPluginOptions1 = {
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
            marker: false,
            },
        edit: {
            featureGroup: editableLayers1, //REQUIRED!!
            remove: false
        }
        };

        // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl1 = new L.Control.Draw(drawPluginOptions1);
        map1.addControl(drawControl1);

        var editableLayers1 = new L.FeatureGroup();
        map1.addLayer(editableLayers1);

        var polygon1 = null;
        map1.on('draw:created', function(e) {

        var type = e.layerType,
            layer1 = e.layer;

        polygon1 = layer1.toGeoJSON()
        var coordPolygon1 = JSON.stringify(polygon1.geometry.coordinates[0]);

        var addPopup1 =  `Coordinates: `+coordPolygon1;

        var customOptions1 =
            {
            'maxWidth': '200',
            'className' : 'custom'
            };

            layer1.bindPopup(addPopup1,customOptions1);

        editableLayers1.addLayer(layer1);
        });

	function getID(data){
        document.getElementById("id_landmark").value = data;
    }

    var polygon2 = null;
	function getData(id, name, coord, info, gambar){
        document.getElementById("editLandmarkModal").scrollIntoView()
        var coords = JSON.parse(coord);

        for(var x=0; x<coords.length; x++){
            coords[x] = [coords[x][1], coords[x][0]]
        }

        console.log(coords)

        polygon2 = L.polygon(coords).addTo(map1);
        console.log(polygon2)

        document.getElementById("id_landmark1").value = id;
        document.getElementById("name_landmark").value = name;
        document.getElementById("coordinates_landmark1").value = coord;
        document.getElementById("info_landmark").value = info;
    }

	function deletePolygon(){
		map1.removeLayer(polygon2);
    }

    function addFunction() {
        document.getElementById("addLandmarkModal").scrollIntoView()
    }

  </script>

      <!-- Bootstrap core JavaScript -->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
