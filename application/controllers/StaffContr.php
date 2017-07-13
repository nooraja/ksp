<?php
/**
* 
*/
class StaffContr extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('level') <> 'Sekretaris' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
		$this->load->model('ModelStaff' ,'smpn');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
	}


	public function getStaff()
    {
         if ($this->session->userdata('level') == 'Ketua') {
            $anggota = $this->db->select('*')->where('level = "ketua"')->get('staff');
        }
        elseif ($this->session->userdata('level') == 'Bendahara') {
            $anggota = $this->db->select('*')->where('level = "bendahara" ')->get('staff');
        }
        elseif ($this->session->userdata('level') == 'Sekretaris') {
            $anggota = $this->db->select('*')->where('level = "sekretaris" ')->get('staff');
        }
        echo json_encode($anggota->result_array());
    }

    public function viewStaff() {

        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('Anggota/ContentStaff');
    }

    public function ajax_list()
    {
        $list = $this->smpn->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $simpanan) {
            $no++;
            $row = array();
            $row[] = $simpanan->id_Staff;
            $row[] = $simpanan->level;
            // $row[] = $simpanan->id_Staff_Pembuat;
            // $row[] = $simpanan->id_Staff_Mod;
            $row[] = $simpanan->dateby;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_staff('."'".$simpanan->id_Staff."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_staff('."'".$simpanan->id_Staff."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
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
                'id_Staff'      => $this->input->post('id_Staff'),
                'id_anggota'    => $this->input->post('id_anggota'),
                'level'         => $this->input->post('level'),
                'dateby'        => $this->input->post('dateby'),
                'description'   => $this->input->post('description')
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
                'id_Staff'          => $this->input->post('id_Staff'),
                'id_anggota'        => $this->input->post('id_anggota'),
                'level'             => $this->input->post('level'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->smpn->update(array('id_Staff' => $this->input->post('id_Staff')), $data);
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

        if($this->input->post('id_Staff') == '')
        {
            $data['inputerror'][] = 'id_Staff';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_anggota') == '')
        {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'No anggota cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('level') == '')
        {
            $data['inputerror'][] = 'level';
            $data['error_string'][] = 'Level is required';
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