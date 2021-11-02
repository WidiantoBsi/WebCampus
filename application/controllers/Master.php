<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct(){
	parent::__construct();
	if($this->session->userdata('status')!= "Admin"){
      redirect(base_url().'Logout');
    }
}
	function index()
	{
		$data['Dosen'] = $this->DBWeb->get_data('dosen')->result();//data Dosen
		$data['ID'] = $this->DBWeb->kode_Dosen();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Dosen',$data);
		$this->load->view('Footer');
	}

	function AddDosen(){
		$NIP = $this->input->post('Nip');
		$Nama = $this->input->post('NamaDosen');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');

		$config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'foto'.time();

        $this->load->library('upload',$config);
        if($this->upload->do_upload('foto')){
        	$image = $this->upload->data();
		$data = array(
			'NIP' => $NIP,
			'NamaDosen' => $Nama,
			'Tgl_Lahir' => $Tgl_lhir,
			'JK' => $JK,
			'NoTelepon' => $NoHp,
			'Alamat' => $Almt,
			'Photo' => $image['file_name']
		);
		$this->DBWeb->insert_data($data,'dosen');
		redirect(base_url().'Dosen');
		}else {
		$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb');
		redirect(base_url().'Dosen');
		}
	}

	function EditDosen(){
		$NIP = $this->input->post('Nip');
		$Nama = $this->input->post('NamaDosen');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');

		$config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'foto'.time();

        $this->load->library('upload',$config);
        if($this->upload->do_upload('foto')){
        	$image = $this->upload->data();
		$where = array('NIP' => $NIP);
		$data = array(
			'NIP' => $NIP,
			'NamaDosen' => $Nama,
			'Tgl_Lahir' => $Tgl_lhir,
			'JK' => $JK,
			'NoTelepon' => $NoHp,
			'Alamat' => $Almt,
			'Photo' => $image['file_name']
		);

		$this->DBWeb->update_data('dosen',$data,$where);
		redirect(base_url().'Master');
		}else {
			$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb');
			redirect(base_url().'Master');
		}
	}

	function HapusDosen(){
		$id = $this->input->post('ID');
		$where = array('NIP' => $id);
		$where2 = array('ID_User' => $id);
		$db = $this->DBWeb->edit_data($where,'dosen')->result();
		foreach ($db as $row){ //Hapus Photo di folder
			unlink("assets/upload/".$row->Photo);
		}
		$this->DBWeb->delete_data($where,'dosen'); // Hapus data dosen
		$this->DBWeb->delete_data($where2,'user'); // Hapus data user dosen
		redirect('Dosen');
	}

	// Form Mahasiswa
	function Mahasiswa(){
		$data['ID'] = $this->DBWeb->kode_Mahasiswa();
		$data['Mahasiswa'] = $this->DBWeb->get_data('mahasiswa')->result();//data Mahasiswa
		$data['jurusan'] = $this->DBWeb->get_Jurusan();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Mahasiswa',$data);
		$this->load->view('Footer');
	}

	function AddMahasiswa(){
		$NIM = $this->input->post('Nim');
		$Nama = $this->input->post('Nama');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');
		$Jurusan = $this->input->post('Jurusan');

		$config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'foto'.time();

        $this->load->library('upload',$config);

        if($this->upload->do_upload('foto')){
        	$image = $this->upload->data();
        	$data = array(
        		'Nim' => $NIM,
        		'NamaSiswa' => $Nama,
        		'Tgl_Lahir' => $Tgl_lhir,
        		'JenisKelamin' => $JK,
        		'NoTelepon' => $NoHp,
        		'Alamat' => $Almt,
        		'ID_Jurusan' => $Jurusan,
        		'Photo' => $image['file_name']
        	);
		$this->DBWeb->insert_data($data,'mahasiswa');
		redirect(base_url().'Mahasiswa');
        }else {
        	$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb');
        	redirect(base_url().'Mahasiswa');
        }
	}

	function EditMahasiswa(){
		$NIM = $this->input->post('Nim');
		$Nama = $this->input->post('Nama');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');
		$Jurusan = $this->input->post('Jurusan');

		$config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'foto'.time();

        $this->load->library('upload',$config);
        if($this->upload->do_upload('foto')){
        	$image = $this->upload->data();
		$where = array('Nim' => $NIM);
		$data = array(
			'Nim' => $NIM,
			'NamaSiswa' => $Nama,
			'Tgl_Lahir' => $Tgl_lhir,
			'JenisKelamin' => $JK,
			'NoTelepon' => $NoHp,
			'Alamat' => $Almt,
			'ID_Jurusan' => $Jurusan,
			'Photo' => $image['file_name']
		);
		$this->DBWeb->update_data('mahasiswa',$data,$where);
		redirect(base_url().'Mahasiswa');
		}else {
			$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb');
			redirect(base_url().'Mahasiswa');
		}
	}

	function HapusSiswa(){
		$id = $this->input->post('ID');
		$where = array('Nim' => $id);
		$where2 = array('ID_User' => $id);
		$db = $this->DBWeb->edit_data($where,'mahasiswa')->result();
		foreach ($db as $row){ //Hapus Photo di folder
			unlink("assets/upload/".$row->Photo);
		}
		$this->DBWeb->delete_data($where,'mahasiswa');//hapus data mahasiswa
		$this->DBWeb->delete_data($where2,'user'); //hapus data user mahasiswa
		redirect('Mahasiswa');
	}

	//Form Matauliah
	function Matakuliah(){
		$data['ID'] = $this->DBWeb->KodeMatakuliah();
		$data['Matakuliah'] = $this->DBWeb->get_data('matakuliah')->result();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Matakuliah',$data);
		$this->load->view('Footer');
	}

	function AddMatakuliah(){
		$Kode = $this->input->post('Kode');
		$matkul = $this->input->post('matakuliah');
		$sks = $this->input->post('sks');

		$data = array(
			'ID_Matakuliah' => $Kode,
			'Matakuliah' => $matkul,
			'SKS' => $sks
		);
		$this->DBWeb->insert_data($data,'matakuliah');
		redirect(base_url().'Matakuliah');
	}

	function EditMatakuliah(){
		$Kode = $this->input->post('Kode');
		$matkul = $this->input->post('matakuliah');
		$sks = $this->input->post('sks');

		$where = array('ID_Matakuliah' => $Kode);
		$data = array(
			'ID_Matakuliah' => $Kode,
			'Matakuliah' => $matkul,
			'SKS' => $sks
		);
		$this->DBWeb->update_data('matakuliah',$data,$where);
		redirect(base_url().'Matakuliah');
	}

	function DeletMatkul(){
		$id = $this->input->post('ID');
		$where = array('ID_Matakuliah' => $id);
		$this->DBWeb->delete_data($where,'matakuliah');
		redirect('Matakuliah');
	}

	// form Jurusan 
	function Jurusan(){
		$data['ID'] = $this->DBWeb->KodeJurusan();
		$data['Jenjang'] = $this->DBWeb->get_Jenjang();
		$data['Jurusan'] = $this->DBWeb->get_data('jurusan')->result();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Jurusan',$data);
		$this->load->view('Footer');
	}

	function AddJurusan(){
		$Kode = $this->input->post('Kode');
		$jurusan = $this->input->post('jurusan');
		$Jenjang = $this->input->post('Jenjang');

		$data = array(
			'ID_Jurusan' => $Kode,
			'NamaJurusan' => $jurusan,
			'ID_Jenjang' => $Jenjang
		);
		$this->DBWeb->insert_data($data,'jurusan');
		redirect(base_url().'Master/Jurusan');
	}

	function EditJurusan(){
		$Kode = $this->input->post('Kode');
		$jurusan = $this->input->post('jurusan');
		$Jenjang = $this->input->post('Jenjang');

		$where = array('ID_Jurusan' => $Kode);
		$data = array(
			'ID_Jurusan' => $Kode,
			'NamaJurusan' => $jurusan,
			'ID_Jenjang' => $Jenjang
		);
		$this->DBWeb->update_data('jurusan',$data,$where);
		redirect(base_url().'Master/Jurusan');
	}

	function HapusJurusan(){
		$id = $this->input->post('ID');
		$where = array('ID_Jurusan' => $id);
		$this->DBWeb->delete_data($where,'jurusan');
		redirect('Master/Jurusan');
	}

	//Form Jenjang
	function Jenjang(){
		$data['ID'] = $this->DBWeb->KodeJenjang();
		$data['Jenjang'] = $this->DBWeb->get_data('jenjang')->result();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Jenjang',$data);
		$this->load->view('Footer');
	}

	function AddJenjang(){
		$Kode = $this->input->post('Kode');
		$Jenjang = $this->input->post('jenjang');

		$data = array(
			'ID_Jenjang' => $Kode,
			'NamaJenjang' => $Jenjang
		);
		$this->DBWeb->insert_data($data,'jenjang');
		redirect(base_url().'Master/Jenjang');
	}

	function EditJenjang(){
		$Kode = $this->input->post('Kode');
		$Jenjang = $this->input->post('jenjang');

		$where = array('ID_Jenjang' => $Kode);
		$data = array(
			'ID_Jenjang' => $Kode,
			'NamaJenjang' => $Jenjang
		);
		$this->DBWeb->update_data('jenjang',$data,$where);
		redirect(base_url().'Master/Jenjang');
	}

	function HapusJenjang(){
		$id = $this->input->post('ID');
		$where = array('ID_Jenjang' => $id);
		$this->DBWeb->delete_data($where,'jenjang');
		redirect('Master/Jenjang');
	}

	//Form Ruangan
	function Ruangan(){
		$data['ID'] = $this->DBWeb->KodeRuangan();
		$data['ruangan'] = $this->DBWeb->get_data('ruangan')->result();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Ruangan',$data);
		$this->load->view('Footer');
	}

	function AddRuangan(){
		$Kode = $this->input->post('Kode');
		$Ruangan = $this->input->post('Ruangan');

		$data = array(
			'ID_Ruang' => $Kode,
			'NamaRuangan' => $Ruangan
		);
		$this->DBWeb->insert_data($data,'ruangan');
		redirect(base_url().'Master/Ruangan');
	}

	function EditRuangan(){
		$Kode = $this->input->post('Kode');
		$Ruangan = $this->input->post('Ruangan');

		$where = array('ID_Ruang' => $Kode);
		$data = array(
			'ID_Ruang' => $Kode,
			'NamaRuangan' => $Ruangan
		);
		$this->DBWeb->update_data('ruangan',$data,$where);
		redirect(base_url().'Master/Ruangan');
	}

	function HapusRuangan(){
		$id = $this->input->post('ID');
		$where = array('ID_Ruang' => $id);
		$this->DBWeb->delete_data($where,'ruangan');
		redirect('Master/Ruangan');
	}

	//Form Jadwal
	function Jadwal(){
		$data['ID'] = $this->DBWeb->KodeJadwal();
		$data['Jurusan'] = $this->DBWeb->get_Jurusan();
		$data['Ruangan'] = $this->DBWeb->get_Ruangan();
		$data['Dosen'] = $this->DBWeb->get_Dosen();
		$data['Matakuliah'] = $this->DBWeb->get_Matakuliah(); // Data Matakuliah
		$data['Jadwal'] = $this->DBWeb->get_data('jadwal')->result();
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Master/Jadwal',$data);
		$this->load->view('Footer');
	}

	function AddJadwal(){
		$ID = $this->input->post('ID');
		$Matakuliah = $this->input->post('Matakuliah');
		$Dosen = $this->input->post('Dosen');
		$Ruangan = $this->input->post('Ruangan');
		$Jurusan = $this->input->post('Jurusan');
		$Hari = $this->input->post('Hari');
		$JamIn = $this->input->post('JamIn');
		$JamOut = $this->input->post('JamOut');
		$Jam = $JamIn."-".$JamOut;

		$data = array(
			'ID_Jadwal' => $ID,
			'ID_Matakuliah' => $Matakuliah,
			'NIP' => $Dosen,
			'ID_Ruangan' => $Ruangan,
			'ID_Jurusan' => $Jurusan,
			'Hari' => $Hari,
			'Jam' => $Jam
		);
		$this->DBWeb->insert_data($data,'jadwal');
		redirect(base_url().'Jadwal');
	}

	function EditJadwal(){
		$ID = $this->input->post('ID');
		$Matakuliah = $this->input->post('Matakuliah');
		$Dosen = $this->input->post('Dosen');
		$Ruangan = $this->input->post('Ruangan');
		$Jurusan = $this->input->post('Jurusan');
		$Hari = $this->input->post('Hari');
		$JamIn = $this->input->post('JamIn');
		$JamOut = $this->input->post('JamOut');
		$Jam = $JamIn."-".$JamOut;

		$where = array('ID_Jadwal' => $ID);
		$data = array(
			'ID_Jadwal' => $ID,
			'ID_Matakuliah' => $Matakuliah,
			'NIP' => $Dosen,
			'ID_Ruangan' => $Ruangan,
			'ID_Jurusan' => $Jurusan,
			'Hari' => $Hari,
			'Jam' => $Jam
		);
		$this->DBWeb->update_data('jadwal',$data,$where);
		redirect(base_url().'Jadwal');
	}

	function HapusJadwal(){
		$id = $this->input->post('ID');
		$where = array('ID_Jadwal' => $id);
		$this->DBWeb->delete_data($where,'jadwal');
		redirect('Jadwal');
	}

}