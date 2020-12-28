<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Confirmbayar extends CI_Controller
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

    public function index()
    {
        $status = 2;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkonfirm', $data);
        $this->load->view('admin/footer');
    }

    public function hapusorder($no)
    {
        $where = [
            'no_transaksi' => $no
        ];
        $this->admin->delData('tb_dtrans', $where);
        $this->admin->delData('tb_transaksi', $where);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Dihapus');
        redirect($this->agent->referrer());
    }

    public function orderbatal($no)
    {
        $data = ['status_transaksi' => 0];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Dibatalkan');
        redirect($this->agent->referrer());
    }

    public function detailtransaksi($no)
    {
        $data['transaksi'] = $this->admin->transByNo($no);
        $data['detail'] = $this->admin->detailByNo($no);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/detailtransaksi', $data);
        $this->load->view('sadmin/footer');
    }
}
