<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends MY_Model {

	var $table = 'tb_nilai';
	var $column_order = array('username', 'nama_soal', 'tahun_soal', 'nilai', 'tgl_coba',null); //set column field database for datatable orderable
	var $column_search = array('username', 'nama_soal', 'tahun_soal', 'nilai', 'tgl_coba'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tgl_coba' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		//$this->db->select('username,nama_soal, tahun_soal, nilai, tgl_coba');
		if($this->session->userdata('level')=='user'){
			$this->db->where('tb_nilai.id',$this->session->userdata('id'));
		}
		$this->db->from($this->table);
		$this->db->join('user','user.id = tb_nilai.id');
		$this->db->join('tb_paket','tb_paket.id_paket = tb_nilai.id_paket');

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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
