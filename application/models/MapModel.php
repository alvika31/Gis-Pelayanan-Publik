<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MapModel extends CI_Model {
    
    public function get()
    {
        // $this->db->select('*');
        // $this->db->from('lokasi');   
        // $query = $this->db->get();
        // return $query;

        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
         $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
        $query = $this->db->get();
        return $query->result();
    }

    public function readSpec($kec){                
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
        $this->db->where('bangunan_polygon.id_polygon', $kec);
        $query = $this->db->get();
        return $query->result();
    }
    

    public function getbyID($bangunan_id)
    {
        $this->db->where(['id_tempat' => $bangunan_id]);
        $result = $this->db->get('lokasi')->row();
        return $result;
    }

    public function addMarkers($data)
    {
        $result = $this->db->insert('lokasi',$data);
        return $result;
    }

    public function deleteMarkers($bangunan_id)
    {
        $result = $this->db->delete('lokasi', array('id_tempat' => $bangunan_id)); 
        return $result;
    }

    public function deleteAll()
    {
        $result = $this->db->truncate('lokasi'); 
        return $result;
    }

    public function updateMarkers($data)
    {
        $result = $this->db->update('lokasi', $data, array('id_tempat' => $data['id_tempat']));
        return $result;
    }
    public function readDataKategori(){
        $query=$this->db->get('kategori_lokasi');
		return $query->result();
    }
    public function readDataPolygon(){
        $query=$this->db->get('bangunan_polygon');
		return $query->result();
    }

    public function addKategori($data){
        $result = $this->db->insert('kategori_lokasi',$data);
        return $result;
    }
    public function deleteKategori($id_kategori){
        $this->db->where('id_kategori',$id_kategori);
		$this->db->delete('kategori_lokasi');

    }
    public function read_by_kategori($id_kategori)
	{

		$this->db->where('id_kategori', $id_kategori);
		$query=$this->db->get('kategori_lokasi');
		return $query->row();
	}
    public function updateKategori($id_kategori)
	{
		$data = array (
			'nama_kategori' => $this->input->post('nama_kategori'),
			
		);
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori_lokasi',$data);
	}

    public function readJBs($id_kategori){
        $this->db->select(' kategori_lokasi.id_kategori,
                            kategori_lokasi.nama_kategori, 
                            lokasi.id_tempat,
                            lokasi.nama_tempat,
                            lokasi.tempat_lat,
                            lokasi.tempat_long,
                            lokasi.keterangan,
                            lokasi.gambar,
                            lokasi.id_kategori');
        $this->db->from('kategori_lokasi');
        $this->db->join('lokasi', 'kategori_lokasi.id_kategori = lokasi.id_kategori');
        $this->db->where('lokasi.id_kategori',$id_kategori);
        $query = $this->db->get();
        return $query->result();
    }

    public function readK($kec = null){
            $this->db->group_by('bangunan_polygon.name_polygon');
            $query=$this->db->get('bangunan_polygon');
            if(isset($kec)){
                $this->db->where('bangunan_polygon.id_polygon', $kec);      
            }
            return $query->result();
        }
    
        public function readLokasi($kec = null){
            
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
        if(isset($kec)){
            $this->db->where('bangunan_polygon.id_polygon', $kec);      
        }
        $query = $this->db->get();
        return $query->result();
        }

        public function readPolisi($kec = null){
                  
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
        $this->db->where('kategori_lokasi.id_kategori', '2');
        if(isset($kec)){
            $this->db->where('bangunan_polygon.id_polygon', $kec);      
        }
        $query = $this->db->get();
            return $query->result();
            }

            public function readPos($kec = null){
                  
                $this->db->select('*');
                $this->db->from('lokasi');
                $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                $this->db->where('kategori_lokasi.id_kategori', '1');
                if(isset($kec)){
                    $this->db->where('bangunan_polygon.id_polygon', $kec);      
                }
                $query = $this->db->get();
                    return $query->result();
                    }

                    public function readRumahsakit($kec = null){
                  
                        $this->db->select('*');
                        $this->db->from('lokasi');
                        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                        $this->db->where('kategori_lokasi.id_kategori', '4');
                        if(isset($kec)){
                            $this->db->where('bangunan_polygon.id_polygon', $kec);      
                        }
                        $query = $this->db->get();
                            return $query->result();
                            }
            
                            public function readHotel($kec = null){
                  
                                $this->db->select('*');
                                $this->db->from('lokasi');
                                $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                $this->db->where('kategori_lokasi.id_kategori', '5');
                                if(isset($kec)){
                                    $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                }
                                $query = $this->db->get();
                                    return $query->result();
                                    }

                                    public function readMesjid($kec = null){
                  
                                        $this->db->select('*');
                                        $this->db->from('lokasi');
                                        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                        $this->db->where('kategori_lokasi.id_kategori', '6');
                                        if(isset($kec)){
                                            $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                        }
                                        $query = $this->db->get();
                                            return $query->result();
                                            }

                                            public function readPuskesmas($kec = null){
                  
                                                $this->db->select('*');
                                                $this->db->from('lokasi');
                                                $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                $this->db->where('kategori_lokasi.id_kategori', '7');
                                                $query = $this->db->get();
                                                if(isset($kec)){
                                                    $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                }
                                                    return $query->result();
                                                    }

                                                    public function readTerminal($kec = null){
                  
                                                        $this->db->select('*');
                                                        $this->db->from('lokasi');
                                                        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                        $this->db->where('kategori_lokasi.id_kategori', '8');
                                                        if(isset($kec)){
                                                            $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                        }
                                                        $query = $this->db->get();
                                                            return $query->result();
                                                            }

                                                            public function readStasiun($kec = null){
                  
                                                                $this->db->select('*');
                                                                $this->db->from('lokasi');
                                                                $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                                $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                                $this->db->where('kategori_lokasi.id_kategori', '9');
                                                                if(isset($kec)){
                                                                    $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                                }
                                                                $query = $this->db->get();
                                                                    return $query->result();
                                                                    }
                                                                    public function readKantorkecamatan($kec = null){
                  
                                                                        $this->db->select('*');
                                                                        $this->db->from('lokasi');
                                                                        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                                        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                                        $this->db->where('kategori_lokasi.id_kategori', '10');
                                                                        if(isset($kec)){
                                                                            $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                                        }
                                                                        $query = $this->db->get();
                                                                            return $query->result();
                                                                            }

                                                                            public function readKantordesa($kec = null){
                  
                                                                                $this->db->select('*');
                                                                                $this->db->from('lokasi');
                                                                                $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                                                $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                                                $this->db->where('kategori_lokasi.id_kategori', '11');
                                                                                if(isset($kec)){
                                                                                    $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                                                }
                                                                                $query = $this->db->get();
                                                                                    return $query->result();
                                                                                    }

                                                                                    public function readKsad($kec = null){
                  
                                                                                        $this->db->select('*');
                                                                                        $this->db->from('lokasi');
                                                                                        $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
                                                                                        $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
                                                                                        $this->db->where('kategori_lokasi.id_kategori', '13');
                                                                                        if(isset($kec)){
                                                                                            $this->db->where('bangunan_polygon.id_polygon', $kec);      
                                                                                        }
                                                                                        $query = $this->db->get();
                                                                                            return $query->result();
                                                                                            }




}       