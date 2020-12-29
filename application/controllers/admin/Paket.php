<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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

    public function lihatpaket($kode)
    {
        $data['produk'] = $this->admin->produkbykode($kode);
        $data['paket'] = $this->admin->paketbykode($kode);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vpaket', $data);
        $this->load->view('admin/footer');
    }

    public function addpaket()
    {
        $this->form_validation->set_rules('namapaket', 'Nama Paket', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/paket/lihatpaket');
        } else {
            $produk = $this->input->post("kodeproduk", TRUE);
            $cekkode = $this->admin->cekodepaket();
            // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
            $nourut = substr($cekkode, 4, 4);
            $nourut + rand();
            $char = substr($produk, 4, 4);
            $kode = $char . sprintf("%04s", $nourut);
            $nama = $this->input->post("namapaket", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $gambar = $_FILES['gambar_paket']['name'];
            $format = 'jpg|png|jpeg';
            $this->primslib->upload_image_paket('gambar_paket', $gambar, $format, 10000);

            $status = 1;
            $data = [
                'kd_paket' => $kode,
                'kd_produk' => $produk,
                'nama_paket' => $nama,
                'harga_paket' => $harga,
                'isi_paket' => $isi,
                'gambar_paket' => $gambar,
                'status_paket' => $status
            ];
            $this->admin->addData('tb_paket', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan data');
            redirect('admin/paket/lihatpaket/' . $produk);
        }
    }

    public function editpaket()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('namapaket', 'Nama paket', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        $this->form_validation->set_message('required', 'Tolong masukkan data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/paket/lihatpaket');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("namapaket", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $gambar = $_FILES['gambar_paket']['name'];
            $format = 'jpg|png|jpeg';
            if ($gambar) {
                $this->primslib->upload_image_paket('gambar_paket', $gambar, $format, 10000);
                $this->db->set('gambar_paket', $gambar);
            }

            $status = 1;
            $data = [
                'kd_paket' => $kode,
                'nama_paket' => $nama,
                'harga_paket' => $harga,
                'isi_paket' => $isi,
                'status_paket' => $status
            ];
            $where = ['kd_paket' => $kode];
            $this->admin->editData('tb_paket', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil mengubah data');
            $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
            redirect('admin/paket/lihatpaket/'. $kode_produk);
        }
    }

    public function delpaket($id)
    {
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil menghapus data paket.');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
    }

    public function paketaktif($id)
    {
        $data = ['status_paket' => 1];
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Ditampilkan');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
    }

    public function paketarsip($id)
    {
        $data = ['status_paket' => 2];
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Diarsipkan');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
    }
}
