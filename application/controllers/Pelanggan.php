<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

 function __construct()
 {
 parent::__construct();
 $this->load->model('M_pelanggan', '', TRUE);
 $this->load->helper(array('form', 'url'));
 }

 public function index()
 {
 

    // query memanggil function duatable di model
    $data['join2'] = $this->M_pelanggan->duatable();  
  $data['judul'] = 'ALT | Admin';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/topbar');
         $this->load->view('templates/sidebar');
         $this->load->view('admin/pelanggan');
         $this->load->view('templates/footer');
  
 } 

 function hapus($id){
    
}
  
}