<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        // $this->load->model('m_admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        sadmin_logged_in();
    }
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdashboard');
        $this->load->view('admin/footer');
    }
}
