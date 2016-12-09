<?php
class Admin_Controller extends My_Controller
{
    public $layout = 'nav';

    public function __construct()
    {
        parent::__construct();
	
       
	   //session_start();

        // Cek status login user.
        $username = $this->session->userdata('username');
        $level = $this->session->userdata('level');
        $login_status = $this->session->userdata('login_status');

        // Cek status login.
        if ( ($login_status !== true) && empty($username) ) {
            redirect('login');
        }

        // Pastikan hanya "hrd" yang boleh mengakses.
        if ($level != 'admin') {
            redirect('error');
        }
    }
}