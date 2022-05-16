<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MapPolygon extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapPolygonModel');
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
		
	}

	public function getPolygon($kec = null){
		
		if(isset($kec)){
			$this->db->get('bangunan_polygon');
			$this->db->where('name_polygon', $kec);
			$data= $this->db->row();
		}else{
			$data=$this->db->get('bangunan_polygon')->result();
		}
		
		echo json_encode($data);
	}

    //<-Function which used in Map -> 
	public function addPolygon(){
        $foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['name_polygon'] = $this->input->post('l_name');
		$data["coordinates"] = $this->input->post('coordinates');
		$data['information'] = $this->input->post('l_info');
		$data['photo'] = $foto;

		$result = $this->MapPolygonModel->addPolygon($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function deletePolygon($polygon_id){
        $result = $this->MapPolygonModel->deletePolygon($polygon_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updatePolygon(){
        $foto = $_FILES['l_foto'];
		if($foto['name'] == ''){
			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}

			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			$data['photo'] = $foto;
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}
		}
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Polygon Page ->
	public function addPolygon1(){
		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $nmfile;
		$this->upload->initialize($config);

		$name_polygon = $this->input->post('l_name');
		$coordinates= $this->input->post('coordinates');
		$information= $this->input->post('l_info');
		
		if(!empty($_FILES) && $_FILES['l_foto']['name'] > 0 && $_FILES['l_foto']['error'] == 0)
		{
			if ($this->upload->do_upload('l_foto')){
				$gbr = $this->upload->data();
					$data = $gbr['file_name'];
					$query = "INSERT INTO bangunan_polygon (
					id_polygon,name_polygon,coordinates,
					information,photo
					)VALUES
					(NULL, '".$name_polygon."','".$coordinates."',
					'".$information."', '".$data."')";
					$simpandapolygon = $this->db->query($query);
					$this->session->set_flashdata('Sukses', "

				
						");
					redirect('page/data_landmark_polygon');
					}else{
					$this->session->set_flashdata('Sukses', "

					
					");
					redirect('page/data_landmark_polygon');
			}
		}else{
			
			$this->load->view('templates/header');
	        $this->load->view('maps/form_add_polygon');
			$this->load->view('templates/footer');
			}
			

		// $foto = $_FILES['l_foto'];
		// if($foto == ''){

		// }else{
		// 	$config['upload_path']          = './assets/uploads/';
		// 	$config['allowed_types']        = 'gif|jpg|png';
			
		// 	$this->load->library('upload', $config);
		// 	if ($this->upload->do_upload('l_foto')) {
		// 		$foto = $this->upload->data("file_name");
		// 	}else{
		// 		echo "upload gagal";
		// 	}
		// }

		// $data['name_polygon'] = $this->input->post('l_name');
		// $data["coordinates"] = $this->input->post('coordinates');
		// $data['information'] = $this->input->post('l_info');
		// $data['photo'] = $foto;

		// $result = $this->MapPolygonModel->addPolygon($data);
		// if($result){
		//     redirect('page/data_landmark_polygon');
		// }else{
        //     echo '<script>alert("Region already added");</script>';
		//     redirect('page/data_landmark_polygon');
		// }
	}
	
	public function deleteByID(){
		$polygon_id = $this->input->post('l_id');

        $result = $this->MapPolygonModel->deletePolygon($polygon_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}
	}

	public function deleteAll(){
        $result = $this->MapPolygonModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon_polygon');
		}
	}

	public function updatePolygon1(){
        $foto = $_FILES['l_foto'];
		if($foto['name'] == ''){
			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark_polygon');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark_polygon'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}

			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			$data['photo'] = $foto;
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark_polygon');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark_polygon'); 
			}
		}
	}

	// Export ke excel
	

	
	//<-Function which used in Landmark Page ->
}