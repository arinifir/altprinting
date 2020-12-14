<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
    }

    public function index()
    {
        $data["produk"] = $this->M_produk->getAll();
        $this->load->view("pelanggan/index2", $data);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/navbar');
        $this->load->view('pelanggan/footer');
    }

}