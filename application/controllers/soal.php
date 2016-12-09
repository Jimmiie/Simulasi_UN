<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends Admin_Controller {
   
    public $data = array(
        'main_view' => 'soal_view'
    );

	public function __construct()
	{
		parent::__construct();
		$this->load->model('soal_model','person');
	}

	public function index()
	{
		//$this->load->helper('url');
		$this->load->view($this->layout, $this->data);
	}

	public function hapus(){
		if(!empty($this->input->get('id_soal'))&&!empty($this->input->get('id_paket'))){
			$hasil=$this->soal->delete_soal();
			if($hasil){
				$id_paket=$this->input->get('id_paket');
				redirect("lihat?id_paket=$id_paket");
			}
		}
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->nama_soal;
			$row[] = $person->tahun_soal;
			$row[] = $person->waktu;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="lihat?id_paket='.$person->id_paket.'" title="View"><i class="glyphicon glyphicon-pencil"></i> View</a> <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_paket."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_paket."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

		public function ajax_add()
	{
		//$this->_validate();
		$data = array(
				'nama_soal' => $this->input->post('nama_soal'),
				'tahun_soal' => $this->input->post('tahun_soal'),
				'waktu' => $this->input->post('waktu'));
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		echo json_encode($data);
	}

		public function ajax_edit_soal($id)
	{
		$data = $this->person->get_soal_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
				'nama_soal' => $this->input->post('nama_soal'),		
				'tahun_soal' => $this->input->post('tahun_soal'),
				'waktu' => $this->input->post('waktu'),
			);
				
		$this->person->update(array('id_paket' => $this->input->post('id_paket')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function edit(){
		if(!empty($this->input->post('submit'))){
			if($this->input->post('submit')=='tambah'){
				$balik = $this->soal->tambahsoal();
				if($balik){
					$id_paket=$this->input->post('id_paket');
					redirect("lihat?id_paket=$id_paket");
				}
			}
		}
		else{
			redirect('404');
		}
	}

	public function edit_soal(){
		$id_soal=$this->input->get('id_soal');
		if(!empty($id_soal)){
			$hasil= $this->soal->get_soal_by_id($id_soal);
			$nama=$this->soal->carinama($id_soal);
			$data=array('main_view' => 'edit_soal',
				'nama' => $nama);
			$data=array_merge($data,$hasil);
			$this->load->view($this->layout, $data);
		}
		else{
			redirect('404');
		}
	}

	public function edit_soal_proses(){
		if($this->input->post(null,true)){
			//id paket belum
			$nilai=$this->soal->update_soal();
			if(!empty($nilai)){
				redirect("lihat?id_paket=$nilai");
			}
			else{
				echo $nilai;
			}
		}
		else{
				redirect('404');
			}
	}
}
