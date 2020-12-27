<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk','produk');
        $this->load->model("M_pelanggan");
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Jember - Keranjang";
        $this->load->view('user/header',$data);
        $this->load->view('user/topbar');
        $this->load->view('user/vpemesanan');
        $this->load->view('user/footer');
    }
    public function konfirmasi_pemesanan()
    {
        $data['judul'] = "ALT Jember - Konfirmasi Pemesanan";
        $this->load->view('user/header',$data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
}
