<?php

/**
* 
*/
class Keputusan extends CI_Controller	
{
	
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('Mod_keputusan', 'keputusan');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }


    public function index()
    {
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
        $this->load->view('viewkeputusan', $d);
    }
    
    public function ajax_list()
    {
        $list = $this->keputusan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $keputusan) {
            $no++;
            $row = array();
            $row[] = $keputusan->id_keputusan;
            $row[] = $keputusan->dateby;
            $row[] = $keputusan->jenis_keputusan;
            $row[] = $keputusan->description;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pinjaman('."'".$keputusan->id_keputusan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->keputusan->count_all(),
            "recordsFiltered"   => $this->keputusan->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_keputusan'              => $this->input->post('id_keputusan'),
                'id_Staff'                  => $this->input->post('id_Staff'),
                'jenis_keputusan'               => $this->input->post('jenis_keputusan'),
                'hasil_keputusan'              => $this->input->post('hasil_keputusan'),
                'dateby'                    => $this->input->post('dateby'),
                'description'               => $this->input->post('description')
            );

        $insert = $this->keputusan->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->keputusan->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_keputusan'  => $this->input->post('id_keputusan'),
                'id_Staff'      => $this->input->post('id_Staff'),
                'jenis_keputusan'   => $this->input->post('jenis_keputusan'),
                'hasil_keputusan'  => $this->input->post('hasil_keputusan'),
                'dateby'        => $this->input->post('dateby'),
                'description'   => $this->input->post('description')
            );
        $this->keputusan->update(array('id_keputusan' => $this->input->post('id_keputusan')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id){
        $this->keputusan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('jenis_keputusan') == '')
        {
            $data['inputerror'][] = 'jenis_keputusan';
            $data['error_string'][] = 'Koperasi cant be null';
            $data['status'] = FALSE;
        }

        
        if($this->input->post('hasil_keputusan') == '')
        {
            $data['inputerror'][] = 'hasil_keputusan';
            $data['error_string'][] = 'status cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Staff') == '')
        {
            $data['inputerror'][] = 'id_Staff';
            $data['error_string'][] = 'Password cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_keputusan') == '')
        {
            $data['inputerror'][] = 'id_keputusan';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('dateby') == '')
        {
            $data['inputerror'][] = 'dateby';
            $data['error_string'][] = 'This cant be null';
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