<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        admin_logged_in();
    }

    public function datapelanggan()
    {
        $level = 3;
        $data['pelanggan'] = $this->admin->userbylevel('tb_user', $level);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vpelanggan', $data);
        $this->load->view('admin/footer');
    }

    public function delpelanggan($kode)
    {
        $where = [
            'id_user' => $kode
        ];
        $this->admin->delData('tb_user', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data.');
        redirect('admin/pelanggan/datapelanggan');
    }

    public function useractive($id)
    {
        $data = ['status' => 1];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ' . $id . ' Diaktifkan');
        redirect('admin/pelanggan/datapelanggan');
    }

    public function usernonactive($id)
    {
        $data = ['status' => 2];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ID ' . $id . ' Dinonaktifkan');
        redirect('admin/pelanggan/datapelanggan');
    }
}
