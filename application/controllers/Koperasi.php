<?php 

/**
 * 
 */
class Koperasi extends CI_Controller
{

function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('KoperasiModel' ,'koperasi');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }
  
    public function index()
    {
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('ContentKSP');
    }

    public function ajax_list()
    {
        $this->load->model('KoperasiModel' ,'koperasi');
        $list = $this->koperasi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ksp) {
            $no++;
            $row = array();
            $row[] = $ksp->id_koperasi;
            $row[] = $ksp->nama_koperasi;
            $row[] = $ksp->dateby;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_koperasi('."'".$ksp->id_koperasi."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_koperasi('."'".$ksp->id_koperasi."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"             => $_POST['draw'],
                        "recordsTotal"     => $this->koperasi->count_all(),
                        "recordsFiltered"  => $this->koperasi->count_filtered(),
                        "data"             => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->load->model('KoperasiModel' ,'koperasi');
        $this->_validate();
        $data = array(
                'id_koperasi'   => $this->input->post('id_koperasi'),
                'nama_koperasi' => $this->input->post('nama_koperasi'),
                'alamat'        => $this->input->post('alamat'),
                'no_telp'       => $this->input->post('no_telp'),
                'badan_hukum'   => $this->input->post('badan_hukum'),
                'domisili'      => $this->input->post('domisili'),
                'siup'          => $this->input->post('siup'),
                'tdp'           => $this->input->post('tdp'),
                'email'         => $this->input->post('email'),
                'dateby'        => $this->input->post('dateby'),
                'description'   => $this->input->post('description')
            );
        $insert = $this->koperasi->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $this->load->model('KoperasiModel' ,'koperasi');
        $data = $this->koperasi->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->load->model('KoperasiModel' ,'koperasi');
        $this->_validate();
        $data = array(
                'id_koperasi'   => $this->input->post('id_koperasi'),
                'nama_koperasi' => $this->input->post('nama_koperasi'),
                'alamat'        => $this->input->post('alamat'),
                'no_telp'       => $this->input->post('no_telp'),
                'badan_hukum'   => $this->input->post('badan_hukum'),
                'domisili'      => $this->input->post('domisili'),
                'siup'          => $this->input->post('siup'),
                'tdp'           => $this->input->post('tdp'),
                'email'         => $this->input->post('email'),
                'dateby'        => $this->input->post('dateby'),
                'description'   => $this->input->post('description')
            );
        $this->koperasi->update(array('id_koperasi' => $this->input->post('id_koperasi')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->load->model('KoperasiModel' ,'koperasi');
        $this->koperasi->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_koperasi') == '')
        {
            $data['inputerror'][] = 'id_koperasi';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_koperasi') == '')
        {
            $data['inputerror'][] = 'nama_koperasi';
            $data['error_string'][] = 'Nama Koperasi is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Alamat is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telp') == '')
        {
            $data['inputerror'][] = 'no_telp';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('badan_hukum') == '')
        {
            $data['inputerror'][] = 'badan_hukum';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('domisili') == '')
        {
            $data['inputerror'][] = 'domisili';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }
       
        if($this->input->post('tdp') == '')
        {
            $data['inputerror'][] = 'tdp';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telp') == '')
        {
            $data['inputerror'][] = 'no_telp';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'This is cant null';
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