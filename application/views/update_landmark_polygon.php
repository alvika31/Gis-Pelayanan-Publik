<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web GIS</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>   

    <style>
       #mapid{
        height: 200px;
        width: 500px;
      }

    </style>
  </head>
  <body>   
    <?php if ($this->session->flashdata('success')): ?>
		  <div class="alert alert-success" role="alert">
			  <?php echo $this->session->flashdata('success'); ?>
	    </div>
	  <?php endif; ?>

  
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <form action="<?=base_url()?>index.php/mappolygon/updatePolygon"  class="forms-sample" method="POST" enctype="multipart/form-data">
                <h5>Kecamatan Update Form</h5>
                <input type="hidden" name="l_id" value="<?php echo $id ?>" />

                <div class="form-group">
                    <label for="exampleInputUsername1">Kecamatan Name</label>
                    <input type="text" class="form-control"  name="l_name" value="<?php echo $name ?>" required />
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Choose coordinate</label>
                    <div id="mapid"></div> 
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Coordinates</label>
                    <input type="text" class="form-control" name="coordinates" value="<?php echo $coordinates ?>" id="lat_landmark" required/>
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Detail info</label>
                    <input type="text" name="l_info" class="form-control" value="<?php echo $info ?>" required/>
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Photo</label>
                    <input type="file" name="l_foto" value="<?=base_url()?>assets/uploads/<?php echo $photo ?>"/>
                </div>
                <button type="submit" class="btn-primary" href="/">APPLY</button>
                </div>
            </div>
        </div>
      </div>



     
  </body>
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  
  <script type="text/javascript">
    var base_url = "<?=base_url()?>";
    var coord =  <?php echo $coordinates ?>;
    //var coordinates =  JSON.parse(coord);
                
    for(var x=0; x<coord.length; x++){
        coord[x] = [coord[x][1], coord[x][0]]
    }
    console.log(coord);

    var map = L.map('mapid').setView([-7.040658720358119, 107.64135932404132], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

    var polygon = L.polygon(coord).addTo(map);
    console.log(polygon);

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
        //editableLayers.on('click', addMarker);

        var polygon = null;
        //Function to send coordinates to Database
        map.on('draw:created', function(e) {

        var type = e.layerType,
            layer = e.layer;
        
        polygon = layer.toGeoJSON()
        var coord = JSON.stringify(polygon.geometry.coordinates[0]);   

        var addPopup =  `Coordinates: `+coord;
      
        var customOptions =
            {
            'maxWidth': '200',
            'className' : 'custom'
            };

            layer.bindPopup(addPopup,customOptions);

        editableLayers.addLayer(layer);
        });

  </script>

   <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>