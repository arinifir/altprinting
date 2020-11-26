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
        // $this->load->view('admin/header');
        // $this->load->view('admin/topbar');
        // $this->load->view('admin/sidebar');
        // $this->load->view('admin/vdashboard');
        // $this->load->view('admin/footer');
        $this->load->view('vlogin');
        // $this->load->view('myjs');
    }
}
