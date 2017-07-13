<?php

/**
* 
*/
class LpSmpnContr extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('Layout/HeaderKoperasi');
		$this->load->view('Layout/SideBarKoperasi');
		$this->load->view('Laporan/ContentLaporanS');
	}


	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModLSimpanan', 'lps');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->lps->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lps) {
            $no++;
            $row = array();
            $row[] = $lps->nama_anggota;
            $row[] = $lps->dateby;
            $row[] = $lps->id_Bukti_Simpanan;
            $row[] = $lps->nama_simpanan;
            $row[] = $lps->debet;
            $row[] = $lps->kredit;
            $row[] = $lps->saldo;
            //add html for action
            
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->lps->count_all(),
                        "recordsFiltered"   => $this->lps->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
}

?>