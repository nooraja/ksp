<?php 

/**
* 
*/
class TransSimpananContr extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Bendahara' && $this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        
        $this->load->model('ModelTransSimpanan' ,'smpn');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function viewTransSimpanan()
    {
        $d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi' , $d);
        $this->load->view('Layout/SideBarKoperasi', $d);    
        $this->load->view('Simpanan/ContentTransaksiSimpanan', $d);
    }

    public function getJenisSimpanan()
    {
        $resultado = $this->db->select('*')->get('jenis_simpanan');
        echo json_encode($resultado->result_array());
    }


    public function setTime()
    {
        $this->load->helper('date');
        $datanow = date('y-m-d');
        
        $this->load->view('simpanan/InputSimpanan', $data);
    }

    public function getStaff()
    {
        $resu= $this->smpn->getStaff();
        echo json_encode($resu->result());
    }

    public function ajax_list()
    {
        $list = $this->smpn->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $simpanan) {
            $no++;
            $row = array();
            $row[] = $simpanan->id_Bukti_Simpanan;
            $row[] = $simpanan->dateby;
            $row[] = $simpanan->id_Jenis_Simpanan;
            $row[] = $simpanan->debet;
            $row[] = $simpanan->kredit;
            $row[] = $simpanan->saldo;
            // $row[] = $simpanan->id_Staff_Pembuat;
            // $row[] = $simpanan->id_Staff_Mod;
            

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_simpanan('."'".$simpanan->id_Bukti_Simpanan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  ';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->smpn->count_all(),
                        "recordsFiltered" => $this->smpn->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Bukti_Simpanan'     => $this->input->post('id_Bukti_Simpanan'),
                'id_Staff_Pembuat'      => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'          => $this->input->post('id_Staff_Mod'),
                'id_Jenis_Simpanan'     => $this->input->post('id_Jenis_Simpanan'),
                'debet'                 => $this->input->post('debet'),
                'kredit'                => $this->input->post('kredit'),
                'jumlah_TransSimpanan'  => $this->input->post('jumlah_TransSimpanan'),
                'saldo'                 => $this->input->post('saldo'),
                'dateby'                => $this->input->post('dateby')
            );
        $insert = $this->smpn->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->smpn->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Bukti_Simpanan'     => $this->input->post('id_Bukti_Simpanan'),
                'id_Staff_Pembuat'      => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'          => $this->input->post('id_Staff_Mod'),
                'id_Jenis_Simpanan'     => $this->input->post('id_Jenis_Simpanan'),
                'debet'                 => $this->input->post('debet'),
                'kredit'                => $this->input->post('kredit'),
                'jumlah_TransSimpanan'  => $this->input->post('jumlah_TransSimpanan'),
                'saldo'                 => $this->input->post('saldo'),
                'dateby'                => $this->input->post('dateby')
            );
        $this->smpn->update(array('id_Bukti_Simpanan' => $this->input->post('id_Bukti_Simpanan')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->smpn->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Jenis_Simpanan') == '')
        {
            $data['inputerror'][] = 'id_Jenis_Simpanan';
            $data['error_string'][] = 'Jenis Simpanan harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Bukti_Simpanan') == '')
        {
            $data['inputerror'][] = 'id_Bukti_Simpanan';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }

        if( ($this->input->post('debet') == '' || $this->input->post('kredit') == '')) 
        {
            $data['inputerror'][] = 'debet';
            $data['error_string'][] = 'debet dan Kredit tidak boleh kosong atau nol';
            $data['status'] = FALSE;
        }

        if(($this->input->post('kredit') == '' || $this->input->post('debet') == ''))
        {
            $data['inputerror'][] = 'kredit';
            $data['error_string'][] = 'debet dan Kredit tidak boleh kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('jumlah_TransSimpanan') == '')
        {
            $data['inputerror'][] = 'jumlah_TransSimpanan';
            $data['error_string'][] = 'input tidak boleh kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('dateby') == '')
        {
            $data['inputerror'][] = 'dateby';
            $data['error_string'][] = 'Tanggal Harus disini';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}

?>