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


<style type="text/css">

#mapid { height: 480px; }
   
	#map { height: 180px; }

	#mapedit { height: 180px; }
    }
</style>
</head>
<body>

  

    <div class="container" style="padding: 50px;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>List Lokasi</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addLandmarkModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Landmark</span></a>
						<a href="#deleteLandmarkModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All</span></a>
					</div>
                </div>
            </div>
			<div class="table-responsive">
			<table class="table table-bordered">
                <thead>
                    <tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Latitude</th>
						<th>Longitude</th>
						<th>Kecamatan</th>
                        <th>Detail Information</th>
                        <th>Kategori</th>
						<th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($landmark as $landmarks): ?>
                    <tr>
						<td>
                            <?php echo $landmarks->id_tempat?>
						</td>
                        <td><?php echo $landmarks->nama_tempat?></td>
                        <td><?php echo $landmarks->tempat_lat?></td>
						<td><?php echo $landmarks->tempat_long?></td>
						<td><?php echo $landmarks->name_polygon?></td>
                        <td><?php echo $landmarks->keterangan?></td>
                        <td><?php echo $landmarks->nama_kategori?></td>
						<td><img src='<?=base_url()?>assets/uploads/<?php echo $landmarks->gambar?>' alt='maptime logo gif' width='100px' height='70px'/></td>
                        <td>
                            <a href="#editLandmarkModal" class="edit" data-toggle="modal" onclick="getData('<?php echo $landmarks->id_tempat?>', '<?php echo $landmarks->nama_tempat?>', '<?php echo $landmarks->tempat_lat?>', '<?php echo $landmarks->tempat_long?>', '<?php echo $landmarks->keterangan?>',  '<?php echo $landmarks->id_kategori?>', '<?php echo $landmarks->gambar?>')"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteLandmarkModalID" class="delete" data-toggle="modal" onclick="getID(<?php echo $landmarks->id_tempat?>)"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- ADD Modal HTML -->
	<div id="addLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/addMarker1" method="POST" enctype="multipart/form-data">
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
							<label>Latitude</label>
							<input type="text" class="form-control" name="l_lat" required>
						</div>
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" class="form-control" name="l_long" required>
						</div>
						<div class="form-group">
							<label>Kecamatan</label>
							<select name="l_kec" class="form-control" required>
								<option value="">Pilih Kecamatan</option>
							<?php foreach ($m as $mah) { ?>
								<option value="<?=$mah->id_polygon?>">
									<?=$mah->id_polygon.'/'.$mah->name_polygon?>
								</option>
							<?php } ?>


								</select>
						</div>
						<div class="form-group">
							<label>Detail Information</label>
							<input type="text" class="form-control" name="l_info" required>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="l_kate" class="form-control" required>
								<option value="">Pilih Kategori</option>
							<?php foreach ($kategoris as $mah) { ?>
								<option value="<?=$mah->id_kategori?>">
									<?=$mah->id_kategori.'/'.$mah->nama_kategori?>
								</option>
							<?php } ?>


								</select>
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
	<!-- Edit Modal HTML -->
	<div id="editLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/updateMarker1" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Edit Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="deleteMarker()">&times;</button>
					</div>
					<div class="modal-body">
                        <input type="hidden" id="id_landmark1" name="l_id" value=""/>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="l_name" id="name_landmark" value="" required>
                        </div>

						<div id="mapedit"></div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" name="l_lat" id="lat_landmark" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="l_long" id="long_landmark" value="" required>
                        </div>
                        <div class="form-group">
							<label>Kecamatan</label>
							<select name="l_kec" class="form-control" required>
								<option value="">Pilih Kecamatan</option>
							<?php foreach ($m as $mah) { ?>
								<option value="<?=$mah->id_polygon?>">
									<?=$mah->id_polygon.'/'.$mah->name_polygon?>
								</option>
							<?php } ?>


								</select>
						</div>

                        <div class="form-group">
                            <label>Detail Information</label>
                             <input type="text" class="form-control" name="l_info" id="info_landmark" value="" required>
                        </div>
                       <div class="form-group">
							<label>Kategori</label>
							<select name="l_kate" class="form-control" required>
								<option value="">Pilih Kategori</option>
							<?php foreach ($kategoris as $mah) { ?>
								<option value="<?=$mah->id_kategori?>">
									<?=$mah->id_kategori.'/'.$mah->nama_kategori?>
								</option>
							<?php } ?>


								</select>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="l_foto" id="foto_landmark" value="" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="deleteMarker()"></input>
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/deleteAll">
					<div class="modal-header">
						<h4 class="modal-title">Delete All Landmarks</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete all landmarks?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

    	<!-- Delete Modal HTML -->
	<div id="deleteLandmarkModalID" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/deleteByID" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Delete Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                        <input type="hidden" id="id_landmark" name="l_id" value=""/>
					<div class="modal-body">
						<p>Are you sure you want to delete these landmark?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/css/simplesidebar.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  

  <script type="text/javascript">
    var base_url = "<?=base_url()?>";

    var map = L.map('map').setView([-7.040658720358119, 107.64135932404132], 13);
	map.on('click', addMarker);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

	function addMarker(e){
      // Add marker to map at click location; add popup window
      var latlng = e.latlng.toString();
      var addPopup = latlng;
      var customOptions =
        {
          'maxWidth': '500',
          'className' : 'custom'
        };

      var newMarker = new L.marker(e.latlng).bindPopup(addPopup,customOptions).addTo(map);
    }

	//Map for edit
	var v_long = null;
	var v_lat =  null;
	var myMarker = null;
	var map1 = L.map('mapedit').setView([-7.040658720358119, 107.64135932404132], 9);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	maxZoom: 18,
	}).addTo(map1);

	var icon_bangunan = L.icon({
	iconUrl: base_url+'assets/images/marker.png',
	iconSize: [30,40]
	});

	function getID(data){
        document.getElementById("id_landmark").value = data;
    }

	function getData(id, name, lat, long, info, gambar){
		v_long = parseFloat(long);
		v_lat = parseFloat(lat);

		myMarker = L.marker([v_lat, v_long],{title: "MyPoint", alt: "The Big I", draggable: true, icon:icon_bangunan})
		.addTo(map1)
		.on('dragend', function() {
			var coord = String(myMarker.getLatLng()).split(',');
			console.log(coord);
			lat = coord[0].split('(');
			console.log(lat);
			lng = coord[1].split(')');
			console.log(lng);
			myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
		});

        document.getElementById("id_landmark1").value = id;
        document.getElementById("name_landmark").value = name;
        document.getElementById("lat_landmark").value = lat;
        document.getElementById("long_landmark").value = long;
        document.getElementById("info_landmark").value = info;
		document.getElementById("foto_landmark").value = gambar;
    }

	function deleteMarker(){
		map1.removeLayer(myMarker);
	}

  </script>


</html>
