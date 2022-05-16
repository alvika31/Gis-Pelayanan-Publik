<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marker_model extends CI_Model {


	public function duatable() {
        $this->db->select('*');
        $this->db->from('kategori_lokasi');
        $this->db->join('lokasi','lokasi.id_kategori=kategori_lokasi.id_kategori');
        $query = $this->db->get();
        return $query->result();
       }

    }