<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk', 'produk');
        $this->load->model("M_pelanggan", 'pelanggan');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        if ($id) {
            $cekalamat = $this->pelanggan->checkAddress($id);
            if ($cekalamat > 0) {
                $data['user'] = $this->pelanggan->getUserById($id);
                $data['alamat'] = $this->pelanggan->getAddress($id);
                $data['kondisi'] =1;
            }else{
                $data['user'] = $this->pelanggan->getUserById($id);
                $data['kondisi'] =2;
            }
        }else{
            $data['kondisi'] = 0;
        }
        $data['judul'] = "ALT Printing - Checkout";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vpemesanan');
        $this->load->view('user/footer');
    }
    public function konfirmasi_pemesanan()
    {
        $data['judul'] = "ALT Printing - Konfirmasi Pemesanan";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
}
