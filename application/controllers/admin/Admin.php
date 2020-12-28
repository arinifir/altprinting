<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        foreach ($this->admin->statistik_pendapatan()->result_array() as $row) {
            $data['grafik'][] = (float)$row['Januari'];
            $data['grafik'][] = (float)$row['Februari'];
            $data['grafik'][] = (float)$row['Maret'];
            $data['grafik'][] = (float)$row['April'];
            $data['grafik'][] = (float)$row['Mei'];
            $data['grafik'][] = (float)$row['Juni'];
            $data['grafik'][] = (float)$row['Juli'];
            $data['grafik'][] = (float)$row['Agustus'];
            $data['grafik'][] = (float)$row['September'];
            $data['grafik'][] = (float)$row['Oktober'];
            $data['grafik'][] = (float)$row['November'];
            $data['grafik'][] = (float)$row['Desember'];
        }
        $data['sold'] = $this->admin->productSold();
        $data['user'] = $this->admin->allPelanggan();
        $data['order'] = $this->admin->orderProcess();
        $data['total'] = $this->admin->pendapatan();
        //ambil data login
        $date = date('Y-m-d');
        $data['pelanggan'] = $this->db->get_where('tb_user',['level'=>3,'date_online'=>$date])->result();
        $data['judul'] = 'ALT | Admin';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdashboard', $data);
        $this->load->view('admin/footer');
    }
}
