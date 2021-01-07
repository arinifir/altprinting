<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_transaksi', 'transaksi');
        $this->load->model('M_produk', 'produk');
        $this->load->model('M_pelanggan');
        $this->load->model('M_admin', 'admin');
        //load model pelanggan
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $data['pelanggan'] = $this->admin->edit(array('id_user' => $id), 'tb_user')->row();
        $judul['judul'] = "ALT Jember - Profil";
        $this->load->view('user/header', $judul);
        $this->load->view('user/topbar');
        $this->load->view('user/vprofil', $data);
        $this->load->view('user/footer');
    }

    public function editprofil()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomer', 'Nomer', 'required|max_length[13]|min_length[11]|numeric|trim', [
            'max_length[13]'    => 'Maksimal 13 angka!',
            'min_length[11]'    => 'Minimal 11 angka!',
            'numeric'           => 'Hanya diperbolehkan input angka!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'valid_email' => 'Mohon gunakan email yang valid'
        ]);
        $this->form_validation->set_message('required', 'Mohon masukkan data!');
        if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('pelanggan/Profil');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("nama", TRUE);
            $email = $this->input->post("email", TRUE);
            $no = $this->input->post("nomer", TRUE);
            $data1 = $this->db->get_where('tb_user',  ['id_user' => $kode, 'email' => $email])->num_rows();
            if ($data1 == 1) {
                $data = [
                    'nama_lengkap' => $nama,
                    'no_hp' => $no
                ];
                $where = ['id_user' => $kode];
                $this->admin->editData('tb_user', $data, $where);
                $this->session->set_flashdata('simpan', 'Data berhasil diubah!');
                redirect('pelanggan/Profil');
            } else {
                $data = $this->admin->cekEmail($email);
                if ($data == 0) {
                    $data = [
                        'nama_lengkap' => $nama,
                        'no_hp' => $no,
                        'email' => $email
                    ];
                    $where = ['id_user' => $kode];
                    $this->admin->editData('tb_user', $data, $where);
                    $this->session->set_flashdata('simpan', 'Data berhasil diubah!');
                    redirect('pelanggan/Profil');
                } else {
                    $this->session->set_flashdata('gagal', 'Email sudah terdaftar!');
                    redirect('pelanggan/Profil');
                }
            }
        }
    }

    public function pesanansaya()
    {
        $id = $this->session->userdata('id_user');
        if ($id) {
            $status = $this->input->get('sts');
            if ($status) {
                $data['order'] = $this->transaksi->getByFilter($id,$status)->result();
            } else {
                $data['order'] = $this->transaksi->getOrderUser($id);
            }
            
            $data['judul'] = "ALT Jember - Pesanan Saya";
            $this->load->view('user/header', $data);
            $this->load->view('user/topbar');
            $this->load->view('user/vpesanansaya');
            $this->load->view('user/footer');
        } else {
            redirect('User');
        }
    }
    public function riwayatpesanan()
    {
        $id = $this->session->userdata('id_user');
        if ($id) {
            $data['judul'] = "ALT Jember - Pesanan Saya";
            $this->load->view('user/header', $data);
            $this->load->view('user/topbar');
            $this->load->view('user/vpesanansayaa');
            $this->load->view('user/footer');
        } else {
            redirect('User');
        }
    }
}
