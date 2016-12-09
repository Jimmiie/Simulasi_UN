<?php
class Login_model extends CI_Model
{

    public function login($login)
    {
        $login = (object)$login;

        $where = array(
            'username' => $login->username,
            'password' => md5($login->password),
            'aktif'=>'1'
        );

        // User ada / cocok?
        $this->db->where($where);
        $hasil=$this->db->get('user');
        if ($hasil->num_rows()==1) {
            $row = $hasil->row();
            $data = array(
            'username' => $row->username,
            'login_status' => true,
            'level'=>$row->level,
            'id'=>$row->id,
            );
            $this->session->set_userdata($data);
            return true;
        }
        // Return false jika gagal.
        else{
            $this->session->set_flashdata('pesan_error', 'Username atau Password salah. Atau akun Anda sedang diblokir.');
            return false;
        }
    }

    public function insert($data){
        $data = (object)$data;
        $data->password = md5($data->password);
        $data->aktif='1';
        $data->level='user';
        if($this->db->insert('user',$data)){
            $this->session->set_flashdata('hasil', 'Account berhasil dibuat.');
            return true;
        }
        else {
            $this->session->set_flashdata('pesan_error', 'Username sudah ada.');
            return false;
        }

    }
    public function logout()
    {
        $this->session->sess_destroy();
    }
}