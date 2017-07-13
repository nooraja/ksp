<?php

/**
* 
*/
class TransPukContr extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Bendahara' && $this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModTransPuk' ,'pinjaman');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function viewTransPuk()
    {
        $d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi', $d);
        $this->load->view('Layout/SideBarKoperasi', $d);
        $this->load->view('pinjaman/contenttranspuk', $d);
    }

    public function getKeputusan()
    {
        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (SELECT bukti_transaksi_pinjaman.id_keputusan FROM bukti_transaksi_pinjaman) and keputusan.jenis_kptsn = "Bukti PUK" ')
                                ->get('keputusan');
                                
        echo json_encode($anggota->result_array());
    }

    public function ajax_keputusan() {
        $this->_validatee();
        // $this->load->modal('Mod_keputusan');
        $datae = array(
                'id_keputusan'  => $this->input->post('id_keputusan'),
                'id_Staff'      => $this->input->post('id_Staff'),
                'jenis_kptsn'   => $this->input->post('jenis_kptsn'),
                'status_kptsn'  => $this->input->post('status_kptsn'),
                'dateby'        => $this->input->post('dateby'),
                'description'   => $this->input->post('description')
            );
        $this->db->insert('keputusan',$datae);
        echo json_encode(array("status" => TRUE));
    }

	public function ajax_list()
    {
        $list = $this->pinjaman->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pinjaman) {
            $no++;
            $row = array();
            $row[] = $pinjaman->id_Bukti_Pinjaman;
            $row[] = $pinjaman->dateby;
            $row[] = $pinjaman->id_Jenis_Pinjaman;
            $row[] = $pinjaman->jumlah_TransPinjaman;
            // $row[] = $pinjaman->id_Staff_Pembuat;
            // $row[] = $pinjaman->id_Staff_Mod;
            

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pinjaman('."'".$pinjaman->id_Bukti_Pinjaman."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pinjaman('."'".$pinjaman->id_Bukti_Pinjaman."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->pinjaman->count_all(),
                        "recordsFiltered" => $this->pinjaman->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Bukti_Pinjaman'     => $this->input->post('id_Bukti_Pinjaman'),
                'id_Staff_Pembuat'      => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'          => $this->input->post('id_Staff_Mod'),
                'id_Jenis_Pinjaman'     => $this->input->post('id_Jenis_Pinjaman'),
                'id_Administrasi'       => $this->input->post('id_Administrasi'),
                'id_Bunga'              => $this->input->post('id_Bunga'),
                'id_keputusan'          => $this->input->post('id_keputusan'),
                'id_Premi'              => $this->input->post('id_Premi'),
                'id_Voucher'            => $this->input->post('id_Voucher'),
                'jenis_Pembayaran'      => $this->input->post('jenis_Pembayaran'),
                'cicilan'               => $this->input->post('cicilan'),
                'pinjaman_terbayar'     => $this->input->post('pinjaman_terbayar'),
                'jumlah_TransPinjaman'  => $this->input->post('jumlah_TransPinjaman'),
                'dateby'                => $this->input->post('dateby'),
                'description'           => $this->input->post('description')
            );
        $insert = $this->pinjaman->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->pinjaman->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_Bukti_Pinjaman'     => $this->input->post('id_Bukti_Pinjaman'),
                'id_Staff_Pembuat'      => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'          => $this->input->post('id_Staff_Mod'),
                'id_Jenis_Pinjaman'     => $this->input->post('id_Jenis_Pinjaman'),
                'id_Administrasi'       => $this->input->post('id_Administrasi'),
                'id_Bunga'              => $this->input->post('id_Bunga'),
                'id_keputusan'          => $this->input->post('id_keputusan'),
                'id_Premi'              => $this->input->post('id_Premi'),
                'id_Voucher'            => $this->input->post('id_Voucher'),
                'jenis_Pembayaran'      => $this->input->post('jenis_Pembayaran'),
                'cicilan'               => $this->input->post('cicilan'),
                'pinjaman_terbayar'     => $this->input->post('pinjaman_terbayar'),
                'jumlah_TransPinjaman'  => $this->input->post('jumlah_TransPinjaman'),
                'dateby'                => $this->input->post('dateby'),
                'description'           => $this->input->post('description')
            );
        $this->pinjaman->update(array('id_Bukti_Pinjaman' => $this->input->post('id_Bukti_Pinjaman')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->pinjaman->delete_by_id($id);
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
            $data['error_string'][] = 'Jenis pinjaman harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Administrasi') == '')
        {
            $data['inputerror'][] = 'id_Administrasi';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Bunga') == '')
        {
            $data['inputerror'][] = 'id_Bunga';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Voucher') == '')
        {
            $data['inputerror'][] = 'id_Voucher';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Premi') == '')
        {
            $data['inputerror'][] = 'id_Premi';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_Pembayaran') == '')
        {
            $data['inputerror'][] = 'jenis_Pembayaran';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cicilan') == '')
        {
            $data['inputerror'][] = 'cicilan';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('pinjaman_terbayar') == '')
        {
            $data['inputerror'][] = 'pinjaman_terbayar';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('jumlah_TransPinjaman') == '')
        {
            $data['inputerror'][] = 'jumlah_TransPinjaman';
            $data['error_string'][] = 'input harus diisi';
            $data['status'] = FALSE;
        }
        

        if($this->input->post('id_Bukti_Pinjaman') == '')
        {
            $data['inputerror'][] = 'id_Bukti_Pinjaman';
            $data['error_string'][] = 'cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('dateby') == '')
        {
            $data['inputerror'][] = 'dateby';
            $data['error_string'][] = 'Tanggal Harus diisi';
            $data['status'] = FALSE;
        }

        // if($this->input->post('address') == '')
        // {
        //     $data['inputerror'][] = 'address';
        //     $data['error_string'][] = 'Addess is required';
        //     $data['status'] = FALSE;
        // }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    private function _validatee()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_keputusan') == '')
        {
            $data['inputerror'][] = 'id_keputusan';
            $data['error_string'][] = 'Jenis pinjaman harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Staff') == '')
        {
            $data['inputerror'][] = 'id_Staff';
            $data['error_string'][] = 'Staff harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_kptsn') == '')
        {
            $data['inputerror'][] = 'jenis_kptsn';
            $data['error_string'][] = 'Jenis Keputusan harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_kptsn') == '')
        {
            $data['inputerror'][] = 'status_kptsn';
            $data['error_string'][] = 'Jenis Keputusan harus diisi';
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