<?php
class Home extends User_Controller
{
    public $data = array(
        'main_view' => 'home'
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}