<?php
class Gpassword_model extends MY_Model
{
    public $table = 'user';

    public $form_rules = array(
        array(
            'field' => 'passwordlama',
            'label' => 'Password Lama',
            'rules' => 'trim|required|max_length[10]'
        ),
		array(
            'field' => 'password',
            'label' => 'Password Baru',
            'rules' => 'trim|required|max_length[10]|matches[passconf]|differs[passwordlama]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Konfirmasi Password',
            'rules' => 'trim|required|max_length[10]|matches[password]|differs[passwordlama]'
        ),
    );


	public function cekpswd($peserta){
		$pswd=md5($peserta->passwordlama);
		$this->db->where(array('username'=>$this->session->userdata('username'),'password'=>$pswd));
		$hasil=$this->db->get($this->table);
		if($hasil->num_rows()==1){
			return true;
		}
		else {
			return false;
		}
	}
    public function daftar($peserta)
    {
        unset($peserta->passconf);
		unset($peserta->passwordlama);
		$peserta->password = md5($peserta->password);
        if($this->update(array('username'=> $this->session->userdata('username')), $peserta)){
			return true;}
    }
}