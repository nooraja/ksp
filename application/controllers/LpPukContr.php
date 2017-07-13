<?php

/**
* 
*/
class LpPukContr extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('Layout/HeaderKoperasi');
		$this->load->view('Layout/SideBarKoperasi');
		$this->load->view('Laporan/ContentLaporanPuk');
	}


	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModLPuk', 'puk');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->puk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $puk) {
            $no++;
            $row = array();
            $row[] = $puk->nama_anggota;
            $row[] = $puk->dateby;
            $row[] = $puk->id_Bukti_Pinjaman;
            $row[] = $puk->nama_pinjaman;
            $row[] = $puk->jumlah_TransPinjaman;
            $row[] = $puk->cicilan;
            $row[] = $puk->pinjaman_terbayar;
            //add html for action
            
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->puk->count_all(),
                        "recordsFiltered"   => $this->puk->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    
}

?>