<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_api', 'api');
        $this->load->model('m_admin', 'admin');
        $this->load->model('m_produk', 'produk');
    }

    private function _initEmailConfig(){
        // Konfigurasi email
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'altprinting3@gmail.com';
        $config['smtp_pass'] = 'avenger12345678';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
    }

    public function kirimnota($no)
    {
        $this->_initEmailConfig();
        
            $from = "altprinting3@gmail.com";
            $subject = "Halo Pelanggan ALT Printing Jember";
            $data['transaksi'] = $this->db->query('select * from tb_transaksi where no_transaksi='.$no)->row();
            $data['detail'] = $this->db->query('select * from tb_dtrans where no_transaksi='.$data['transaksi']->no_transaksi)->result();
            $message = $this->load->view('email/vkirimnota', $data, true);
            $this->email->from($from, 'ALT Printing Jember');
            $this->email->to($data['transaksi']->email_pembeli);
            $this->email->subject($subject);
            $this->email->message($message); 
            if ($this->email->send()) {
                $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Email berhasil Terkirim</b></div>');
            } else {
                echo $this->email->print_debugger();
                die;
                $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>Email gagal Terkirim</b></div>');
            }
        
        redirect('produk/subview/');
    }
}