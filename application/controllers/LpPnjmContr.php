<?php

/**
* 
*/
class LpPnjmContr extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('Layout/HeaderKoperasi');
		$this->load->view('Layout/SideBarKoperasi');
		$this->load->view('Laporan/ContentLaporanP');
	}


	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModLPinjaman', 'lpp');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->lpp->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lpp) {
            $no++;
            $row = array();
            $row[] = $lpp->nama_anggota;
            $row[] = $lpp->dateby;
            $row[] = $lpp->id_Bukti_Pinjaman;
            $row[] = $lpp->nama_pinjaman;
            $row[] = $lpp->jumlah_TransPinjaman;
            $row[] = $lpp->cicilan;
            $row[] = $lpp->pinjaman_terbayar;
            //add html for action
            
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->lpp->count_all(),
                        "recordsFiltered"   => $this->lpp->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    
}

?>