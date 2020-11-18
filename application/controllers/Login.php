<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function index(){
        $this->load->view('v_login');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_admin=$this->login_model->auth_admin($username,$password);
 
        if($cek_admin->num_rows() > 0){ //jika login sebagai admin
                        $data=$cek_admin->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='1'){ //Akses super admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('page');
 
                 }else{ //akses admin
                    $this->session->set_userdata('akses','2');
                                $this->session->set_userdata('ses_id',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('page');
                 }
 
        }else{ //jika login sebagai pelanggan
                    $cek_pelanggan=$this->login_model->auth_pelanggan($username,$password);
                    if($cek_pelanggan->num_rows() > 0){
                            $data=$cek_pelanggan->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('ses_id',$data['username']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('page2');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}