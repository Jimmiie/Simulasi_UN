<?php
class Lihat_model extends CI_Model
{

    public function soal($id_p)
    {
        $this->db->from('tb_soal');
        $this->db->where('id_paket',$id_p);
        $hasil=$this->db->get();
        return $hasil;
    }

    public function judul($id_p){
        $this->db->from('tb_paket');
        $this->db->where('id_paket',$id_p);
        $hasil2= $this->db->get();
        return $hasil2;
    }
    public function pil($id_p)
    {
        $this->db->from('tb_pil');
        $this->db->where('id_soal',$id_p);
        $hasil=$this->db->get();
        return $hasil;
    }
}