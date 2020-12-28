<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi','transaksi');
        $this->load->model('M_admin','admin');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Jember - Konfirmasi Pembayaran";
        $this->load->view('user/header',$data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkonfirmasi');
        $this->load->view('user/footer');
    }
    public function caripesanan()
    {
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $nomor = $this->input->post('nomor',true);
        $email = $this->input->post('email',true);
        // $status = 1;
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Silahkan isi Nomor Pesanan dan Email yang valid!</div>');
            redirect('pelanggan/Konfirmasi');
        }
        $cekdata = $this->transaksi->cekTrans($nomor,$email);
        if($cekdata == 0){
            $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Tidak ada data pesanan yang sesuai!</div>');
            redirect('pelanggan/Konfirmasi');
        }else{
            redirect('pelanggan/Order/notapesanan/'.$nomor);
        }
    }
    public function upload($no)
    {
        $data['nomor'] = $no;
        $data['order'] = $this->transaksi->orderbyid($no);
        $cek = $data['order']->status_transaksi;
        if($cek==0 || $cek==5){
            $this->session->set_flashdata('gagal','Pesanan Anda telah selesai atau dibatalkan');
            redirect($this->agent->referrer());
        }else if($cek >= 2){
            $this->session->set_flashdata('gagal','Anda sudah melakukan pembayaran. Silahkan cek email Anda.');
            redirect($this->agent->referrer());
        }
        $data['judul'] = "ALT Jember - Konfirmasi Pembayaran";
        $this->load->view('user/header',$data);
        $this->load->view('user/topbar');
        $this->load->view('user/vuploadbukti');
        $this->load->view('user/footer');
    }
    public function uploadfile()
    {
        $nomor = $this->input->post('nomor');
        $gambar = $_FILES['gambar']['name'];
        $format = 'jpg|png|jpeg|jfif|gif';
        if ($gambar) {
            $this->primslib->upload_image('gambar', $gambar, $format, 10000);
            $this->db->set('bukti_pembayaran', $gambar);
        }else{
            redirect($this->agent->referrer());
        }
        $status = 2; 
        $data = [
            'status_transaksi' => $status
        ];
        $where = ['no_transaksi' => $nomor];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Upload Bukti Pembayaran');
        redirect('pelanggan/Order/notapesanan/'.$nomor);
    }
}
