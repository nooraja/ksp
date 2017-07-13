<?php 

/**
* 
*/
class AnggotaContr extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Sekretaris' && $this->session->userdata('level') <> 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModelAnggota', 'ago');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function getKeputusan()
    {
        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (SELECT anggota.id_keputusan FROM anggota) and keputusan.jenis_kptsn = "Anggota Baru" ')
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

    public function getAnggota()
    {
        $anggota = $this->db->select('*')->get('anggota');
        echo json_encode($anggota->result_array());
    }

    public function getStaff()
    {
        $anggota = $this->db->select('*')->where('level','Sekretaris')->get('staff');
        echo json_encode($anggota->result_array());
    }

    public function viewAnggota()
    {
        $d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi', $d);
        $this->load->view('Layout/SideBarKoperasi', $d);
        $this->load->view('Anggota/ContentPermohonanAnggota' , $d);
    }

    public function getKoperasi()
    {
        $anggota = $this->db->select('*')->get('koperasi');
        echo json_encode($anggota->result_array());
    }
    
    public function ajax_list()
    {
        $list = $this->ago->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $anggota) {
            $no++;
            $row = array();
            $row[] = $anggota->id_anggota;
            $row[] = $anggota->username;
            // $row[] = $anggota->id_Staff_Mod;
            $row[] = $anggota->nama_anggota;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_anggota('."'".$anggota->id_anggota."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_anggota('."'".$anggota->id_anggota."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ago->count_all(),
                        "recordsFiltered" => $this->ago->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_choice()
    {
        $this->_validate();
        $data = array(
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'jenis_kptsn'       => $this->input->post('jenis_kptsn'),
                'dateby'            => $this->input->post('dateby'),
                'status'            => $this->input->post('status'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->ago->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_koperasi'       => $this->input->post('id_koperasi'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Pembuat'),
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'nama_anggota'      => $this->input->post('nama_anggota'),
                'no_ktp'            => $this->input->post('no_ktp'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'alamat'            => $this->input->post('alamat'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'no_telp'           => $this->input->post('no_telp'),
                'nama_pasangan'     => $this->input->post('nama_pasangan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'pekerjaan_pasangan'=> $this->input->post('pekerjaan_pasangan'),
                'jumlah_anak'       => $this->input->post('jumlah_anak'),
                'email'             => $this->input->post('email'),
                'dateby'            => $this->input->post('dateby'),
                'foto'              => $this->input->post('foto'),
                'status_anggota'    => $this->input->post('status_anggota'),
                'description'       => $this->input->post('description')
            );
        $insert = $this->ago->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->ago->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_anggota'        => $this->input->post('id_anggota'),
                'id_koperasi'       => $this->input->post('id_koperasi'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'      => $this->input->post('id_Staff_Pembuat'),
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'nama_anggota'      => $this->input->post('nama_anggota'),
                'no_ktp'            => $this->input->post('no_ktp'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'alamat'            => $this->input->post('alamat'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'no_telp'           => $this->input->post('no_telp'),
                'nama_pasangan'     => $this->input->post('nama_pasangan'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'pekerjaan_pasangan'=> $this->input->post('pekerjaan_pasangan'),
                'jumlah_anak'       => $this->input->post('jumlah_anak'),
                'email'             => $this->input->post('email'),
                'dateby'            => $this->input->post('dateby'),
                'foto'              => $this->input->post('foto'),
                'status_anggota'    => $this->input->post('status_anggota'),
                'description'       => $this->input->post('description')
            );
        $this->ago->update(array('id_anggota' => $this->input->post('id_anggota')), $data);
        echo json_encode(array("status" => TRUE));
    
    }

    public function ajax_delete($id){
        $this->ago->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        $datas = $this->session->has_userdata('id_anggota');
        if($_SESSION['id_anggota'] == $this->input->post('id_anggota')) {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'No anggota tidak boleh sama';
            $data['status'] = FALSE;
        } 

        if($this->input->post('id_anggota') == '')
        {
            $data['inputerror'][] = 'id_anggota';
            $data['error_string'][] = 'No anggota cant be null';
            $data['status'] = FALSE;
        }
        // else if (!isset($datas)||$datas != $this->input->post('id_anggota')) {
        //     $data['inputerror'][] = 'id_anggota';
        //     $data['error_string'][] = 'No anggota cant be null';
        //     $data['status'] = FALSE;
        // }

        if($this->input->post('id_koperasi') == '')
        {
            $data['inputerror'][] = 'id_koperasi';
            $data['error_string'][] = 'Koperasi cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_keputusan') == '')
        {
            $data['inputerror'][] = 'id_keputusan';
            $data['error_string'][] = 'No Keputusan cant be null';
            $data['status'] = FALSE;
        }
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

        if($this->input->post('tgl_lahir') == '')
        {
            $data['inputerror'][] = 'tgl_lahir';
            $data['error_string'][] = 'This tanggal lahir cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telp') == '')
        {
            $data['inputerror'][] = 'no_telp';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_perkawinan') == '')
        {
            $data['inputerror'][] = 'status_perkawinan';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('dateby') == '')
        {
            $data['inputerror'][] = 'dateby';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_anggota') == '')
        {
            $data['inputerror'][] = 'status_anggota';
            $data['error_string'][] = 'This cant be null';
            $data['status'] = FALSE;
        }

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