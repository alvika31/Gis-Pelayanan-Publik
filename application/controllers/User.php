<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('session');
		$this->load->database();
	}
	
	//Home User
    public function index()
	{
		$data['users']=$this->Users_model->read();
		
		$this->load->view('templates/header');
        $this->load->view('users/user_list', $data);
		$this->load->view('templates/footer');
        
	}
	
	//tambah
	public function add()
	{
		if($this->input->post('kirim')) {
		$data['username'] = $this->input->post('username'); 
		$data['password'] = md5($this->input->post('password'));
        $data['email'] = $this->input->post('email');
        $data['level'] = $this->input->post('level');

		$result = $this->Users_model->addUser($data);
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

		redirect('user');
		
		
		// $this->load->view('templates/header');
  //       $this->load->view('users/user_form');
		// $this->load->view('templates/footer');
        
		}else{
			$this->load->view('templates/header');
	        $this->load->view('users/user_form');
			$this->load->view('templates/footer');
		}
	}

	public function edit($userid)
	{
		if($this->input->post('kirim')) {
			$this->Users_model->update($userid);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg','<p style="color:green">User succesfully Updated !</p>');
			}else{
				$this->session->set_flashdata('msg','<p style="color:red">User Update Failed !</p>');
			}
			redirect('user');
		}

		$data['user']=$this->Users_model->read_by($userid);
		$this->load->view('templates/header');
        $this->load->view('users/user_form',$data);
		$this->load->view('templates/footer');
		
		
	}

	public function delete($userid)
	{
		$this->Users_model->delete($userid);
		if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg','<p style="color:green">User succesfully Deleted !</p>');
			}else{
				$this->session->set_flashdata('msg','<p style="color:red">User Delete Failed !</p>');
			}
		redirect('User');
	}

}