<link rel="stylesheet" href="<?=base_url('')?>leaflet-search/src/leaflet-search.css">
<style type="text/css">
  

    #mapid {
        height: 400px;
        z-index: 3;
        border-radius: 25px;
        }
</style>


<div class="jumbotron" style="padding: 50px;">
    <h1 class="display-4" style="font-weight: 700">Data Pelayanan Publik</h1>
        <p class="lead"  style="font-weight: 500">Informasi pelayanan publik Kabupaten Bandung</p>
    <hr class="my-4">
</div>
<div class="container">
    <div class="row align-items-start">

        <div class="col">
        <div id="mapid"></div>
        </div>


    </div>
    <br>
  <div class="row align-items-start">
    
    <div class="col">
    <div class="table-responsive">
			<div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $kantorpos1?></h5>
                    <p class="card-text"> Diatas adalah banyaknya Data Pelayanan Kantor Pos di Kabupaten Bandung</p>
                    <a href="<?=base_url('front/dataPelayanan')?>" class="btn btn-primary">Info Detail</a>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $kantorpolisi1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Kantor Polisi di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/kantorpolisi')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rumahsakit1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Rumah Sakit di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/rumahsakit')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $hotel1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Hotel di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/hotel')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $masjid1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Masjid di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/mesjid')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $puskesmas1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Puskesmas di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/puskesmas')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $terminal1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Terminal di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/terminal')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $stasiun1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Stasiun di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/stasiun')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $kantorkec1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Kantor Kecamatan di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/kantorkecamatan')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $kantordes1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Kantor Desa di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/kantordesa')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $katoradm1?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan Kantor Administrasi di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/ksad')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

          <div class="col">
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_lokasi?></h5>
                    <p class="card-text">Diatas adalah banyaknya Data Pelayanan di Kabupaten Bandung</p>
                    <a href="<?=base_url('Front/filterMap')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
        
        
    </div>
			
        </div>
    </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  <script src="<?=base_url()?>assets/leaflet-kml-master/L.KML.js"></script>
  <script src="<?=base_url()?>leaflet-search/src/leaflet-search.js"></script>



    <script>
    
    var map = L.map('mapid').setView([-7.040658720358119, 107.64135932404132], 10);


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
 

</script>
</body>
</html>