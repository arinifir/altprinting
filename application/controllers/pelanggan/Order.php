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
        $this->load->library('configemail');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Jember - Kategori";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkategori');
        $this->load->view('user/footer');
    }
    public function inputpesanan()
    {
        $no = '5128179731801';
        $this->kirimnota($no);
        $this->notapesanan($no);
    }
    public function notapesanan($no)
    {
        $data['order'] = $this->transaksi->orderbyid($no);
        $data['detail'] = $this->transaksi->detailbyid($no);
        $data['judul'] = "ALT Jember - Nota Pesanan";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
    public function kirimnota($no)
    {
        $this->configemail->email_config();
        $from = "altprinting3@gmail.com";
        $subject = "Halo Pelanggan ALT Printing Jember";
        $data['order'] = $this->db->query('select * from tb_transaksi where no_transaksi='.$no)->row();
        $data['detail'] = $this->db->query('select * from tb_dtrans where no_transaksi='.$data['order']->no_transaksi)->result();
        // $message = $data['transaksi']->nama_pembeli;
        $data['judul'] = "ALT Printing - Nota Pesanan";
        $message = $this->load->view('email/vorder', $data, true);
        $this->email->from($from, 'ALT Printing Jember');
        $this->email->to($data['order']->email_pembeli);
        $this->email->subject($subject);
        $this->email->message($message); 
        $this->email->send();
        $this->session->set_flashdata('berhasil', 'Terima kasih sudah melakukan pemesanan di ALT Printing Jember. Silahkan cek email Anda untuk melihat detail pesanan Anda.');
    }
}
