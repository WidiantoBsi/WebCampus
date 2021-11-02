<?php
defined('BASEPATH') or exit ('No Direct Script Access Allowed');

class DBWeb extends CI_Model{
	
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($table,$data,$where){
		$this->db->update($table,$data,$where);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function kosongkan_data($table){
		return $this->db->truncate($table);
	}

	function get_Jurusan(){
		$hasil=$this->db->query("SELECT * FROM jurusan");
		return $hasil;
	}

  function get_Jenjang(){
    $hasil=$this->db->query("SELECT * FROM jenjang");
    return $hasil;
  }

  function get_Dosen(){
    $hasil=$this->db->query("SELECT * FROM dosen");
    return $hasil;
  }

  function get_Mahasiswa(){
    $hasil=$this->db->query("SELECT * FROM mahasiswa");
    return $hasil;
  }

  function get_Ruangan(){
    $hasil=$this->db->query("SELECT * FROM ruangan");
    return $hasil;
  }

  function get_Matakuliah(){
    $hasil=$this->db->query("SELECT * FROM matakuliah");
    return $hasil;
  }

  function Jadwal_Dosen($keyword = null){
    if ($keyword) {
      $this->db->like('NIP', $keyword);
    }
    
    $query = $this->db->get('jadwal')->result();
    return $query;
  }

  function AddNilai($keyword = null){
     if ($keyword) {
      $this->db->like('ID_Matakuliah', $keyword);
    }
    
    $query = $this->db->get('tugas')->result();
    return $query;
  }

  function Jadwal_Siswa($keyword = null){
    if ($keyword) {
      $this->db->like('ID_Jurusan', $keyword);
    }
    
    $query = $this->db->get('jadwal')->result();
    return $query;
  }

  function Tugas_Siswa($keyword = null){
    if ($keyword) {
      $this->db->like('Nim', $keyword);
    }
    
    $query = $this->db->get('tugas')->result();
    return $query;
  }

  function Kode_Tugas(){
      $this->db->select('RIGHT(tugas.ID_Tugas,3) as kode', FALSE);
      $this->db->order_by('ID_Tugas','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('tugas');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $kodejadi = "TGS-".$kodemax;    // hasilnya
      return $kodejadi;
  }

	function kode_Dosen()   {
      $this->db->select('RIGHT(dosen.NIP,2) as kode', FALSE);
      $this->db->order_by('NIP','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('dosen');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $ID = "1404";
      $tgl = date('mY'); //Y-m-d
      $kodejadi = $ID.$tgl.$kodemax;    // hasilnya
      return $kodejadi;  
  }

  function kode_Mahasiswa(){
  	  $this->db->select('RIGHT(mahasiswa.Nim,2) as kode', FALSE);
      $this->db->order_by('Nim','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('mahasiswa');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $ID = "1401";
      $tgl = date('mY'); //Y-m-d
      $kodejadi = $ID.$tgl.$kodemax;    // hasilnya
      return $kodejadi;
  }

  function KodeMatakuliah(){
  	$this->db->select('RIGHT(matakuliah.ID_Matakuliah,3) as kode', FALSE);
  	$this->db->order_by('ID_Matakuliah','DESC');    
  	$this->db->limit(1);    
      $query = $this->db->get('matakuliah');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
      	$data = $query->row();      
      	$kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
      	$kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $kodejadi = "MH-".$kodemax;    // hasilnya
      return $kodejadi;
  }

  function KodeJurusan(){
    $this->db->select('RIGHT(jurusan.ID_Jurusan,3) as kode', FALSE);
    $this->db->order_by('ID_Jurusan','DESC');    
    $this->db->limit(1);    
      $query = $this->db->get('jurusan');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
        $kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $kodejadi = "JS-".$kodemax;    // hasilnya
      return $kodejadi;
  }

  function KodeJenjang(){
    $this->db->select('RIGHT(jenjang.ID_Jenjang,3) as kode', FALSE);
    $this->db->order_by('ID_Jenjang','DESC');    
    $this->db->limit(1);    
      $query = $this->db->get('jenjang');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
        $kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $kodejadi = "AK-".$kodemax;    // hasilnya
      return $kodejadi;
  }

  function KodeRuangan(){
    $this->db->select('RIGHT(ruangan.ID_Ruang,3) as kode', FALSE);
    $this->db->order_by('ID_Ruang','DESC');    
    $this->db->limit(1);    
      $query = $this->db->get('ruangan');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
        $kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 2 menunjukkan jumlah digit 
      $kodejadi = "R".$kodemax;    // hasilnya
      return $kodejadi;
  }

  function KodeJadwal(){
    $this->db->select('RIGHT(jadwal.ID_Jadwal,2) as kode', FALSE);
    $this->db->order_by('ID_Jadwal','DESC');    
    $this->db->limit(1);    
      $query = $this->db->get('jadwal'); //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
        $kode = 1;    
      }
      $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 2 menunjukkan jumlah digit 
      $tgl = date('mY'); //Y-m-d
      $kodejadi = $tgl.$kodemax;    // hasilnya
      return $kodejadi;
  }

}
