<?php 

/**
* 
*/
class AdsContr extends CI_Controller
{
    
    function index()
    {
        if($this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('Detil/ContentAds');
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModAds', 'ads');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->ads->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ads) {
            $no++;
            $row = array();
            $row[] = $ads->id_Administrasi;
            $row[] = $ads->dateby;
            $row[] = $ads->nama_administrasi;
            $row[] = $ads->nilai;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_biaya('."'".$ads->id_Administrasi."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_biaya('."'".$ads->id_Administrasi."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->ads->count_all(),
                        "recordsFiltered"   => $this->ads->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Administrasi'   => $this->input->post('id_Administrasi'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_administrasi' => $this->input->post('nama_administrasi'),
                'nilai'             => $this->input->post('nilai'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );


        $insert = $this->ads->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->ads->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Administrasi'   => $this->input->post('id_Administrasi'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_administrasi' => $this->input->post('nama_administrasi'),
                'nilai'             => $this->input->post('nilai'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->ads->update(array('id_Administrasi' => $this->input->post('id_Administrasi')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->ads->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Administrasi') == '')
        {
            $data['inputerror'][] = 'id_Administrasi';
            $data['error_string'][] = 'No ads cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai') == '')
        {
            $data['inputerror'][] = 'nilai';
            $data['error_string'][] = 'Anggota cant be null';
            $data['status'] = FALSE;
        }
        if($this->input->post('nama_administrasi') == '')
        {
            $data['inputerror'][] = 'nama_administrasi';
            $data['error_string'][] = 'bukti cant be null';
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