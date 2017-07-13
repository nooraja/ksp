<?php 

/**
 * 
 */
class KelompokContr extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Sekretaris' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModelKelompok' ,'kelompok');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }
  
    public function index()
    {
        $this->load->view('viewlogin');
    }

    public function viewKWM()
    {
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('ContentKelompok');
    }

    public function ajax_list()
    {
        $this->load->model('ModelKelompok' ,'kelompok');
        $list = $this->kelompok->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kwm) {
            $no++;
            $row = array();
            $row[] = $kwm->id_KWM;
            $row[] = $kwm->nama_Kelompok;
            $row[] = $kwm->id_Ketua;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kwm('."'".$kwm->id_KWM."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kwm('."'".$kwm->id_KWM."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"             => $_POST['draw'],
                        "recordsTotal"     => $this->kelompok->count_all(),
                        "recordsFiltered"  => $this->kelompok->count_filtered(),
                        "data"             => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->load->model('ModelKelompok' ,'kelompok');
        $this->_validate();
        $data = array(
                'id_KWM'            => $this->input->post('id_KWM'),
                'id_Koperasi'       => $this->input->post('id_Koperasi'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'id_Ketua'          => $this->input->post('id_Ketua'),
                'nama_Kelompok'     => $this->input->post('nama_Kelompok'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->kelompok->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $this->load->model('ModelKelompok' ,'kelompok');
        $data = $this->kelompok->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->load->model('ModelKelompok' ,'kelompok');
        $this->_validate();
        $data = array(
                'id_KWM'            => $this->input->post('id_KWM'),
                'id_Koperasi'       => $this->input->post('id_Koperasi'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'id_Ketua'          => $this->input->post('id_Ketua'),
                'nama_Kelompok'     => $this->input->post('nama_Kelompok'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->kelompok->update(array('id_KWM' => $this->input->post('id_KWM')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->load->model('ModelKelompok' ,'kelompok');
        $this->kelompok->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Koperasi') == '')
        {
            $data['inputerror'][] = 'id_Koperasi';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_KWM') == '')
        {
            $data['inputerror'][] = 'id_KWM';
            $data['error_string'][] = 'Nama kelompok is required';
            $data['status'] = FALSE;
        }

        // if($this->input->post('id_Slot') == '')
        // {
        //     $data['inputerror'][] = 'id_Slot';
        //     $data['error_string'][] = 'Alamat is required';
        //     $data['status'] = FALSE;
        // }

        if($this->input->post('id_Ketua') == '')
        {
            $data['inputerror'][] = 'id_Ketua';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_Kelompok') == '')
        {
            $data['inputerror'][] = 'nama_Kelompok';
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