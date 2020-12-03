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

    // Admin
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

    //Pelanggan
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

    //kategori
    public function datakategori()
    {
        $data['kategori'] = $this->admin->tampilkategori();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vkategori', $data);
        $this->load->view('sadmin/footer');
    }
    public function addkategori()
    {
        $cekkode = $this->admin->cekkode();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($cekkode, 3, 2);
        $nourut++;
        $char = "KTG";
        $kode = $char . sprintf("%02s", $nourut);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datakategori');
        } else {
            $nama = $this->input->post("kategori", TRUE);
            $data = [
                'kd_kategori' => $kode,
                'kategori' => $nama
            ];
            $this->admin->addData('tb_kategori', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data.');
            redirect('Sadmin/datakategori');
        }
    }
    public function editkategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datakategori');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("kategori", TRUE);
            $data = ['kategori' => $nama];
            $where = ['kd_kategori' => $kode];
            $this->admin->editData('tb_kategori', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Kategori.');
            redirect('Sadmin/datakategori');
        }
    }
    public function delkategori($id)
    {
        $data = $this->admin->cekProduk($id);
        if ($data == 0) {
            $this->admin->delData('tb_kategori', ['kd_kategori' => $id]);
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Kategori.');
            redirect('Sadmin/datakategori');
        } else {
            $this->session->set_flashdata('error', 'Tidak Bisa Menghapus Data ini!');
            redirect('Sadmin/datakategori');
        }
    }

    //produk
    public function dataproduk()
    {
        $data['produk'] = $this->admin->tampilproduk();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vproduk', $data);
        $this->load->view('sadmin/footer');
    }
    public function editdesk()
    {
        $kode = $this->input->post("kode", TRUE);
        $desk = $this->input->post("desk", TRUE);
        $data = ['desk_produk' => $desk];
        $where = ['kd_produk' => $kode];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
        redirect('Sadmin/dataproduk');
    }
    public function editdiskon()
    {
        $kode = $this->input->post("kode", TRUE);
        $diskon = $this->input->post("diskon", TRUE);
        $data = ['diskon_produk' => $diskon];
        $where = ['kd_produk' => $kode];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Diskon.');
        redirect('Sadmin/dataproduk');
    }
    public function produkaktif($id)
    {
        $data = ['status_produk' => 1];
        $where = ['kd_produk' => $id];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Produk Kode '.$id.' Ditampilkan');
        redirect('Sadmin/dataproduk');
    }
    public function produkarsip($id)
    {
        $data = ['status_produk' => 2];
        $where = ['kd_produk' => $id];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Produk Kode '.$id.' Diarsipkan');
        redirect('Sadmin/dataproduk');
    }

    //voucher
    public function datavoucher()
    {
        $data['voucher'] = $this->admin->tampilvoucher();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/voucher', $data);
        $this->load->view('sadmin/footer');
    }
}
