<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('url'));
        $this->load->library('form_validation');
    }
	public function index(){
		$d['title'] = 'Login Koperasi';
		$d['judul'] = 'Login';
		$this->load->view('naps/home', $d);
	}

	public function masuk()
	{
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		
		if ($this->form_validation->run() == TRUE) {
			// call the modul
			$this->load->model('ModLogin');
			$cek = $this->ModLogin->cek($password, $username);
			
			if($cek->num_rows() == 1) {	
				foreach($cek->result() as $data) {
					$sess_data['id_anggota'] = $data->id_anggota;
					$sess_data['nama_anggota'] = $data->nama_anggota;
					$sess_data['username'] = $data->username;
					$sess_data['level'] = $data->level;
					$sess_data['id_Staff'] = $data->id_Staff;
					$sess_data['id_koperasi'] = $data->id_koperasi;
					$this->session->set_userdata($sess_data);
				}

				if($this->session->userdata('level') == 'Ketua')
				{
					redirect('tester/ketua');
				}
				elseif($this->session->userdata('level') == 'Bendahara')
				{
					redirect('tester/bendahara');
				}
				elseif($this->session->userdata('level') == 'Sekretaris')
				{
					redirect('tester/sekretaris');
				}
			}
			else {
				$this->session->set_flashdata('pesan', 'Username tidak tepat.');
				redirect('login');
			}
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}