<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        // $this->load->model('m_admin');
        //load helper login
        $this->load->helper('auth_helper');
    }
    public function index()
    {
        $this->load->view('vlogin');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
