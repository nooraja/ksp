<?php 

/**
* 
*/
class PinjamanContr extends CI_Controller
{
	
	function index()
	{
		$d['title']  = 'Login Koperasi';
        $d['judul']  = 'Koperasi Wanita "Tunas Wanita Abadi"';
        $d['staff']  = $this->session->userdata('id_Staff');
        $this->load->view('Layout/HeaderKoperasi', $d);
        $this->load->view('Layout/SideBarKoperasi', $d);
		$this->load->view('Pinjaman/ContentPinjaman' ,$d);
	}

    public function getKeputusan()
    {
        $anggota = $this->db->select('keputusan.id_keputusan, keputusan.jenis_kptsn')
                                ->where('keputusan.id_keputusan not in (SELECT pinjaman.id_keputusan FROM pinjaman) and keputusan.jenis_kptsn = "Pinjaman Anggota" ')
                                ->get('keputusan');
                                
        echo json_encode($anggota->result_array());
    }

    public function getAnggota()
    {
        $anggota = $this->db->select('anggota.id_anggota, anggota.nama_anggota')
                                ->where('anggota.id_anggota not in (SELECT pinjaman.id_Anggota FROM pinjaman)')
                            ->get('anggota');
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

	public function setTransPinjaman()
	{
		$this->load->model('modelpinjaman');
        $data['transpinjaman'] = $this->modelpinjaman->getTransPinjaman()->result();

        $this->load->view('Layout/HeaderKoperasi');
        $this->load->view('Layout/SideBarKoperasi');
		$this->load->view('Pinjaman/ContentTransPinjaman', $data);
	}

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Ketua' && $this->session->userdata('level') != 'Bendahara')
        {
            redirect('login');
        }
        $this->load->model('ModelPinjaman', 'pinjaman');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('url'));
    }

    public function getPinjaman()
    {
        $resultado = $this->db->select('*')->where('id_Jenis_Pinjaman', 'JP0001')->get('bukti_transaksi_pinjaman');
        echo json_encode($resultado->result_array());
    }
    
    
    public function ajax_list()
    {
        $list = $this->pinjaman->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pinjaman) {
            $no++;
            $row = array();
            $row[] = $pinjaman->id_pinjaman;
			$row[] = $pinjaman->dateby;
            $row[] = $pinjaman->id_Bukti_Pinjaman;
            $row[] = $pinjaman->id_Anggota;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pinjaman('."'".$pinjaman->id_pinjaman."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pinjaman('."'".$pinjaman->id_pinjaman."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }
        // echo $list;
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->pinjaman->count_all(),
                        "recordsFiltered" 	=> $this->pinjaman->count_filtered(),
                        "data" 				=> $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
                'id_Anggota'        => $this->input->post('id_Anggota'),
                'id_pinjaman'       => $this->input->post('id_pinjaman'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'  	=> $this->input->post('id_Staff_Mod'),
                'id_Bukti_Pinjaman' => $this->input->post('id_Bukti_Pinjaman'),
                'dateby'          	=> $this->input->post('dateby'),
                'description'       => $this->input->post('description')
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
                'id_Anggota'        => $this->input->post('id_Anggota'),
                'id_pinjaman'       => $this->input->post('id_pinjaman'),
                'id_keputusan'      => $this->input->post('id_keputusan'),
                'id_Staff_Pembuat'  => $this->input->post('id_Staff_Pembuat'),
                'id_Staff_Mod'  	=> $this->input->post('id_Staff_Mod'),
                'id_Bukti_Pinjaman' => $this->input->post('id_Bukti_Pinjaman'),
                'dateby'          	=> $this->input->post('dateby'),
                'description'       => $this->input->post('description')
            );
        $this->pinjaman->update(array('id_pinjaman' => $this->input->post('id_pinjaman')), $data);
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

        if($this->input->post('id_pinjaman') == '')
        {
            $data['inputerror'][] = 'id_pinjaman';
            $data['error_string'][] = 'No pinjaman cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_keputusan') == '')
        {
            $data['inputerror'][] = 'id_keputusan';
            $data['error_string'][] = 'Keputusan cant be null';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_Anggota') == '')
        {
            $data['inputerror'][] = 'id_Anggota';
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