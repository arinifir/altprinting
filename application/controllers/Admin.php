<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin','M_pelanggan');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        
        admin_logged_in();
    }
    public function index()
    {
        $data['judul'] = 'ALT | Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard');
        $this->load->view('templates/footer');
    }

    public function tampil_pelanggan()
 {
    $data['judul'] = 'ALT | Admin';

    // query memanggil function duatable di model
    $level = 3;
        $data['join2'] = $this->admin->userbylevel('tb_user', $level);
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('templates/footer');
  
 } 


}
