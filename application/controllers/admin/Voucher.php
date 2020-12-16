<?php

class Voucher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        admin_logged_in();
    }

    public function datavoucher()
    {
        $data['voucher'] = $this->admin->tampilvoucher();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/voucher', $data);
        $this->load->view('admin/footer');
    }

    public function addvoucher()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('voucher', 'Voucher', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/Voucher/datavoucher');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $voucher = $this->input->post("voucher", TRUE);
            $potongan = $this->input->post("potongan", TRUE);
            $jenis = $this->input->post("jenis", TRUE);
            $status = 2;
            $data = $this->admin->cekVoucher($kode);
            if ($data == 0) {
                $data = [
                    'kd_voucher' => $kode,
                    'voucher' => $voucher,
                    'potongan_voucher' => $potongan,
                    'jenis_voucher' => $jenis,
                    'status_voucher' => $status
                ];
                $this->admin->addData('tb_voucher', $data);
                $this->session->set_flashdata('berhasil', 'Berhasil menambahkan Voucher');
                redirect('admin/Voucher/datavoucher');
            } else {
                $this->session->set_flashdata('gagal', 'Kode Voucher Sudah Ada!');
                redirect('admin/Voucher/datavoucher');
            }
        }
    }

    public function editvoucher()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('voucher', 'Voucher', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        $this->form_validation->set_message('required', 'Tolong masukkan data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/Voucher/datavoucher');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $voucher = $this->input->post("voucher", TRUE);
            $potongan = $this->input->post("potongan", TRUE);
            $jenis = $this->input->post("jenis", TRUE);
            $data = [
                'voucher' => $voucher,
                'potongan_voucher' => $potongan,
                'jenis_voucher' => $jenis
            ];
            $where = ['kd_voucher' => $kode];
            $this->admin->editData('tb_voucher', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil mengubah data.');
            redirect('admin/Voucher/datavoucher');
        }
    }

    public function delvoucher($kode)
    {
        $where = [
            'kd_voucher' => $kode
        ];
        $this->admin->delData('tb_voucher', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data.');
        redirect('admin/Voucher/datavoucher');
    }

    public function vaktif($id)
    {
        $data = ['status_voucher' => 1];
        $where = ['kd_voucher' => $id];
        $this->admin->editData('tb_voucher', $data, $where);
        $this->session->set_flashdata('berhasil', 'Voucher ' . $id . ' Diaktifkan');
        redirect('admin/Voucher/datavoucher');
    }

    public function vnaktif($id)
    {
        $data = ['status_voucher' => 2];
        $where = ['kd_voucher' => $id];
        $this->admin->editData('tb_voucher', $data, $where);
        $this->session->set_flashdata('berhasil', 'Voucher ' . $id . ' Dinonaktifkan');
        redirect('admin/Voucher/datavoucher');
    }
}
