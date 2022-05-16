<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
        $this->load->model('MapModel');
        $this->load->model('MapPolygonModel');
	}

    public function index(){

        $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();        
        $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
        $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
        $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
        $data['lks'] = $this->MapModel->readLokasi();
        $data['kategoris']=$this->MapModel->readDataKategori();
       
            

        $this->load->view('frontend/header');
        $this->load->view('frontend/home', $data);
        $this->load->view('frontend/footer');
    }

  public function dataPelayanan($kec = null){
    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark']   = $this->MapModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['m']  = $this->MapModel->readK();

    $this->load->view('frontend/header');
    $this->load->view('frontend/pelayanan_umum', $data);
    $this->load->view('frontend/footer');


  }
  public function dataKecamatan(){

    
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    
    $this->load->view('frontend/header');
    $this->load->view('frontend/data_kecamatan', $data);
    $this->load->view('frontend/footer');


  }

  public function filterMap($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    
    
    $this->load->view('frontend/filterMap', $data);


  }

  public function filterMap_filtered($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kec'] = $kec;
    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);    
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['spec']  = $this->MapModel->readSpec($kec);
    
    
    $this->load->view('frontend/filterMap_filtered', $data);


  }


  public function kantorpolisi($kec = null){

     $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['polisi']  = $this->MapModel->readPolisi();
    
    
    $this->load->view('frontend/kantorpolisi', $data);


  }
  public function kantorpos($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['pos']  = $this->MapModel->readPos();
    
    
    $this->load->view('frontend/kantorpos', $data);


  }

  public function rumahsakit($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['rumahsakit']  = $this->MapModel->readRumahsakit();
    
    
    $this->load->view('frontend/rumahsakit', $data);


  }

  public function hotel($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['hotel']  = $this->MapModel->readHotel();
    
    
    $this->load->view('frontend/hotel', $data);


  }

  public function mesjid($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['mesjid']  = $this->MapModel->readMesjid();
    
    
    $this->load->view('frontend/mesjid', $data);


  }

  public function puskesmas($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['puskesmas']  = $this->MapModel->readPuskesmas();
    
    
    $this->load->view('frontend/puskesmas', $data);


  }

  public function terminal($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['terminal']  = $this->MapModel->readTerminal();
    
    
    $this->load->view('frontend/terminal', $data);


  }

  public function stasiun($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['stasiun']  = $this->MapModel->readStasiun();
    
    
    $this->load->view('frontend/stasiun', $data);


  }

  public function kantorkecamatan($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['kantorkecamatan']  = $this->MapModel->readKantorkecamatan();
    
    
    $this->load->view('frontend/kantorkecamatan', $data);


  }

  public function kantordesa($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['kantordesa']  = $this->MapModel->readKantordesa();
    
    
    $this->load->view('frontend/kantordesa', $data);


  }

  public function ksad($kec = null){

    $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();

    $data['kantorpolisi1'] = $this->Dashboard_model->kantorpolisi($kec);
    $data['rumahsakit1'] = $this->Dashboard_model->rumahsakit($kec);
    $data['kantorpos1'] = $this->Dashboard_model->kantorpos($kec);
    $data['hotel1'] = $this->Dashboard_model->hotel($kec);
    $data['masjid1'] = $this->Dashboard_model->masjid($kec);
    $data['puskesmas1'] = $this->Dashboard_model->puskesmas($kec);
    $data['terminal1'] = $this->Dashboard_model->terminal($kec);
    $data['stasiun1'] = $this->Dashboard_model->stasiun($kec);
    $data['kantorkec1'] = $this->Dashboard_model->kantorkec($kec);
    $data['kantordes1'] = $this->Dashboard_model->kantordes($kec);
    $data['katoradm1'] = $this->Dashboard_model->katoradm($kec);

    $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
    $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();
    $data['total_polygon'] = $this->Dashboard_model->hitungJumlahPolygon();
    $data['lks'] = $this->MapModel->readLokasi();
    $data['kategoris']=$this->MapModel->readDataKategori();
    $data['landmark'] = $this->MapPolygonModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['polygons']  = $this->MapModel->readDataPolygon();
    $data['m']  = $this->MapModel->readK();
    $data['ksad']  = $this->MapModel->readKsad();
    
    
    $this->load->view('frontend/ksad', $data);


  }




}