<?php 

/**
 * 
 */
class SlotContr extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Sekretaris' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModSlot' ,'slot');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }
  
    public function index()
    {
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('ContentSlot');
    }

    public function viewSlot()
    {
        
    }

    public function ajax_list()
    {
        $this->load->model('ModSlot' ,'slot');
        $list = $this->slot->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $slot) {
            $no++;
            $row = array();
            $row[] = $slot->id_Slot;
            $row[] = $slot->dateby;
            $row[] = $slot->description;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_slot('."'".$slot->id_Slot."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_slot('."'".$slot->id_Slot."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"             => $_POST['draw'],
                        "recordsTotal"     => $this->slot->count_all(),
                        "recordsFiltered"  => $this->slot->count_filtered(),
                        "data"             => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->load->model('ModSlot' ,'slot');
        $this->_validate();
        $data = array(
                'id_KWM'            => $this->input->post('id_KWM'),
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_Slot'           => $this->input->post('id_Slot'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->slot->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $this->load->model('ModSlot' ,'slot');
        $data = $this->slot->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->load->model('ModSlot' ,'slot');
        $this->_validate();
        $data = array(
                'id_Slot'           => $this->input->post('id_Slot'),
                'id_KWM'            => $this->input->post('id_KWM'),
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->slot->update(array('id_Slot' => $this->input->post('id_Slot')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->load->model('ModSlot' ,'slot');
        $this->slot->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_anggota') == '')
        {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'This is cant null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_KWM') == '')
        {
            $data['inputerror'][] = 'id_KWM';
            $data['error_string'][] = 'Nama slot is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Slot') == '')
        {
            $data['inputerror'][] = 'id_Slot';
            $data['error_string'][] = 'Slot is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_keputusan') == '')
        {
            $data['inputerror'][] = 'id_keputusan';
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