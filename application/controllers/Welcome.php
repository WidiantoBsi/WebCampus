<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!= "Admin"){
			redirect(base_url().'Logout');
		}
	}

	function index()
	{
		$this->load->view('Header');
		$this->load->view('HeaderID');
		$this->load->view('Pages');
		$this->load->view('Footer');
	}
}
