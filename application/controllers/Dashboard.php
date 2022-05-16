<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->library('form_validation');
	}

    public function index(){

        $data['total_lokasi'] = $this->Dashboard_model->hitungJumlahLokasi();
        $data['total_kategori'] = $this->Dashboard_model->hitungJumlahKategori();
        $data['total_user'] = $this->Dashboard_model->hitungJumlahUser();

        $this->load->view('templates/header');
        $this->load->view('dashboard', $data);
		$this->load->view('templates/footer');

    }



}