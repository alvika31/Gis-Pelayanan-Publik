<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>
    <title>Web GIS</title>

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
      <form action="<?=base_url()?>index.php/map/updateMarker" method="POST" class="forms-sample" enctype="multipart/form-data">
        <div class="banner">
          <h1>Lokasi Update Form</h1>
        </div>
            <input type="hidden" name="l_id" value="<?php echo $id ?>" />

            <div class="form-group">
            <label for="exampleInputUsername1">Nama Landmark</label>
            <input type="text" name="l_name"  class="form-control" value="<?php echo $name ?>" required />
            </div>

            <div class="form-group">
              <label for="exampleInputUsername1">Choose coordinate</label>
               
              <div id="mapid"></div> 
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Latitude</label>
            <input type="text" name="l_lat" class="form-control" value="<?php echo $lat ?>" id="lat_landmark" required/>
            </div>


            <div class="form-group">
            <label for="exampleInputUsername1">Longitude</label>
            <input type="text" name="l_long" class="form-control" value="<?php echo $long ?>" id="long_landmark" required/>
            </div>

            <div class="form-group">
               <label for="exampleInputUsername1">Kecamatan</label>
              <select name="l_kec" class="form-control" required>
                <option value="">Pilih Kecamatan</option>
              <?php foreach ($m as $mah) { ?>
                <option value="<?=$mah->id_polygon?>">
                  <?=$mah->id_polygon.'/'.$mah->name_polygon?>
                </option>
              <?php } ?>
               </select>

            <div class="form-group">
            <label for="exampleInputUsername1">Detail info</label>
            <input type="text" name="l_info" class="form-control" value="<?php echo $info ?>" required/>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Foto</label>
            <input type="file" name="l_foto"  value="" required/>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Kategori</label>
            <select name="l_kate" class="form-control" required>
								<option value="">Pilih Kategori</option>
							<?php foreach ($kategoris as $mah) { ?>
								<option value="<?=$mah->id_kategori?>">
									<?=$mah->id_kategori.'/'.$mah->nama_kategori?>
								</option>
							<?php } ?>


								</select>
            </div>
        <div class="btn-block">
          <button type="submit" class="btn-primary" href="/">APPLY</button>
        </div>
      </form>
    </div>
  </div>  
  </body>
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  
  <script type="text/javascript">
    var base_url = "<?=base_url()?>";
    var v_lat = parseFloat(<?php echo $lat ?>);
    var v_long = parseFloat(<?php echo $long ?>);

    var map = L.map('mapid').setView([v_lat, v_long], 13);

    var icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/marker.png',
      iconSize: [30,40]
    });

    var myMarker = L.marker([v_lat, v_long],{title: "MyPoint", alt: "The Big I", draggable: true, icon:icon_bangunan})
		.addTo(map)
		.on('dragend', function() {
			var coord = String(myMarker.getLatLng()).split(',');
			console.log(coord);
			lat = coord[0].split('(');
			console.log(lat);
			lng = coord[1].split(')');
			console.log(lng);
			myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
		});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);
    
  </script>

   <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>