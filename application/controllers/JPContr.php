<?php 

/**
* 
*/
class JPContr extends CI_Controller
{
    
    function index()
    {

        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('Detil/ContentJP');
    }

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModJP', 'jp');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->jp->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $jp) {
            $no++;
            $row = array();
            $row[] = $jp->id_Jenis_Pinjaman;
            $row[] = $jp->dateby;
            $row[] = $jp->nama_pinjaman;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jenis('."'".$jp->id_Jenis_Pinjaman."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jenis('."'".$jp->id_Jenis_Pinjaman."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->jp->count_all(),
                        "recordsFiltered"   => $this->jp->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Jenis_Pinjaman' => $this->input->post('id_Jenis_Pinjaman'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_pinjaman'     => $this->input->post('nama_pinjaman'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->jp->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->jp->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Jenis_Pinjaman' => $this->input->post('id_Jenis_Pinjaman'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_pinjaman'     => $this->input->post('nama_pinjaman'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->jp->update(array('id_Jenis_Pinjaman' => $this->input->post('id_Jenis_Pinjaman')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->jp->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Jenis_Pinjaman') == '')
        {
            $data['inputerror'][] = 'id_Jenis_Pinjaman';
            $data['error_string'][] = 'No jp cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_pinjaman') == '')
        {
            $data['inputerror'][] = 'nama_pinjaman';
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