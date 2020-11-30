<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        sadmin_logged_in();
    }
    public function index()
    {
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vdashboard');
        $this->load->view('sadmin/footer');
    }
    public function datadmin()
    {
        $level = 2;
        $data['admin'] = $this->admin->userbylevel('tb_user', $level);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vadmin', $data);
        $this->load->view('sadmin/footer');
    }
    public function addadmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no', 'Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datadmin');
        } else {
            $length = 6;
            $kode = $this->admin->randomcode($length);
            $nama = $this->input->post("name", TRUE);
            $email = $this->input->post("email", TRUE);
            $data = $this->admin->cekEmail($email);
            if ($data == 0) {
                $no = $this->input->post("no", TRUE);
                $password = md5($this->input->post("password", TRUE));
                $level = 2;
                $status = 1;
                $data = [
                    'id_user' => $kode,
                    'nama_lengkap' => $nama,
                    'email' => $email,
                    'no_hp' => $no,
                    'password' => $password,
                    'level' => $level,
                    'status' => $status
                ];
                $this->admin->addData('tb_user', $data);
                $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data.');
                redirect('Sadmin/datadmin');
            } else {
                $this->session->set_flashdata('gagal', 'Email Sudah Terdaftar');
                redirect('Sadmin/datadmin');
            }
        }
    }
    public function editadmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no', 'Number', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datadmin');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("name", TRUE);
            $email = $this->input->post("email", TRUE);
            $no = $this->input->post("no", TRUE);
            $data1 = $this->db->get_where('tb_user',  ['id_user' => $kode, 'email' => $email])->num_rows();
            if ($data1 == 1) {
                $data = [
                    'nama_lengkap' => $nama,
                    'no_hp' => $no
                ];
                $where = ['id_user' => $kode];
                $this->admin->editData('tb_user', $data, $where);
                $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
                redirect('Sadmin/datadmin');
            } else {
                $data = $this->admin->cekEmail($email);
                if ($data == 0) {
                    $data = [
                        'nama_lengkap' => $nama,
                        'email' => $email,
                        'no_hp' => $no
                    ];
                    $where = ['id_user' => $kode];
                    $this->admin->editData('tb_user', $data, $where);
                    $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
                    redirect('Sadmin/datadmin');
                } else {
                    $this->session->set_flashdata('gagal', 'Email Sudah Terdaftar');
                    redirect('Sadmin/datadmin');
                }
            }
        }
    }
    public function deladmin($kode)
    {
        $where = [
            'id_user' => $kode
        ];
        $this->admin->delData('tb_user', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Admin.');
        redirect('Sadmin/datadmin');
    }
    public function adminactive($id)
    {
        $data = ['status' => 1];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun '.$id.' Diaktifkan');
        redirect('Sadmin/datadmin');
    }
    public function adminonactive($id)
    {
        $data = ['status' => 2];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ID '.$id.' Dinonaktifkan');
        redirect('Sadmin/datadmin');
    }
    public function datapelanggan()
    {
        $level = 3;
        $data['pelanggan'] = $this->admin->userbylevel('tb_user', $level);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vpelanggan', $data);
        $this->load->view('sadmin/footer');
    }
    public function addpelanggan()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no', 'Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datapelanggan');
        } else {
            $length = 6;
            $kode = $this->admin->randomcode($length);
            $nama = $this->input->post("name", TRUE);
            $email = $this->input->post("email", TRUE);
            $data = $this->admin->cekEmail($email);
            if ($data == 0) {
                $no = $this->input->post("no", TRUE);
                $password = md5($this->input->post("password", TRUE));
                $level = 3;
                $status = 1;
                $data = [
                    'id_user' => $kode,
                    'nama_lengkap' => $nama,
                    'email' => $email,
                    'no_hp' => $no,
                    'password' => $password,
                    'level' => $level,
                    'status' => $status
                ];
                $this->admin->addData('tb_user', $data);
                $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data Admin.');
                redirect('Sadmin/datapelanggan');
            } else {
                $this->session->set_flashdata('gagal', 'Email Sudah Terdaftar');
                redirect('Sadmin/datapelanggan');
            }
        }
    }
    public function editpelanggan()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no', 'Number', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datapelanggan');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("name", TRUE);
            $email = $this->input->post("email", TRUE);
            $no = $this->input->post("no", TRUE);
            $data1 = $this->db->get_where('tb_user',  ['id_user' => $kode, 'email' => $email])->num_rows();
            if ($data1 == 1) {
                $data = [
                    'nama_lengkap' => $nama,
                    'no_hp' => $no
                ];
                $where = ['id_user' => $kode];
                $this->admin->editData('tb_user', $data, $where);
                $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
                redirect('Sadmin/datapelanggan');
            } else {
                $data = $this->admin->cekEmail($email);
                if ($data == 0) {
                    $data = [
                        'nama_lengkap' => $nama,
                        'email' => $email,
                        'no_hp' => $no
                    ];
                    $where = ['id_user' => $kode];
                    $this->admin->editData('tb_user', $data, $where);
                    $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
                    redirect('Sadmin/datapelanggan');
                } else {
                    $this->session->set_flashdata('gagal', 'Email Sudah Terdaftar');
                    redirect('Sadmin/datapelanggan');
                }
            }
        }
    }
    public function delpelanggan($kode)
    {
        $where = [
            'id_user' => $kode
        ];
        $this->admin->delData('tb_user', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data.');
        redirect('Sadmin/datapelanggan');
    }
    public function useractive($id)
    {
        $data = ['status' => 1];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun '.$id.' Diaktifkan');
        redirect('Sadmin/datapelanggan');
    }
    public function usernonactive($id)
    {
        $data = ['status' => 2];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ID '.$id.' Dinonaktifkan');
        redirect('Sadmin/datapelanggan');
    }
}
