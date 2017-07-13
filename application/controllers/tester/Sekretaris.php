<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekretaris extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('level') <> 'Sekretaris')
		{
			redirect('login');
		}
	}

	public function index(){
		$d['title'] 	= 'Login Koperasi';
		$d['judul'] 	= 'Koperasi Wanita "Tunas Wanita Abadi"';
		$d['username'] 	= $this->session->userdata('username');
		$d['page'] 		= 'sekretaris';
		$this->load->view('layout/headerkoperasi', $d);
		$this->load->view('layout/sidebarkoperasi', $d);
		$this->load->view('contentkoperasi', $d);
	}
}