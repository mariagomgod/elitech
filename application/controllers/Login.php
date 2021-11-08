<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginmodel');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->Loginmodel->login($username, $password))
        {
            redirect('/employees', 'location');
        }
        else
        {
            redirect('/login', 'location'); 
        }
        
    }
}