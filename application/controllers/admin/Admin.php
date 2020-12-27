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
        foreach($this->admin->statistik_pendapatan()->result_array() as $row)
        {
         $dataa['grafik'][]=(float)$row['Januari'];
         $dataa['grafik'][]=(float)$row['Februari'];
         $dataa['grafik'][]=(float)$row['Maret'];
         $dataa['grafik'][]=(float)$row['April'];
         $dataa['grafik'][]=(float)$row['Mei'];
         $dataa['grafik'][]=(float)$row['Juni'];
         $dataa['grafik'][]=(float)$row['Juli'];
         $dataa['grafik'][]=(float)$row['Agustus'];
         $dataa['grafik'][]=(float)$row['September'];
         $dataa['grafik'][]=(float)$row['Oktober'];
         $dataa['grafik'][]=(float)$row['November'];
         $dataa['grafik'][]=(float)$row['Desember'];
        }
        $data['judul'] = 'ALT | Admin';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdashboard',$dataa);
        $this->load->view('admin/footer');
      }
       
}
