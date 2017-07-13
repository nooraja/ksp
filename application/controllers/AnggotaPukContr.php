<?php 

/**
* 
*/
class AnggotaPukContr extends CI_Controller
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

    public function getKoperasi()
    {   
        $anggota = $this->db->select('*')->get('koperasi');
        echo json_encode($anggota->result_array());
    }

    public function getAnggota()
    {
        
        $anggota = $this->db->select('*')->get('anggota');
        echo json_encode($anggota->result_array());
    }

    public function getKeputusan()
    {
        // $anggota = $this->db->select('select id_keputusan, jenis_kptsn from keputusan where keputusan.id_keputusan not in (select anggota_puk.id_keputusan from anggota_puk) ' , FALSE);

        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (select anggota_puk.id_keputusan from anggota_puk) and keputusan.jenis_kptsn = "anggota puk"')
                                ->get('keputusan');

        echo json_encode($anggota->result_array());
        // return $anggota->result_array();
    }

    public function getAnggotaPuk()
    {
        $anggota = $this->db->select('*')
                                ->where('anggota_puk.id_anggota_puk not in (select pinjaman_puk.id_anggota_puk from pinjaman_puk where pinjaman_puk.id_anggota_puk = anggota_puk.id_anggota_puk)')
                                ->get('anggota_puk');
        echo json_encode($anggota->result_array());
    }

    public function viewAnggotaPuk()
    {
        $d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi', $d);
        $this->load->view('Layout/SideBarKoperasi', $d);
        $this->load->view('Anggota/ContentAnggotaPUK' , $d );
    }

    public function ajax_keputusan() {
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
        $this->load->model('ModelAnggotaPuk', 'puk');
        $list = $this->puk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $puk) {
            $no++;
            $row = array();
            $row[] = $puk->id_anggota_puk;
            $row[] = $puk->username;
            // $row[] = $puk->id_Staff_Mod;
            $row[] = $puk->nama_anggota;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_anggota_puk('."'".$puk->id_anggota_puk."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_anggota_puk('."'".$puk->id_anggota_puk."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
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
                'id_anggota_puk'    => $this->input->post('id_anggota_puk'),
                'id_koperasi'       => $this->input->post('id_koperasi'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'id_kordinator'     => $this->input->post('id_kordinator'),
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'nama_anggota'      => $this->input->post('nama_anggota'),
                'no_ktp'            => $this->input->post('no_ktp'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'alamat'            => $this->input->post('alamat'),
                'no_telp'           => $this->input->post('no_telp'),
                'dateby'            => $this->input->post('dateby'),
                'foto'              => $this->input->post('foto'),
                'description'       => $this->input->post('description')
            );

        $insert = $this->puk->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $this->load->model('ModelAnggotaPuk', 'puk');
        $data = $this->puk->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_anggota_puk'    => $this->input->post('id_anggota_puk'),
                'id_koperasi'       => $this->input->post('id_koperasi'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'id_kordinator'     => $this->input->post('id_kordinator'),
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'nama_anggota'      => $this->input->post('nama_anggota'),
                'no_ktp'            => $this->input->post('no_ktp'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'alamat'            => $this->input->post('alamat'),
                'no_telp'           => $this->input->post('no_telp'),
                'dateby'            => $this->input->post('dateby'),
                'foto'              => $this->input->post('foto'),
                'description'       => $this->input->post('description')
            );
        $this->puk->update(array('id_anggota_puk' => $this->input->post('id_anggota_puk')), $data);
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

        if($this->input->post('id_anggota_puk') == '')
        {
            $data['inputerror'][] = 'id_anggota_puk';
            $data['error_string'][] = 'No anggota cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_koperasi') == '')
        {
            $data['inputerror'][] = 'id_koperasi';
            $data['error_string'][] = 'Koperasi cant be null';
            $data['status'] = FALSE;
        }

        // if($this->input->post('id_keputusan') == '')
        // {
        //     $data['inputerror'][] = 'id_keputusan';
        //     $data['error_string'][] = 'No Keputusan cant be null';
        //     $data['status'] = FALSE;
        // }
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'username cant be null';
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

        if($this->input->post('no_ktp') == '')
        {
            $data['inputerror'][] = 'no_ktp';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_kelamin') == '')
        {
            $data['inputerror'][] = 'jenis_kelamin';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }


        if($this->input->post('no_telp') == '')
        {
            $data['inputerror'][] = 'no_telp';
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