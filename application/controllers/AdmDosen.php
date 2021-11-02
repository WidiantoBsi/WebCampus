<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmDosen extends CI_Controller {
	function __construct(){
	parent::__construct();
	if($this->session->userdata('status')!= "Dosen"){
      redirect(base_url().'Logout');
    }
}

	function index(){
		$data['ID'] = $this->session->userdata('ID');
		$data['Jadwal'] = $this->DBWeb->Jadwal_Dosen($data['ID']);
		$this->load->view('PageDosen/Header');
		$this->load->view('PageDosen/HeaderID');
		$this->load->view('PageDosen/Jadwal',$data);
		$this->load->view('Footer');
	}

	function DBNilai(){
		$Id = $this->session->userdata('ID');
		$data['Tugas'] = $this->DBWeb->Jadwal_Dosen($Id);//data jurusan
		// $data['NIM'] = $this->DBWeb->get_Mahasiswa();//data Nim mahasiswa
		$this->load->view('PageDosen/Header');
		$this->load->view('PageDosen/HeaderID');
		$this->load->view('PageDosen/Nilai',$data);
		$this->load->view('Footer');
	}

	function EditNilai(){
		$ID = $this->input->post('ID');//Id Tugas
		$Nilai = $this->input->post('Nilai');
		$Ket = '2';

        $where = array('ID_Tugas' => $ID);//Input Id Tugas
        $data = array(
			'Keterangan' => $Ket,
			'Nilai' => $Nilai
		);
		$this->DBWeb->update_data('tugas',$data,$where);
		redirect(base_url().'AddNilai');
	}

	function UploadFile($id){
		// force_download('./assets/upload/'.$id,NULL);
		if (force_download('./assets/upload/'.$id,NULL)) {

		}else{
		$this->session->set_flashdata('alert','Gagal Upload, File tidak ditemukan atau hilang!');
			redirect(base_url().'AddNilai');
		}
	}

	function HapusNilai(){
		$id = $this->input->post('ID');
		$where = array('ID_Tugas' => $id);
		$db = $this->DBWeb->edit_data($where,'tugas')->result();
		foreach ($db as $row){ //Hapus File di folder
			unlink("assets/upload/".$row->Berkas);
		}
		$this->DBWeb->delete_data($where,'tugas');
		redirect('AddNilai');
	}

}