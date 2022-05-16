<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Marker extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Marker_model', '', TRUE);
		$this->load->helper(array('url'));
		
	}

    public function index()
    {
        $data['join2'] = $this->Marker_model->duatable(); 
        $this->load->view('templates/header');
        $this->load->view('marker/list_marker', $data);
        $this->load->view('templates/footer');
    }

}
    ?>