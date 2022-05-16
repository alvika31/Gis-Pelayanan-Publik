<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {

  public function __construct()
	{
    parent::__construct();
    $this->load->model('MapModel','MapModel');
    $this->load->model('MapPolygonModel','MapPolygonModel');
    $this->load->model('Users_model','Users_model');
  }

  public function v_home(){

		
    $level = $this->session->userdata('level');
     $data['kategoris']  = $this->MapModel->readDataKategori();
     $data['polygons']  = $this->MapModel->readDataPolygon();
     $data['m']  = $this->MapModel->readK();
		

    $result = $this->Users_model->get();

    $this->load->view('templates/header');
    $this->load->view('maps/list_maps', $data);
    $this->load->view('templates/footer');

  //   $data['users'] = $result;

  //   if($level == 'Admin'){
  //     $this->load->view('templates/header');
  //     $this->load->view('v_home', $data);
  //     $this->load->view('templates/footer');
  //   }
  //   else if($level == 'operator'){
  //     $this->load->view('templates/header');
  //     $this->load->view('v_home_operator', $data);
  //     $this->load->view('templates/footer');
  //   }
  //   else{
  //     $this->load->view('templates/header');
  //     $this->load->view('v_home_operator', $data);
  //     $this->load->view('templates/footer');
  //   }
  // }
  }

  public function update_landmark($id){
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['m']  = $this->MapModel->readK();
    $result = $this->MapModel->getbyID($id);
    $data['id'] = $result->id_tempat;
    $data['name'] = $result->nama_tempat;
    $data['lat'] = $result->tempat_lat;
    $data['long'] = $result->tempat_long;
    $data['info'] = $result->keterangan;
    $data['photo'] = $result->gambar;

    $this->load->view('templates/header');
    $this->load->view('update_landmark', $data);
    $this->load->view('templates/footer');
  }

  public function update_landmark_polygon($id){
    $result = $this->MapPolygonModel->getbyID($id);

    $data['id'] = $result->id_polygon;
    $data['name'] = $result->name_polygon;
    $data['coordinates'] = $result->coordinates;
    $data['info'] = $result->information;
    $data['photo'] = $result->photo;

    $this->load->view('templates/header');
    $this->load->view('update_landmark_polygon', $data);
    $this->load->view('templates/footer');
  }

  public function data_user(){
    $level = $this->session->userdata('level');
    $result = $this->Users_model->get();
    $data['user'] = $result;

    if($level == 'Admin'){
    redirect('user');
    }
  }

  public function data_landmark(){
    $level              = $this->session->userdata('level');
    $data['landmark']   = $this->MapModel->get();
    $data['kategoris']  = $this->MapModel->readDataKategori();
    $data['m']  = $this->MapModel->readK();

    if($level == 'Admin'){
      $this->load->view('templates/header');
      $this->load->view('data_landmark', $data);
      $this->load->view('templates/footer');
    }
    else if($level == 'operator')
    {
      $this->load->view('data_landmark_operator', $data);
    }
  }

  public function data_landmark_polygon(){
    // $level = $this->session->userdata('level');
    $result = $this->MapPolygonModel->get();
    $data['landmark'] = $result;
    $this->load->view('templates/header');
    $this->load->view('maps/list_polygon', $data);
    $this->load->view('templates/footer');

    // if($level == 'Admin'){
    //   $this->load->view('data_landmark_polygon', $data);
    // }
    // else if($level == 'operator')
    // {
    //   $this->load->view('data_landmark_polygon_operator', $data);
    // }
  }

  public function profile(){
    $level = $this->session->userdata('level');
    $result = $this->Users_model->getbyID();
    $data['id'] = $result->user_id;
    $data['username'] = $result->username;
    $data['password'] = $result->password;
    $data['name'] = $result->name;
    $data['level'] = $result->level;

    if($level == 'regular'){
      $this->load->view('profile', $data);
    }
  }
}
