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
        // $harga_min = explode('.',$this->input->get('min'));
        // $harga_max = explode('.',$this->input->get('max'));
        $harga_min = $this->input->get('min');
        $harga_max = $this->input->get('max');
        // var_dump($harga_min);die;
        if ($kategori || $harga_min || $harga_max) {
            $data['produk'] = $this->produk->getByFilter($harga_min, $harga_max, $kategori)->result();
        } else {
            $data['produk'] = $this->produk->getAll();
        }
        // var_dump($data['produk']);die;
        $data['kategori'] = $this->M_pelanggan->getAll('tb_kategori');
        $data['judul'] = "ALT Jember - Kategori";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkategori');
        $this->load->view('user/footer');
    }

    public function detail_produk()
    {
        $kode = "00012782";
        $data['produk'] = $this->produk->getProduk($kode);
        $data['ulasan'] = $this->produk->getUlasan($kode);
        $data['paket'] = $this->admin->paketbykode($kode);
        $data['judul'] = "ALT Jember - Detail Produk";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/detailproduk');
        $this->load->view('user/footer');
    }

    public function addulasan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect($this->agent->referrer());
        }
        $produk = $this->input->post('kode',true); 
        $nama = $this->input->post('nama',true);
        $email = $this->input->post('email',true);
        $isi = $this->input->post('isi',true);
        $rating = $this->input->post('rating',true);

        $data=[
            'kd_produk' => $produk, 
            'nama_ulas' => $nama, 
            'email_ulas' =>$email, 
            'isi_ulas' => $isi, 
            'rating_ulas' => $rating
        ];
        var_dump($data);
        $this->admin->addData('tb_ulasan',$data);
        $this->session->set_flashdata('berhasil', 'Terima kasih');
        redirect($this->agent->referrer());
    }
}
