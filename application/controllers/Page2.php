<?php
class Page2 extends CI_Controller
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
    $this->load->view('pelanggan/home');
  }
}
