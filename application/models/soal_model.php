<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class soal_model extends CI_Model {

	var $table = 'tb_paket';
	var $column_order = array('nama_soal','tahun_soal','waktu',null); //set column field database for datatable orderable
	var $column_search = array('nama_soal','tahun_soal','waktu'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tahun_soal' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function carinama($id_soal){
		$this->db->where('id_soal',$id_soal);
		$this->db->from('tb_soal');
		$this->db->join('tb_paket','tb_paket.id_paket= tb_soal.id_paket');
		$query=$this->db->get();
		$hasil=$query->row();
		$nama= $hasil->nama_soal.' '.$hasil->tahun_soal;
		return $nama;
	}
	public function tambahsoal(){
			$id_paket = $this->input->post('id_paket');
			$soal = $this->input->post('soal');
			$pil1 = $this->input->post('pil1');
			$pil2 = $this->input->post('pil2');
			$pil3 = $this->input->post('pil3');
			$pil4 = $this->input->post('pil4');
			$data1->id_paket=$id_paket;
			$data1->soal=$soal;

			$this->db->insert('tb_soal',$data1);
			$hasil=$this->db->insert_id();

			if(!empty($hasil)){
				$data2=array(
					array(
						'id_soal'=>$hasil,
						'pil'=>$pil1,
						'benar'=>'1'
						),
					array(
						'id_soal'=>$hasil,
						'pil'=>$pil2,
						'benar'=>'0'
						),
					array(
						'id_soal'=>$hasil,
						'pil'=>$pil3,
						'benar'=>'0'
						),
					array(
						'id_soal'=>$hasil,
						'pil'=>$pil4,
						'benar'=>'0'
						)
					);
				$this->db->insert_batch('tb_pil', $data2);
				$hasil_pil=$this->db->insert_id();
				if(!empty($hasil_pil)){
					return true;
				}
			}

	}
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

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

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_paket',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function delete_soal(){
		$id_soal=$this->input->get('id_soal');
		$this->db->where('id_soal',$id_soal);
		if($this->db->delete('tb_soal')){
			$this->db->where('id_soal',$id_soal);
			if($this->db->delete('tb_pil')){
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	public function get_soal_by_id($id)
	{
		$this->db->from('tb_soal');
		$this->db->where('id_soal',$id);
		$query = $this->db->get();
		$hasil=$query->row();
		$this->db->from('tb_pil');
		$this->db->where('id_soal',$id);
		$query2 = $this->db->get();
		foreach($query2->result() as $row){
			if(empty($pil1)){
				$pil1=$row->pil;
			}
			elseif (empty($pil2)) {
				$pil2=$row->pil;
			}
			elseif (empty($pil3)){
				$pil3=$row->pil;
			}
			elseif (empty($pil4)){
				$pil4=$row->pil;
			}
		}
		$balik=array(
			'soal'=>$hasil->soal,
			'pil1'=>$pil1,
			'pil2'=>$pil2,
			'pil3'=>$pil3,
			'pil4'=>$pil4,
		);
		return $balik;
	}

	public function update_soal(){
		$id_soal=$this->input->post('id_soal');
		$soal=$this->input->post('soal');
		$pil1=$this->input->post('pil1');
		$pil2=$this->input->post('pil2');
		$pil3=$this->input->post('pil3');
		$pil4=$this->input->post('pil4');

			$data1->soal=$soal;
			$this->db->where('id_soal',$id_soal);
			$this->db->update('tb_soal',$data1);

			$this->db->where('id_soal',$id_soal);
			$this->db->delete('tb_pil');
				$data2=array(
					array(
						'id_soal'=>$id_soal,
						'pil'=>$pil1,
						'benar'=>'1'
						),
					array(
						'id_soal'=>$id_soal,
						'pil'=>$pil2,
						'benar'=>'0'
						),
					array(
						'id_soal'=>$id_soal,
						'pil'=>$pil3,
						'benar'=>'0'
						),
					array(
						'id_soal'=>$id_soal,
						'pil'=>$pil4,
						'benar'=>'0'
						)
					);
				$this->db->insert_batch('tb_pil', $data2);
				$hasil_pil=$this->db->insert_id();
				// if(!empty($hasil_pil)){
					$this->db->where('id_soal',$id_soal);
					$query3=$this->db->get('tb_soal');
					$query4=$query3->row();
					$id_paket=$query4->id_paket;
					return $id_paket;
				// }
			
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_paket', $id);
		$query=$this->db->get('tb_soal');
		foreach ($query->result() as $row) {
			$this->db->where('id_soal',$row->id_soal);
			$this->db->delete('tb_pil');
		}
		$this->db->where('id_paket', $id);
		$this->db->delete('tb_soal');
		$this->db->where('id_paket', $id);
		$this->db->delete($this->table);
	}
}
