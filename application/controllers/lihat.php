<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class lihat extends Admin_Controller{

	public function index(){
		$id_paket=$this->input->get('id_paket');
		$soal=$this->lihat->soal($id_paket);
		$data=array('soal'=>$soal,
			'main_view'=>'lihatsoal');
		foreach($soal->result() as $id){
			$id_p=$id->id_soal;
			$pil=$this->lihat->pil($id_p);
			$data1=array('pili'=>$pil);
			$data=array_merge($data,$data1);
		}

		$judul=$this->lihat->judul($id_paket);
		$hasil3 = $judul->row();
		$data4=array('judul'=>$hasil3->nama_soal.' '.$hasil3->tahun_soal);
		$data=array_merge($data,$data4);

		$this->load->view($this->layout,$data);
	}
}