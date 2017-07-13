<?php 

/**
* 
*/
class VoucherContr extends CI_Controller
{
    
    function index()
    {
        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
        $this->load->view('Detil/ContentVoucher');
    }

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModVoucher', 'voucher');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    
    public function ajax_list()
    {
        $list = $this->voucher->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $voucher) {
            $no++;
            $row = array();
            $row[] = $voucher->id_Voucher;
            $row[] = $voucher->dateby;
            $row[] = $voucher->nama_voucher;
            $row[] = $voucher->date_batas;
            $row[] = $voucher->nilai;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_biaya('."'".$voucher->id_Voucher."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_biaya('."'".$voucher->id_Voucher."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->voucher->count_all(),
                        "recordsFiltered"   => $this->voucher->count_filtered(),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Voucher'        => $this->input->post('id_Voucher'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_voucher'      => $this->input->post('nama_voucher'),
                'nilai'             => $this->input->post('nilai'),
                'dateby'            => $this->input->post('dateby'),
                'date_batas'        => $this->input->post('date_batas'),
                'description'       => $this->input->post('description')
            );


        $insert = $this->voucher->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->voucher->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Voucher'        => $this->input->post('id_Voucher'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'nama_voucher'      => $this->input->post('nama_voucher'),
                'nilai'             => $this->input->post('nilai'),
                'dateby'            => $this->input->post('dateby'),
                'date_batas'        => $this->input->post('date_batas'),
                'description'       => $this->input->post('description')
            );
        $this->voucher->update(array('id_Voucher' => $this->input->post('id_Voucher')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->voucher->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_Voucher') == '')
        {
            $data['inputerror'][] = 'id_Voucher';
            $data['error_string'][] = 'No voucher cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai') == '')
        {
            $data['inputerror'][] = 'nilai';
            $data['error_string'][] = 'Anggota cant be null';
            $data['status'] = FALSE;
        }
        if($this->input->post('nama_voucher') == '')
        {
            $data['inputerror'][] = 'nama_voucher';
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