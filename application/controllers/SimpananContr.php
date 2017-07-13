<?php 

/**
 * 
 */
class SimpananContr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua' && $this->session->userdata('level') != 'Bendahara')
        {
            redirect('login');
        }
        
        $this->load->model('ModelSimpanan' ,'smpn');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function getAnggota()
    {
        $anggota = $this->db->select('*')
                                ->where('anggota.id_anggota not in (select simpanan.id_anggota from simpanan where simpanan.id_anggota = anggota.id_anggota)')
                                ->get('anggota');
        echo json_encode($anggota->result_array());
    }

    public function getStaff()
    {
        if ($this->session->userdata('level') == 'Ketua') {
            $anggota = $this->db->select('*')->where('level = "ketua"')->get('staff');
        }
        elseif ($this->session->userdata('level') == 'Bendahara') {
            $anggota = $this->db->select('*')->where('level = "bendahara" ')->get('staff');
        }
        echo json_encode($anggota->result_array());
    }

    public function getBukti()
    {
         $anggota = $this->db->select('*')
                                ->where('bukti_transaksi_simpanan.id_Bukti_Simpanan not in (SELECT simpanan.id_Bukti_Simpanan from simpanan WHERE simpanan.id_Bukti_Simpanan = bukti_transaksi_simpanan.id_Bukti_Simpanan)')
                                ->get('bukti_transaksi_simpanan');
        echo json_encode($anggota->result_array());
    }

    public function viewSimpanan() {
        $d['title']     = 'Login Koperasi';
        $d['judul']     = 'Koperasi Wanita "Tunas Wanita Abadi"';
        if ($this->session->userdata('level') == 'Ketua') {
            $d['staff'] = $this->session->userdata('id_Staff');
        }
        elseif ($this->session->userdata('level') == 'Bendahara') {
            $d['staff'] = $this->session->userdata('id_Staff');
        }
        
        $this->load->view('Layout/HeaderKoperasi' , $d);
        $this->load->view('Layout/SideBarKoperasi', $d);    
        $this->load->view('Simpanan/ContentSimpanan', $d);
    }

    // public function getStaff()
    // {
    //     $this->load->model('modelsimpanan');
    //     $resu= $this->modelsimpanan->getStaff();
    //     echo json_encode($resu->result());
    // }

    public function ajax_list()
    {
        $list = $this->smpn->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $simpanan) {
            $no++;
            $row = array();
            $row[] = $simpanan->id_Simpanan;
            $row[] = $simpanan->dateby;
            $row[] = $simpanan->id_Bukti_Simpanan;
            $row[] = $simpanan->id_anggota;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_simpanan('."'".$simpanan->id_Simpanan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
                'id_Simpanan'       => $this->input->post('id_Simpanan'),
                'id_Bukti_Simpanan' => $this->input->post('id_Bukti_Simpanan'),
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'dateby'            => $this->input->post('dateby')
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
                'id_Simpanan'       => $this->input->post('id_Simpanan'),
                'id_Bukti_Simpanan' => $this->input->post('id_Bukti_Simpanan'),
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'dateby'            => $this->input->post('dateby')
            );
        $this->smpn->update(array('id_Simpanan' => $this->input->post('id_Simpanan')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->smpn->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $datas = $this->session->userdata('is_logged_in');
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Simpanan') == '')
        {
            $data['inputerror'][] = 'id_Simpanan';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Bukti_Simpanan') == '')
        {
            $data['inputerror'][] = 'id_Bukti_Simpanan';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_anggota') == '')
        {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'No anggota is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('dateby') == '')
        {
            $data['inputerror'][] = 'dateby';
            $data['error_string'][] = 'Date of Birth is required';
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