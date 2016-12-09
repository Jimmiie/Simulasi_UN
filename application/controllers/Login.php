<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
    }

    public function index()
    {               
        if ($this->session->userdata('login_status')){
            redirect('home');
            }
        else{
            $this->load->view('login');
        }
        // Validasi.
        if ($this->input->post(null, true)) {
            $login = $this->input->post(null, true);
        if (! $this->login->login($login)) {
            $this->session->set_flashdata('pesan_error', 'Username atau Password salah. Atau akun Anda sedang diblokir.');
            redirect('login');}
        else redirect('home');}

    }

    public function logout()
    {
        $this->login->logout();
        redirect('login');
    }
    public function daftar(){
       if($this->input->post(null,true)){
            $data = $this->input->post(null, true);
            if($this->login->insert($data)){
                redirect('login');    
            }
            else {
                redirect('login');   
            }
        }
    }
}