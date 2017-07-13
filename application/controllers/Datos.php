<?php
/**
* 
*/
class Datos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getdatos(){
		$resultado = $this->db->select('*')->get('kelompok');
		echo json_encode($resultado->result_array());
	}

	public function getKeputusan(){
		$resultado = $this->db->select('*')->get('keputusan');
		echo json_encode($resultado->result_array());
	}

	public function ngehe()
	{
		$this->load->view('anggota/ngetest');
	}
}