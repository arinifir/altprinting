<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['produk'] = $this->M_produk->getAll();
        $data['judul'] = "ALT Printing - Home";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vberanda');
        $this->load->view('user/footer');
    }
}
