<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model {

    public function hitungJumlahLokasi(){
        $query = $this->db->get('lokasi');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }
    public function hitungJumlahKategori(){
        $query = $this->db->get('kategori_lokasi');
        if($query->num_rows()>=0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function hitungJumlahUser(){
        $query = $this->db->get('users');
        if($query->num_rows()>= 0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function hitungJumlahPolygon(){
      $query = $this->db->get('bangunan_polygon');
      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

 
  public function kantorpolisi($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '2');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();
      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function kantorpos($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '1');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function rumahsakit($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '4');      
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function hotel($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '5');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function masjid($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '6');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function puskesmas($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '7');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function terminal($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '8');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function stasiun($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '9');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();

      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function kantorkec($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '10');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();
      
      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function kantordes($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '11');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();
      
      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

   public function katoradm($kec = null){
      $this->db->select('*');
      $this->db->from('lokasi');
      $this->db->join('kategori_lokasi','kategori_lokasi.id_kategori=lokasi.id_kategori');
      $this->db->join('bangunan_polygon','bangunan_polygon.id_polygon=lokasi.id_polygon');
      $this->db->where('kategori_lokasi.id_kategori', '13');
      
      if(isset($kec)){
        $this->db->where('bangunan_polygon.id_polygon', $kec);      
      }

      $query = $this->db->get();
      
      if($query->num_rows()>= 0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  }

 

}

?>



    
    
        
    
    
