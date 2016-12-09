<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi_model extends CI_Model {

	public function listsoal(){
		if(!empty($this->input->get('search'))){
			$cari=$this->input->get('search');
			$key=explode(" ",$cari);
			$this->db->like('nama_soal',$cari);
			$this->db->or_like('tahun_soal',$cari);
			foreach($key as $row){
				$this->db->or_like('nama_soal',$row);
				$this->db->or_like('tahun_soal',$row);
			}
			$hasil=$this->db->get('tb_paket');
			return $hasil;
		}
		else{
			$hasil=$this->db->get('tb_paket');
			return $hasil;
			}
	}

	public function simsoal(){
		$id_paket=$this->input->get('id_paket');
		$this->db->where('id_paket',$id_paket);
		$this->db->order_by('id_soal', 'RANDOM');
		$hasil=$this->db->get('tb_soal');
		return $hasil;
	}

	public function nama(){
		$id_paket=$this->input->get('id_paket');
		$this->db->where('id_paket',$id_paket);
		$hasil=$this->db->get('tb_paket');
		return $hasil;
	}

	public function cekbenar($id_pil){
		$this->db->where('id_pil',$id_pil);
		$this->db->from('tb_pil');
		$this->db->join('tb_soal','tb_soal.id_soal = tb_pil.id_soal');
		$query=$this->db->get();
		return $query;

	}

	public function jawabanbenar($id_soal){
		$where=array(
			'id_soal'=>$id_soal,
			'benar'=>'1',
			);
		$this->db->where($where);
		$this->db->from('tb_pil');
		$hasil=$this->db->get();
		return $hasil;
	}

	public function pilihan($pilih){
		$this->db->where('id_soal',$pilih);
		$this->db->order_by('id_pil', 'RANDOM');
		$hasil=$this->db->get('tb_pil');
		return $hasil;
	}

	public function nilai($data){
		$skor=0;
		foreach ($data as $row) {
			$id_pil=$row;
			$this->db->where('id_pil',$id_pil);
			$query=$this->db->get('tb_pil');
			$hasil=$query->row();
			if( $hasil->benar == '1'){
				$skor+=1;
			}
		}
		$this->db->where('id_pil',$id_pil);
		$this->db->from('tb_pil');
		$this->db->join('tb_soal','tb_soal.id_soal = tb_pil.id_soal');
		$this->db->join('tb_paket','tb_paket.id_paket = tb_soal.id_paket');
		$querynama=$this->db->get();
		$queryn=$querynama->row();
		$id_paket=$queryn->id_paket;
		$nama=$queryn->nama_soal.' '.$queryn->tahun_soal;
		$this->db->where('id_paket',$id_paket);
		$total=$this->db->get('tb_soal');
		$soal=$total->num_rows();
		$skorakhir=($skor/$soal)*100;
		$balik=(object)$nama;
		$balik->nama=$nama;
		$balik->nilai=$skorakhir;
		$inputnilai->id_paket=$id_paket;
		$inputnilai->id=$this->session->userdata('id');
		$inputnilai->nilai=$skorakhir;
		$inputnilai->tgl_coba=date("Ymd");
		$this->db->insert('tb_nilai',$inputnilai);

		return $balik;
	}

}
