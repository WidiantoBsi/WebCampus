<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmMahasiswa extends CI_Controller {
	function __construct(){
	parent::__construct();
	if($this->session->userdata('status')!= "Mahasiswa"){
      redirect(base_url().'Logout');
    }
}

	function index(){
		$Id = $this->session->userdata('ID');
		$where = array('Nim' => $Id);
		$DB = $this->DBWeb->edit_data($where,'mahasiswa')->result();
			foreach ($DB as $b) {
				$Jurusan = $b->ID_Jurusan;
			}
		$data['Jadwal'] = $this->DBWeb->Jadwal_Siswa($Jurusan);
		$this->load->view('PageSiswa/Header');
		$this->load->view('PageSiswa/HeaderID');
		$this->load->view('PageSiswa/Jadwal',$data);
		$this->load->view('Footer');
	}

	function DBNilai(){
		$Id = $this->session->userdata('ID');
		$data['Nim'] = $Id;
		$data['Tugas'] = $this->DBWeb->Tugas_Siswa($Id); //Data Nila mahasiswa
		$data['Matakuliah'] = $this->DBWeb->get_Matakuliah(); // Data Matakuliah
		$data['IdTugas'] = $this->DBWeb->Kode_Tugas();
		$this->load->view('PageSiswa/Header');
		$this->load->view('PageSiswa/HeaderID',$data);
		$this->load->view('PageSiswa/Nilai',$data);
		$this->load->view('Footer');
	}

	function AddTugas(){
		$ID = $this->input->post('ID');
		$Matkul = $this->input->post('Matkul');
		$Nim = $this->input->post('Nim');
		$Judul = $this->input->post('Judul');
		$Ket = '1';

		$config['upload_path'] = 'assets/upload/';
        $config['allowed_types'] = 'pdf|zip|rar';
        $config['max_size'] = '5120'; // 5Gb
        $config['file_name'] = 'TGS'.time();

        $this->load->library('upload',$config);
        if($this->upload->do_upload('File')){
        	$image = $this->upload->data();
        $data = array(
			'ID_Tugas' => $ID,
			'ID_Matakuliah' => $Matkul,
			'Nim' => $Nim,
			'Judul' => $Judul,
			'Keterangan' => $Ket,
			'Berkas' => $image['file_name']
		);
		$this->DBWeb->insert_data($data,'tugas');
		redirect(base_url().'Nilai');
		}else{
		$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format pdf, zip, rar dan ukuran max 5120Kb/5Gb');
		redirect(base_url().'Nilai');	
		}
	}

	function HapusTugas(){
		$id = $this->input->post('ID');
		$where = array('ID_Tugas' => $id);
		$db = $this->DBWeb->edit_data($where,'tugas')->result();
		foreach ($db as $row){ //Hapus File di folder
			unlink("assets/upload/".$row->Berkas);
		}
		$this->DBWeb->delete_data($where,'tugas');
		redirect('Nilai');
	}

	function EditTugas(){
		$ID = $this->input->post('ID');
		$Matkul = $this->input->post('Matkul');
		$Judul = $this->input->post('Judul');

		$config['upload_path'] = 'assets/upload/';
        $config['allowed_types'] = 'pdf|zip|rar';
        $config['max_size'] = '2048';
        $config['file_name'] = 'TGS'.time();

        $this->load->library('upload',$config);
        if($this->upload->do_upload('File')){
        	$image = $this->upload->data();
        $where = array('ID_Tugas' => $ID);
        $data = array(
			'ID_Matakuliah' => $Matkul,
			'Judul' => $Judul,
			'Berkas' => $image['file_name']
		);
		$this->DBWeb->update_data('tugas',$data,$where);
		redirect(base_url().'Nilai');
		}else{
		$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format pdf, zip, rar dan ukuran max 5120Kb/5Gb');
		redirect(base_url().'Nilai');	
		}
	}	

}