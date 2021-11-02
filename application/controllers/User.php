<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
	parent::__construct();
}
	
	function index(){
		$this->load->view('Login');
	}

	function Login(){
		$ID = $this->input->post('ID');
		$Password = $this->input->post('Password');
		// $Password =  password_verify($this->input->post('Password'));
		$where = array('Password' => $Password, 'ID_User' => $ID);
		$db = $this->DBWeb->edit_data($where,'user')->result();
		//Cek Nama User
		$where2 = array('ID_User' => $ID);
		$DB = $this->DBWeb->edit_data($where2,'user')->result();
			foreach ($DB as $b) {
				$Id = $b->ID_User;
				$Nama = $b->NamaUser;
				$Foto = $b->Photo;
			}
		//Cek Login
		$data = $this->DBWeb->edit_data($where,'user');
		$cek = $data->num_rows();
		if ($cek >0) {
			foreach ($db as $row) {
				$Status = $row->IdGrup;
				$Info = $row->Status;
			}
			if ($Status==1 && $Info=='Y') { //Halaman Admin
				$session = array('ID' => $Id,'Nama' => $Nama,'Photo' => $Foto,'status' =>'Admin');
				$this->session->set_userdata($session);
					redirect(base_url('Welcome')); 
			}elseif ($Status==2 && $Info=='Y') { //Halaman Dosen
				$session = array('ID' => $Id,'Nama' => $Nama,'Photo' => $Foto,'status' =>'Dosen');
				$this->session->set_userdata($session);
					redirect(base_url('AdmDosen'));
			}elseif ($Status==3 && $Info=='Y') { //Halaman Mahasiswa
				$session = array('ID' => $Id,'Nama' => $Nama,'Photo' => $Foto,'status' =>'Mahasiswa');
				$this->session->set_userdata($session);
					redirect(base_url('AdmMahasiswa'));
			}else { //Halaman Tidak Ada
				$this->session->set_flashdata('alert','Login Gagal! User Tidak Aktif!, Hubungi admin');
				redirect(base_url('User'));
			}
		}else { //Pesan Salah
			$this->session->set_flashdata('alert','Login Gagal! Username atau Password salah!'); 
			redirect(base_url('User'));
		}
	}

	function Logout(){
		$this->session->sess_destroy('ID');
		$this->session->sess_destroy('Nama');
	    redirect(base_url().'User');
	}

	function User(){
		$data['User'] = $this->DBWeb->get_data('User')->result();
		$data['Dosen'] = $this->DBWeb->get_Dosen();
		$data['Mahasiswa'] = $this->DBWeb->get_Mahasiswa();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('User/DBUser',$data);
		$this->load->view('Footer');
	}

	function AddDosen(){
		$ID = $this->input->post('IdUser');
		$Grup = 2;
		$where = array('NIP' => $ID);
		$db2 = $this->DBWeb->edit_data($where,'dosen')->result();
		foreach ($db2 as $row2){
			$Nama = $row2->NamaDosen;
			$Password = $row2->Tgl_Lahir;
			$Photo = $row2->Photo;
		}
		$data = array(
			'ID_User' => $ID,
			'IdGrup' => $Grup,
			'NamaUser' => $Nama,
			'Password' => $Password,
			'Photo' => $Photo
		);
		$this->DBWeb->insert_data($data,'user');
		redirect(base_url().'AddUser');
	}

	function AddSiswa(){
		$ID = $this->input->post('IdUser');
		$Grup = 3;
		$where = array('Nim' => $ID);
		$db2 = $this->DBWeb->edit_data($where,'mahasiswa')->result();
		foreach ($db2 as $row2){
			$Nama = $row2->NamaSiswa;
			$Password = $row2->Tgl_Lahir;
			$Photo = $row2->Photo;
		}
		$data = array(
			'ID_User' => $ID,
			'IdGrup' => $Grup,
			'NamaUser' => $Nama,
			'Password' => $Password,
			'Photo' => $Photo
		);
		$this->DBWeb->insert_data($data,'user');
		redirect(base_url().'AddUser');
	}

	function EditUser(){
		$id = $this->input->post('ID');
		$Status = $this->input->post('Status');

		$where = array('ID_User' => $id);
		$data = array(
			'Status' => $Status
		);
		$this->DBWeb->update_data('user',$data,$where);
		redirect(base_url().'AddUser');
	}

}