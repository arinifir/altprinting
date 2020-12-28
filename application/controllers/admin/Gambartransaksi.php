<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Canfirmbayar extends CI_Controller
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

    public function index($no)
    {
        $data['nomor'] = $no;
        $data['gambar'] = $this->admin->getImage($no);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gambartransaksi', $data);
        $this->load->view('admin/footer');
    }
}
