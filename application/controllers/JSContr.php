<?php 

/**
* 
*/
class JSContr extends CI_Controller
{
    
    function index()
    {
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('Detil/ContentJS');
    }

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModJS', 'jsmpn');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->jsmpn->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $jsmpn) {
            $no++;
            $row = array();
            $row[] = $jsmpn->id_Jenis_Simpanan;
            $row[] = $jsmpn->dateby;
            $row[] = $jsmpn->nama_simpanan;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jenis('."'".$jsmpn->id_Jenis_Simpanan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jenis('."'".$jsmpn->id_Jenis_Simpanan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->jsmpn->count_all(),
                        "recordsFiltered"   => $this->jsmpn->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Jenis_Simpanan' => $this->input->post('id_Jenis_Simpanan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_simpanan'     => $this->input->post('nama_simpanan'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->jsmpn->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->jsmpn->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Jenis_Simpanan' => $this->input->post('id_Jenis_Simpanan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_simpanan'     => $this->input->post('nama_simpanan'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->jsmpn->update(array('id_Jenis_Simpanan' => $this->input->post('id_Jenis_Simpanan')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->jsmpn->delete_by_id($id);
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
            $data['error_string'][] = 'No jsmpn cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_simpanan') == '')
        {
            $data['inputerror'][] = 'nama_simpanan';
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