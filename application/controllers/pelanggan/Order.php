<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi','transaksi');

        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Printing - Kategori";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkategori');
        $this->load->view('user/footer');
    }
    public function notapesanan($no)
    {
        $data['order'] = $this->transaksi->orderbyid($no);
        $data['detail'] = $this->transaksi->detailbyid($no);
        $data['judul'] = "ALT Printing - Nota Pesanan";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
}
