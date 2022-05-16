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
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/simplesidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}
	.modal form label {
		font-weight: normal;
	}
    #map { height: 500px;}
	#mapedit { height: 200px; }

    </style>

</head>
<body>
  <!--Navbar atas-->
  <!-- Navigation -->
  
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Add Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="l_name" required>
						</div>

						<div id="map"></div>

                        <div class="form-group">
                            <label>Coordinates</label>
                            <input type="text" class="form-control" name="coordinates" required>
                        </div>
						<div class="form-group">
							<label>Detail Information</label>
							<input type="text" class="form-control" name="l_info" required>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="l_foto" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
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

    var map = L.map('map').setView([-7.040658720358119, 107.64135932404132], 13);

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
