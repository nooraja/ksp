<?php 

/**
* 
*/
class PukContr extends CI_Controller
{
	
	function index()
	{
		$d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi', $d);
        $this->load->view('Layout/SideBarKoperasi', $d);
		$this->load->view('Pinjaman/ContentPUK', $d);
	}

    public function getKeputusan()
    {
        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (SELECT pinjaman_puk.id_keputusan FROM pinjaman_puk)')
                                ->get('keputusan');
                                
        echo json_encode($anggota->result_array());
    }

    public function getAnggotaPUK()
    {
        $anggota = $this->db->select('anggota_puk.id_anggota, anggota_puk.nama_anggota')
                                ->where('anggota_puk.id_anggota not in (SELECT pinjaman_puk.id_anggota_puk FROM pinjaman_puk)')
                            ->get('anggota_puk');
        echo json_encode($anggota->result_array());
    }

    public function ajax_keputusan() {
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

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Bendahara' && $this->session->userdata('level') != 'Ketua')
        {
            redirect('login');
        }
        $this->load->model('ModPUK', 'puk');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function getStaff()
    {
        // $this->db->where('id_Jenis_Pinjaman', 'JP0001');
        $anggota = $this->db->select('*')->where('level', 'Bendahara')->get('staff');
        echo json_encode($anggota->result_array());
    }


    public function getBuktiPuk()
    {
        $anggota = $this->db->select('*')->where('id_Jenis_Pinjaman', 'JP0002')->get('bukti_transaksi_pinjaman');
        echo json_encode($anggota->result_array());
    }
    
    
    public function ajax_list()
    {
        $list = $this->puk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $puk) {
            $no++;
            $row = array();
            $row[] = $puk->id_puk;
			$row[] = $puk->dateby;
            $row[] = $puk->id_Bukti_Pinjaman;
            $row[] = $puk->id_anggota_puk;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pinjaman('."'".$puk->id_puk."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pinjaman('."'".$puk->id_puk."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->puk->count_all(),
                        "recordsFiltered" 	=> $this->puk->count_filtered(),
                        "data" 				=> $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_puk'            => $this->input->post('id_puk'),
                'id_anggota_puk'    => $this->input->post('id_anggota_puk'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                // 'id_Staff_Mod'      => $this->input->post('id_Staff_Mod'),
                'id_Staff_Mod'      => NULL,
                'id_Bukti_Pinjaman' => $this->input->post('id_Bukti_Pinjaman'),
                'dateby'            => $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );


        $insert = $this->puk->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id){
        $data = $this->puk->get_by_id($id);
        $data->dateby = ($data->dateby == '0000-00-00') ? '' : $data->dateby; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }    

    public function ajax_update(){
        $this->_validate();
        $data = array(
                'id_puk'            => $this->input->post('id_puk'),
                'id_anggota_puk'    => $this->input->post('id_anggota_puk'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'  	=> $this->input->post('id_Staff_Mod'),
                'id_Bukti_Pinjaman' => $this->input->post('id_Bukti_Pinjaman'),
                'dateby'          	=> $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->puk->update(array('id_puk' => $this->input->post('id_puk')), $data);
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

        if($this->input->post('id_puk') == '')
        {
            $data['inputerror'][] = 'id_puk';
            $data['error_string'][] = 'No puk cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_anggota_puk') == '')
        {
            $data['inputerror'][] = 'id_anggota_puk';
            $data['error_string'][] = 'Anggota cant be null';
            $data['status'] = FALSE;
        }
        if($this->input->post('id_Bukti_Pinjaman') == '')
        {
            $data['inputerror'][] = 'id_Bukti_Pinjaman';
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