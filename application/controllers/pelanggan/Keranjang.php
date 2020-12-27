<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk','produk');
        $this->load->model("M_pelanggan");
        //load model pelanggan
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        // var_dump($this->cart->contents());die;
        $data['judul'] = "ALT Printing - Keranjang";
        $this->load->view('user/header',$data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkeranjang');
        $this->load->view('user/footer');
    }
    public function addcart()
    { 
        $kd_produk = $this->input->post('kode_produk',true);
        $kd_paket = $this->input->post('kode_paket',true);
        $nama = $this->input->post('nama_produk',true);
        $jumlah = $this->input->post('quantity',true);
        $harga = $this->input->post('harga',true); 
        $data = array(
            'id'      => $kd_produk,
            'name'   => $nama,
            'qty'   => $jumlah,
            'price'    => $harga,
            'options' => array('kd_paket' => $kd_paket)
        );
        // var_dump($data);
        $this->cart->insert($data);
        $this->session->set_flashdata('berhasil', 'Data ditambahkan ke keranjang');
        redirect($this->agent->referrer());
    }
    public function delcart($id){
        $this->cart->remove($id);
        redirect($this->agent->referrer());
    }
}
