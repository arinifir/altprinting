<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        //load model admin
    
      
    }

    public function tampilp()
    {
        $data["produk"] = $this->M_produk->getAll();
        $this->load->view("user/vberanda", $data);
        $this->load->view('user/header');
        $this->load->view('user/topbar');
        $this->load->view('user/footer');
    }
}
