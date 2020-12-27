<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Jember - Kontak";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkontak');
        $this->load->view('user/footer');
    }
}
