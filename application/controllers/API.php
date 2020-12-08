<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_api', 'api');
        $this->load->model('m_admin', 'admin');
    }
    public function login()
    {
        //cek user ada atau tidak
        $email = $this->input->post("email", TRUE);
        $pass1 = ($this->input->post("password", TRUE));
        $pass = hash('sha256', $pass1);
        $data = $this->api->checkuser('tb_user', $email);
        if ($data) {
            if ($data['status'] == 1) {
                if ($data['password'] == $pass) {
                    if ($data['level'] == 1) {
                        $output = [
                            'status' => "success",
                            'role' => "super admin",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_sadmin' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Super Admin"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    } elseif ($data['level'] == 2) {
                        $output = [
                            'status' => "success",
                            'role' => "admin",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_admin' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Admin"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    } elseif ($data['level'] == 3) {
                        $output = [
                            'status' => "success",
                            'role' => "pelanggan",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_user' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Pelanggan"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    }
                } else {
                    $output = [
                        'status' => "wrong_password",
                        'message' =>  "gagal login"
                    ];
                    echo json_encode($output);
                }
            } else {
                $output = [
                    'status' => "not_active",
                    'message' =>  "akun tidak terverifikasi"
                ];
                echo json_encode($output);
            }
        } else {
            $output = [
                'status' => "empty",
                'message' =>  "user tidak terdaftar"
            ];
            echo json_encode($output);
        }
    }

    public function deleteproduk($id)
    {
        $paket = $this->db->get_where('tb_paket', ['tb_paket.kd_produk' => $id])->num_rows();
        $ulasan = $this->db->get_where('tb_ulasan', ['tb_ulasan.kd_produk' => $id])->num_rows();
        if ($paket == 0 && $ulasan == 0) {
            echo 'berhasil';
        } else {
            echo 'gagal';
        }
    }
    public function delbyproduk($id)
    {
        $this->admin->delData('tb_paket', ['kd_produk' => $id]);
        $this->admin->delData('tb_ulasan', ['kd_produk' => $id]);
        $this->admin->delData('tb_produk', ['kd_produk' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Produk.');
        redirect('Sadmin/dataproduk');
    }
    public function delproduk($id)
    {
        $this->admin->delData('tb_produk', ['kd_produk' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Produk.');
        redirect('Sadmin/dataproduk');
    }
}

