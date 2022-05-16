
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
    <link rel="stylesheet" href="<?=base_url('')?>leaflet-sidebar-master/src/L.Control.Sidebar.css" />
    <link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url('')?>leaflet-search/src/leaflet-search.css">
    <!--[if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif]-->

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html, body, #map {
            height: 100%;
        }

        .lorem {
            font-style: italic;
            color: #AAA;
        }
    </style>
</head>
<body>
    <div id="sidebar-left">
        <h2>Filter Maps</h2>
        <br>
        
        <div class="container">
          <frame id="sideFrame">
          <div class="row">
           
            <div class="col-5">
              <a href="<?=base_url('Front/filterMap')?>" class="btn btn-primary btn-sm" style="color: white">Semua Kategori</a>
            </div>

            <div class="col-5">
              <button class="btn btn-success btn-sm" style="color: white; font-size: 13px;" onclick="history.back()">Unfilter</button>
            </div>
          </div>

          <br>
              <?php if($kantorpolisi1 > 0){ ?>
              <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Kantor Polisi</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/kantor_polisi.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Kantor Polisi yang berada di Kabupaten Bandung Sebanyak <b><?php echo $kantorpolisi1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/kantorpolisi')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>
                      </div>
                </div>
              </div>
              <?php } ?> 
          
          <?php if($rumahsakit1 > 0){ ?>
          <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Rumah Sakit</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/hospital.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Rumah Sakit yang berada di Kabupaten Bandung Sebanyak <b><?php echo $rumahsakit1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/rumahsakit')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
            <?php } ?>          
          
          <?php if($hotel1 > 0){ ?>
           <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Hotel</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/hotel.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Hotel yang berada di Kabupaten Bandung Sebanyak <b><?php echo $hotel1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/hotel')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

          <?php if($masjid1 > 0){ ?>
           <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Masjid</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/masjid.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Masjid yang berada di Kabupaten Bandung Sebanyak <b><?php echo $masjid1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/mesjid')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

            <?php if($puskesmas1 > 0){ ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Puskesmas</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/puskesmas.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Puskesmas yang berada di Kabupaten Bandung Sebanyak <b><?php echo $puskesmas1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/puskesmas')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

            <?php if($terminal1 > 0){ ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Terminal</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/terminal.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Terminal yang berada di Kabupaten Bandung Sebanyak <b><?php echo $terminal1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/terminal')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

              <?php if($stasiun1 > 0){ ?>
              <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Stasiun</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/station.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Stasiun yang berada di Kabupaten Bandung Sebanyak <b><?php echo $stasiun1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/stasiun')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div> 
              <?php } ?>              

              <?php if($kantorkec1 > 0){ ?>
              <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Kantor Kecamatan</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/kecamatan.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Kantor Kecamatan yang berada di Kabupaten Bandung Sebanyak <b><?php echo $kantorkec1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/kantorkecamatan')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

              <?php if($kantordes1 > 0){ ?>
             <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Kepala Desa</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/kepala_desa.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Kantor Kepala Desa yang berada di Kabupaten Bandung Sebanyak <b><?php echo $kantordes1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/kantordesa')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   

              <?php if($katoradm1 > 0){ ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Kantor Administrasi</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/administrasi.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Kantor Administrasi yang berada di Kabupaten Bandung Sebanyak <b><?php echo $katoradm1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/ksad')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
              <?php } ?>   
          
          <?php if($kantorpos1 > 0){ ?>
           <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Kantor Pos</h5>
                      <div class="col-1" >
                         <img src="<?=base_url()?>assets/images/post-office.png" width="50px"  alt="">
                      </div>
                     <p class="card-text"> Data pelayanan Kantor Pos yang berada di Kabupaten Bandung Sebanyak <b><?php echo $kantorpos1?></b>.</p>
                     <div class="col-5">
                        <a href="<?=base_url('Front/kantorpos')?>" class="btn btn-success btn-sm" style="color: white; margin-left: 180px">Details</a>

                      </div>
                </div>
              </div>
            </frame>
          </div>
          <?php } ?>   
      </div>
    </div>

   

    <div id="map"></div>

   

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <script src="<?=base_url('')?>leaflet-sidebar-master/src/L.Control.Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  <script src="<?=base_url()?>assets/leaflet-kml-master/L.KML.js"></script>
  <script src="<?=base_url()?>leaflet-search/src/leaflet-search.js"></script>


    <script>
        var map = L.map('map');
        map.setView([-7.040658720358119, 107.64135932404132], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  maxZoom: 100
}).addTo(map);
        var leftSidebar = L.control.sidebar('sidebar-left', {
            position: 'left',
            closeButton: false,
            autoPan: false
        });
        map.addControl(leftSidebar);
         leftSidebar.toggle();
         var base_url = "<?=base_url()?>";


         var data = [
        <?php foreach($spec as $key => $value) { ?>
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
          var customPopup   = "<center><h5><b>Kecamatan Informasi</b></h5></center>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].photo+"' alt='map photo' width='300px'/>"+"<br><b><p style='weight: 700; font-size: 20px; font-family: poppins'>Name:"+result[i].name_polygon+"</p></b>"+"<h7>Detail :"+result[i].information+" </h7><br/>";

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
