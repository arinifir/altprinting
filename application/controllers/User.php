<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        $this->load->model("M_pelanggan");
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {

        $data['judul'] = "ALT Jember - Home";
        $data['produk'] = $this->M_pelanggan->getAll('tb_produk');
        $data['kategori'] = $this->M_pelanggan->getAll('tb_kategori');
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vberanda', $data);
        $this->load->view('user/footer');
    }
}
