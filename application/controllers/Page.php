<?php
class Page extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //validasi jika user belum login
    if ($this->session->userdata('masuk') != TRUE) {
      $url = base_url();
      redirect($url);
    }
  }

  function index()
  {
    $data['judul'] = 'ALT | Admin';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('v_dashboard');
    $this->load->view('templates/footer');
  }
}
