<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk', 'produk');
        $this->load->model('M_admin', 'admin');
        $this->load->model("M_pelanggan");
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $kategori = $this->input->get('ktg');
        $harga_min = $this->input->get('min');
        $harga_max = $this->input->get('max');
        if ($kategori || $harga_min || $harga_max) {
            $data['produk'] = $this->produk->getByFilter($harga_min, $harga_max, $kategori)->result();
        } else {
            $data['produk'] = $this->produk->getAll();
        }
        // var_dump($data['produk']);die;
        $data['produk'] = $this->M_pelanggan->getAll('tb_produk');
        $data['kategori'] = $this->M_pelanggan->getAll('tb_kategori');
        $data['judul'] = "ALT Printing - Kategori";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkategori');
        $this->load->view('user/footer');
    }
    public function detail_produk()
    {
        $kode = "00012782";
        $data['produk'] = $this->produk->getProduk($kode);
        $data['paket'] = $this->admin->paketbykode($kode);
        $data['judul'] = "ALT Printing - Detail Produk";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/detailproduk');
        $this->load->view('user/footer');
    }
}
