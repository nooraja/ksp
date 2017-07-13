<?php 

class ModelKelompok extends CI_Model
{

	var $tables = 'kelompok';   //variabel tabelnya
    var $order = array('id_KWM' => 'desc'); // default order 

    var $column_order = array('id_KWM', 'id_Koperasi', 'id_Staff_Pembuat', 'id_Staff_Mod', 'id_Anggota_Ketua_Kelompok', 'nama_Kelompok', 'dateby', 'description'); 
    var $column_search = array('id_KWM','nama_Kelompok','dateby'); //set column field database for datatable searchable just firstname , lastname , address are searchable
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


	public function getListAnggota()
	{
		$listanggota = $this->db->get('kelompok');
		return $listanggota;
	}

    private function _get_datatables_query()
    {
        $this->db->from($this->tables);

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {


        $this->db->from($this->tables);
        return $this->db->count_all_results();
    }
    
    public function get_by_id($id)
    {


        $this->db->from($this->tables);
        $this->db->where('id_KWM',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {


        $this->db->insert($this->tables, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {


        $this->db->update($this->tables, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_KWM', $id)

        ;
        $this->db->delete($this->tables);
    }
    

   public function showAllAnggota()
    {
        // $this->db->order_by('dateby', 'desc');
        $kelompok = $this->db->get('kelompok');
        if($kelompok->num_rows() > 0){
            return $kelompok->result();
        }else{
            return false;
        }
    }
}


?>