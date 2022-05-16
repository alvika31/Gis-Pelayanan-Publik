<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Map extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapModel');
		$this->load->model('MapPolygonModel');
		$this->load->library('form_validation');
	}

	public function bangunan_json()
	{
		$this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
		$this->db->join('bangunan_polygon', 'bangunan_polygon.id_polygon = lokasi.id_polygon');
        $data = $this->db->get()->result();
		// $data=$this->db->get('lokasi')->result();
		// $data=$this->db->get('kategori_lokasi')->result();
		echo json_encode($data);
		$data['m']=$this->MapModel->readK();
	}

	//<-Function which used in Map -> 
	public function addMarker(){
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

		$data['nama_tempat'] = $this->input->post('l_name');
		$data['tempat_lat'] = $this->input->post('l_lat'); 
		$data['tempat_long'] = $this->input->post('l_long');
		$data['id_polygon'] = $this->input->post('l_kec');
		$data['keterangan'] = $this->input->post('l_info');
		$data['id_kategori'] = $this->input->post('l_kate');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
		$data['kategoris']=$this->MapModel->readDataKategori();
		
	}

	public function deleteMarker($bangunan_id){
        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updateMarker(){
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

		$data['id_tempat'] = $this->input->post('l_id');
		$data['nama_tempat'] = $this->input->post('l_name');
		$data['tempat_lat'] = $this->input->post('l_lat'); 
		$data['tempat_long'] = $this->input->post('l_long');
		$data['id_polygon'] = $this->input->post('l_kec');
		$data['keterangan'] = $this->input->post('l_info');
		$data['id_kategori'] = $this->input->post('l_kate');
		$data['gambar'] = $foto;
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home'); 
		}
		$data['m']=$this->MapPolygonModel->read();
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Landmark Page ->
	public function addMarker1(){
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

		$data['nama_tempat'] = $this->input->post('l_name');
		$data['tempat_lat'] = $this->input->post('l_lat'); 
		$data['tempat_long'] = $this->input->post('l_long');
		$data['id_polygon'] = $this->input->post('l_kec');
		$data['keterangan'] = $this->input->post('l_info');
		$data['id_kategori'] = $this->input->post('l_kate');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
		$data['kategoris']=$this->MapModel->readDataKategori();
		$data['m']=$this->MapPolygonModel->read();
	}
	
	public function deleteByID(){
		$bangunan_id = $this->input->post('l_id');

        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function deleteAll(){
        $result = $this->MapModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}
	public function readKategori(){
		$data['kategoris']=$this->MapModel->readDataKategori();
		
		$this->load->view('templates/header');
        $this->load->view('maps/list_kategori', $data);
		$this->load->view('templates/footer');
        
	}

	// public function readSpec()
	// {
	// 	$data['lokasi']=$this->MapModel->readJBs($this->input->post('id_kategori'));
		
	// 	$this->load->view('templates/header');
 //        $this->load->view('update_landmark', $data);
	// 	$this->load->view('templates/footer');

		
	// }

	public function deleteKategori($id_kategori){
		$this->MapModel->deleteKategori($id_kategori);
		if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg','<p style="color:green">User succesfully Deleted !</p>');
			}else{
				$this->session->set_flashdata('msg','<p style="color:red">User Delete Failed !</p>');
			}
		redirect('Map/readKategori');
	}
	public function addKategori(){
		if($this->input->post('kirim')) {
			$data['nama_kategori'] = $this->input->post('nama_kategori'); 

	
			$result = $this->MapModel->addKategori($data);
				if($this->db->affected_rows() > 0){
					echo "<script>
								var newHTML = document.createElement ('div');
								newHTML.innerHTML =
								newHTML = document.createElement ('div');
								newHTML.innerHTML = ' <div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
								document.body.appendChild (newHTML);
								$(window).load(function(){
									$('#myModal').modal('show');
								});
							</script>";
						
				}else{
						echo "Insert error !";
				}
	
			redirect('map/readKategori');
			
			
			// $this->load->view('templates/header');
	  //       $this->load->view('users/user_form');
			// $this->load->view('templates/footer');
			
			}else{
				$this->load->view('templates/header');
				$this->load->view('maps/form_add_kategori');
				$this->load->view('templates/footer');
			}
		}
	public function editKategori($id_kategori){
		if($this->input->post('kirim')) {
			$this->MapModel->updateKategori($id_kategori);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg','<p style="color:green">User succesfully Updated !</p>');
			}else{
				$this->session->set_flashdata('msg','<p style="color:red">User Update Failed !</p>');
			}
			redirect('map/readKategori');
		}

		$data['kategori']=$this->MapModel->read_by_kategori($id_kategori);
		$this->load->view('templates/header');
        $this->load->view('maps/form_add_kategori',$data);
		$this->load->view('templates/footer');
	}
	

	public function updateMarker1(){
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

		$data['id_tempat'] = $this->input->post('l_id');
		$data['nama_tempat'] = $this->input->post('l_name');
		$data['tempat_lat'] = $this->input->post('l_lat'); 
		$data['tempat_long'] = $this->input->post('l_long');
		$data['id_polygon'] = $this->input->post('l_kec');
		$data['keterangan'] = $this->input->post('l_info');
		$data['id_kategori'] = $this->input->post('l_kate');
		$data['gambar'] = $foto;
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
		$data['m']=$this->MapPolygonModel->read();
	}

	// Export ke excel
	public function export()
	{
		$data=$this->db->get('lokasi')->result();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Rama - Abhin - Danar')
		->setLastModifiedBy('Rama')
		->setTitle('New Zealand GIS')
		->setSubject('New Zealand GIS Document')
		->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
		->setKeywords('office 2019 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Landmark ID')
		->setCellValue('C1', 'Landmark Name')
		->setCellValue('D1', 'Latitude')
		->setCellValue('E1', 'Longitude')
		->setCellValue('F1', 'Detail Information')
		;

		// Miscellaneous glyphs, UTF-8
		$i=2;
		$no=1; 
		
		foreach($data as $datas) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no)
		->setCellValue('B'.$i, $datas->bangunan_id)
		->setCellValue('C'.$i, $datas->bangunan_nama)
		->setCellValue('D'.$i, $datas->bangunan_lat)
		->setCellValue('E'.$i, $datas->bangunan_long)
		->setCellValue('F'.$i, $datas->keterangan);

		$no++;
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('New Zealand '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="New Zealand.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	//<-Function which used in Landmark Page ->
}