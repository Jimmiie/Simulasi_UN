<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends Admin_Controller {
   
    public $data = array(
        'main_view' => 'user_view'
    );

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','person');
	}

	public function index()
	{
		//$this->load->helper('url');
		$this->load->view($this->layout, $this->data);
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->username;
			$row[] = $person->level;
			$row[] = $person->aktif;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
		
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

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'aktif' => $this->input->post('aktif'),		
				'level' => $this->input->post('level'),
			);
			if($this->input->post('password')!=''){
		$data = array(
			'password' => md5($this->input->post('password')),
			'level' => $this->input->post('level'),
			'aktif' => $this->input->post('aktif'),
			);}
				
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('level') == '')
		{
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'The Level field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('aktif') == '')
		{
			$data['inputerror'][] = 'aktif';
			$data['error_string'][] = 'The Aktif field is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') != $this->input->post('confpassword'))
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'The Password field does not match the Konfirmasi Password field.';
			$data['inputerror'][] = 'confpassword';
			$data['error_string'][] = 'The Konfirmasi Password field does not match the Password field.';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
