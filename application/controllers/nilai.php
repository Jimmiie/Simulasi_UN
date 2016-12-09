<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends User_Controller {
	
	public $data = array(
        'main_view' => 'nilai_view'
    );

	public function index()
	{	
		$this->load->view($this->layout, $this->data);
	}

	public function ajax_list()
	{
		$list = $this->nilai->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->username;
			$row[] = $person->nama_soal;
			$row[] = $person->tahun_soal;
			$row[] = $person->nilai;
			$row[] = $person->tgl_coba;
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->nilai->count_all(),
						"recordsFiltered" => $this->nilai->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

}
