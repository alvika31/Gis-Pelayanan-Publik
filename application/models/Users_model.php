<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct(){
        parent::__construct();
        $this->load->helper('string');
    }

   
    
    public function read()
		{
			$query=$this->db->get('users');
				
		}
		

	public function read_by($userid)
	{

		$this->db->where('user_id', $userid);
		$query=$this->db->get('users');
		return $query->row();
	}

 	public function getbyID(){
        $id = $this->session->userdata('id');
        $this->db->where(['user_id' => $id]);
        $result = $this->db->get('users')->row();
        return $result;
    }

	 public function get(){
        $result = $this->db->get('users')->result();
        return $result;
    }

	
	public function addUser($data){
        $result = $this->db->insert('users',$data);
        return $result;
    }

	 public function getbyUsername($username){
        $this->db->where(['username' => $username]);
        $result = $this->db->get('users')->row();
        return $result;
    }

		
		 public function register($data)
    {
        $result = $this->db->insert('users',$data);
        return $result;
    }

	public function update($userid)
	{
		$data = array (
			'username' => $this->input->post('username'),
			'level' => $this->input->post('level'),
			'email' => $this->input->post('email')
		);
		$this->db->where('user_id',$userid);
		$this->db->update('users',$data);
	}
	

	public function delete($userid)
	{
		$this->db->where('user_id',$userid);
		$this->db->delete('users');
	}
}