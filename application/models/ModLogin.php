<?php

/**
* 
*/
class ModLogin extends CI_Model
{
	var $table = 'anggota';   //variabel tabelnya
    var $order = array('id_anggota' => 'desc'); // default order 
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cek($username, $password){
        $this->db->select('*');
        $this->db->from('view_login');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $amber = $this->db->get();

        return $amber;       
    }
    
    
}

 ?>