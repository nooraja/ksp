<?php

/**
* 
*/
class Pengeluaran extends CI_Controller	
{
	
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Sekretaris' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModelAnggotaPuk', 'puk');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function getSimpanan()
    {
        
        $anggota = $this->db->select('*')->get('simpanan');
        echo json_encode($anggota->result_array());
    }

    public function getKeputusan()
    {
        // $anggota = $this->db->select('select id_keputusan, jenis_kptsn from keputusan where keputusan.id_keputusan not in (select anggota_puk.id_keputusan from anggota_puk) ' , FALSE);

        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (select anggota_puk.id_keputusan from anggota_puk)')
                                ->get('keputusan');

        echo json_encode($anggota->result_array());
        // return $anggota->result_array();
    }
    
    public function ajax_list()
    {
        $this->load->model('ModPengeluaran', 'puk');
        $list = $this->puk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $puk) {
            $no++;
            $row = array();
            $row[] = $puk->id_pengeluaran_anggota;
            $row[] = $puk->dateby;
            // $row[] = $puk->id_Staff_Mod;
            $row[] = $puk->description;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_anggota_puk('."'".$puk->id_pengeluaran_anggota."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_anggota_puk('."'".$puk->id_pengeluaran_anggota."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->puk->count_all(),
            "recordsFiltered" => $this->puk->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_pengeluaran_anggota'    => $this->input->post('id_pengeluaran_anggota'),
                'id_keputusan'              => $this->input->post('id_keputusan'),
                'id_Staff'                  => $this->input->post('id_Staff'),
                'id_anggota'                => $this->input->post('id_anggota'),
                'id_simpanan'               => $this->input->post('id_simpanan'),
                'id_pinjaman'               => $this->input->post('id_pinjaman'),
                'dateby'                    => $this->input->post('dateby'),
                'description'               => $this->input->post('description')
            );

        $insert = $this->puk->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $this->load->model('ModPengeluaran', 'puk');
        $data = $this->puk->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_pengeluaran_anggota'    => $this->input->post('id_pengeluaran_anggota'),
                'id_keputusan'              => $this->input->post('id_keputusan'),
                'id_Staff'                  => $this->input->post('id_Staff'),
                'id_anggota'                => $this->input->post('id_anggota'),
                'id_simpanan'               => $this->input->post('id_simpanan'),
                'id_pinjaman'               => $this->input->post('id_pinjaman'),
                'dateby'                    => $this->input->post('dateby'),
                'description'               => $this->input->post('description')
            );
        $this->puk->update(array('id_pengeluaran_anggota' => $this->input->post('id_pengeluaran_anggota')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->puk->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_pengeluaran_anggota') == '')
        {
            $data['inputerror'][] = 'id_pengeluaran_anggota';
            $data['error_string'][] = 'No anggota cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_anggota') == '')
        {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'Koperasi cant be null';
            $data['status'] = FALSE;
        }

        // if($this->input->post('id_keputusan') == '')
        // {
        //     $data['inputerror'][] = 'id_keputusan';
        //     $data['error_string'][] = 'No Keputusan cant be null';
        //     $data['status'] = FALSE;
        // }
        if($this->input->post('id_simpanan') == '')
        {
            $data['inputerror'][] = 'id_simpanan';
            $data['error_string'][] = 'id_simpanan cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_anggota') == '')
        {
            $data['inputerror'][] = 'nama_anggota';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_pinjaman') == '')
        {
            $data['inputerror'][] = 'id_pinjaman';
            $data['error_string'][] = 'This cant be null';
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