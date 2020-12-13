<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin', 'M_pelanggan');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        admin_logged_in();
    }

    //kategori
    public function datakategori()
    {
        $data['kategori'] = $this->admin->tampilkategori();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkategori', $data);
        $this->load->view('admin/footer');
    }
    public function addkategori()
    {
        $cekkode = $this->admin->cekkode();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($cekkode, 3, 2);
        $nourut++;
        $char = "KTG";
        $kode = $char . sprintf("%02s", $nourut);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/datakategori');
        } else {
            $nama = $this->input->post("kategori", TRUE);
            $data = [
                'kd_kategori' => $kode,
                'kategori' => $nama
            ];
            $this->admin->addData('tb_kategori', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data.');
            redirect('Admin/datakategori');
        }
    }
    public function editkategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/datakategori');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("kategori", TRUE);
            $data = ['kategori' => $nama];
            $where = ['kd_kategori' => $kode];
            $this->admin->editData('tb_kategori', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Kategori.');
            redirect('Admin/datakategori');
        }
    }

    public function delkategori($id)
    {
        $data = $this->admin->cekProduk($id);
        if ($data == 0) {
            $this->admin->delData('tb_kategori', ['kd_kategori' => $id]);
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Kategori.');
            redirect('Admin/datakategori');
        } else {
            $this->session->set_flashdata('error', 'Tidak Bisa Menghapus Data ini!');
            redirect('Admin/datakategori');
        }
    }

}
