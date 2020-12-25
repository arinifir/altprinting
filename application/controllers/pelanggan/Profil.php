<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_transaksi', 'transaksi');
        $this->load->model('M_produk', 'produk');
        $this->load->model("M_pelanggan");
        //load model pelanggan
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Printing - Profil";
        
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vprofil');
        $this->load->view('user/footer');
    }

    public function editprofil()
    {

    }

    public function pesanansaya()
    {
        $id= $this->session->userdata('id_user');
        if($id){
            $data['order'] = $this->transaksi->getOrderUser($id);
            $data['judul'] = "ALT Printing - Pesanan Saya";
            $this->load->view('user/header', $data);
            $this->load->view('user/topbar');
            $this->load->view('user/vpesanansaya');
            $this->load->view('user/footer');
        }else{
            redirect('User');
        }
    }
    public function riwayatpesanan()
    {
        $id= $this->session->userdata('id_user');
        if($id){
            $data['order'] = $this->transaksi->getOrderDone($id);
            $data['judul'] = "ALT Printing - Riwayat Pesanan";
            $this->load->view('user/header', $data);
            $this->load->view('user/topbar');
            $this->load->view('user/vriwayatpesanan');
            $this->load->view('user/footer');
        }else{
            redirect('User');
        }
    }
}
