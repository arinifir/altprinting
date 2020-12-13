<?php
Class Pelanggan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->Model('M_admin');
    }

    public function tampil_pelanggan()
    {

        // query memanggil function duatable di model
        $level = 3;
        $data['join2'] = $this->admin->userbylevel('tb_user', $level);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('admin/footer');
    }

    public function delpelanggan($kode)
    {
        $where = [
            'id_user' => $kode
        ];
        $this->admin->delData('tb_user', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data.');
        redirect('admin/Pelanggan/tampil_pelanggan');
    }
}