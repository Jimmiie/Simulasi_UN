<?php
class User_Controller extends MY_Controller
{
    // Layout untuk "user"
    public $layout = 'nav';

    public function __construct()
    {
        parent::__construct();

       // session_start();

        // Cek status login user.
        $username = $this->session->userdata('username');
        $user_level = $this->session->userdata('level');
        $login_status = $this->session->userdata('login_status');

        if ( ($login_status !== true) && empty($username) ) {
            redirect('login');
        }
    }
}