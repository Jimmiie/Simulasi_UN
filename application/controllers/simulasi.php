<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends User_Controller {
   
	public function index()
	{
		$hasil=$this->simulasi->listsoal();
		$data=array(
			'main_view' => 'simulasi',
			'list' => $hasil,
			);
		$this->load->view($this->layout, $data);
	}

	public function coba(){
		if(empty($this->input->get('id_paket'))){
			redirect('403');
		}
		else{
			$hasil=$this->simulasi->simsoal();
			$namasoal=$this->simulasi->nama();
			// $hasil=$namasoal->row();
			$data=array(
				'main_view' => 'simulasi_coba',
				'soal'=>$hasil,
				'namasoal'=>$namasoal,
				// 'waktu'=>$hasil->waktu,
				);
			$this->load->view($this->layout,$data);
		}
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

	public function cek(){
		$data1=$this->input->post(null,true);
		$data2=(object)$data1;
		$nilai1=$this->simulasi->nilai($data2);
		$data=array(
			'main_view' => 'hasil',
			'id_pil'=>$data2,
			'nilai'=>$nilai1->nilai,
			'nama'=>$nilai1->nama,
			);
		$this->load->view($this->layout,$data);
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
			$data=array('main_view' => 'edit_soal');
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
