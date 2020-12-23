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

<<<<<<< HEAD
    public function lihatpaket($kode)
    {
        $data['produk'] = $this->admin->produkbykode($kode);
        $data['paket'] = $this->admin->paketbykode($kode);
=======
    public function datapaket()
    {
        $data['paket'] = $this->admin->tampilpaket();
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
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
<<<<<<< HEAD
            redirect('admin/paket/lihatpaket');
        } else {
            $produk = $this->input->post("kodeproduk", TRUE);
            $cekkode = $this->admin->cekodepaket();
            // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
            $nourut = substr($cekkode, 0, 4);
            $nourut++;
            $char = substr($produk, 4, 4);
            $kode = $char . sprintf("%04s", $nourut);
=======
            redirect('admin/paket/datapaket');
        } else {
            $length = 4;
            $kode = $this->admin->productCode($length);
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
            $nama = $this->input->post("namapaket", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $gambar = $_FILES['gambar_paket']['name'];
            $format = 'jpg|png|jpeg';
<<<<<<< HEAD
            $this->primslib->upload_image_paket('gambar_paket', $gambar, $format, 10000);
=======
            $this->primslib->upload_image('gambar_paket', $gambar, $format, 10000);
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d

            $status = 1;
            $data = [
                'kd_paket' => $kode,
<<<<<<< HEAD
                'kd_produk' => $produk,
=======
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
                'nama_paket' => $nama,
                'harga_paket' => $harga,
                'isi_paket' => $isi,
                'gambar_paket' => $gambar,
                'status_paket' => $status
            ];
            $this->admin->addData('tb_paket', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan data');
<<<<<<< HEAD
            redirect('admin/paket/lihatpaket/' . $produk);
=======
            redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
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
<<<<<<< HEAD
            redirect('admin/paket/lihatpaket');
=======
            redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("namapaket", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $gambar = $_FILES['gambar_paket']['name'];
            $format = 'jpg|png|jpeg';
            if ($gambar) {
<<<<<<< HEAD
                $this->primslib->upload_image_paket('gambar_paket', $gambar, $format, 10000);
=======
                $this->primslib->upload_image('gambar_paket', $gambar, $format, 10000);
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
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
<<<<<<< HEAD
            $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
            redirect('admin/paket/lihatpaket/'. $kode_produk);
=======
            redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
        }
    }

    public function delpaket($id)
    {
<<<<<<< HEAD
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil menghapus data paket.');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
=======
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil menghapus data paket.');
        redirect('admin/paket/datapaket');
    }

    public function deletepaket($id)
    {
        $paket = $this->db->get_where('tb_paket', ['tb_paket.kd_paket' => $id])->num_rows();
        $ulasan = $this->db->get_where('tb_ulasan', ['tb_ulasan.kd_paket' => $id])->num_rows();
        if ($paket == 0 && $ulasan == 0) {
            echo 'berhasil';
        } else {
            echo 'gagal';
        }
    }

    public function delbypaket($id)
    {
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->admin->delData('tb_ulasan', ['kd_paket' => $id]);
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil menghapus data paket.');
        redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
    }

    public function paketaktif($id)
    {
        $data = ['status_paket' => 1];
        $where = ['kd_paket' => $id];
<<<<<<< HEAD
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Ditampilkan');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
=======
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Ditampilkan');
        redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
    }

    public function paketarsip($id)
    {
        $data = ['status_paket' => 2];
        $where = ['kd_paket' => $id];
<<<<<<< HEAD
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Diarsipkan');
        redirect('admin/paket/lihatpaket/' . $kode_produk);
=======
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Diarsipkan');
        redirect('admin/paket/datapaket');
>>>>>>> 02e7df36a7a8f9497b99aec52333bb86f1def86d
    }
}
