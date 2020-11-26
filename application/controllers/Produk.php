<?php
Class Produk extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->Model('M_produk');
    }

     public function index()
     {
         $data['produk']=$this->M_produk->show_produk()->result();
         $data['judul'] = 'ALT | Admin';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/topbar');
         $this->load->view('templates/sidebar');
         $this->load->view('produk/index');
         $this->load->view('templates/footer');
     }

     public function tambah()
     {
         if(isset($_POST['submit'])){
          $this->M_produk->add();
          redirect('produk');
         } else{
            $data['judul'] = 'ALT | Admin';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/topbar');
         $this->load->view('templates/sidebar');
         $this->load->view('produk/add');
         $this->load->view('templates/footer');
         }
     }

     public function edit()
     {
         if(isset($_POST['submit'])){
            $this->M_produk->update();
            redirect('produk');
         }else{
        $id             = $this->uri->segment(3);
        $data['produk'] = $this->M_produk->edit($id)->row_Array();
        $data['judul'] = 'ALT | Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('produk/edit');
        $this->load->view('templates/footer');
     }
    }

    public function hapus()
    {
       $id=$this->uri->segment(3);
       $this->db->where('kd_produk',$id);
       $this->db->delete('tb_produk');
       redirect('produk');
    }

    public function cancel()
    {
        $id=$this->uri->segment(3);
        $this->db->where('id_produk',$id);
        $this->db->delete('tb_produk');
        redirect('produk');
    }

}

?>