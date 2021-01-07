<?php

class Produk extends CI_Controller
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

    //Produk
    public function dataproduk()
    {
        $data['kategori'] = $this->admin->tampilkategori();
        $data['produk'] = $this->admin->tampilproduk();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vproduk', $data);
        $this->load->view('admin/footer');
    }

    public function addproduk()
    {
        $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('hargadiskon', 'Harga Diskon', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/produk/dataproduk');
        } else {
            $length = 8;
            $kode = $this->admin->productCode($length);
            $nama = $this->input->post("namaproduk", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $diskon = $this->input->post("hargadiskon", TRUE);
            $kategori = $this->input->post("kategori", TRUE);
            $deskripsi = $this->input->post("deskripsi", TRUE);
            $gambar = $_FILES['gambar_produk']['name'];
            $format = 'jpg|png|jpeg';
            $this->primslib->upload_image('gambar_produk', $gambar, $format, 10000);

            $status = 1;
            $data = [
                'kd_produk' => $kode,
                'nama_produk' => $nama,
                'harga_produk' => $harga,
                'diskon_produk' => $diskon,
                'kategori_produk' => $kategori,
                'desk_produk' => $deskripsi,
                'gambar_produk' => $gambar,
                'status_produk' => $status
            ];
            $this->admin->addData('tb_produk', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan data');
            redirect('admin/produk/dataproduk');
        }
    }

    public function editproduk()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('hargadiskon', 'Harga Diskon', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $this->form_validation->set_message('required', 'Tolong masukkan data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('admin/produk/dataproduk');
        } else {
            // $length = 4;
            // $kode = $this->admin->productCode($length);
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("namaproduk", TRUE);
            $harga = $this->input->post("harga", TRUE);
            $diskon = $this->input->post("hargadiskon", TRUE);
            $kategori = $this->input->post("kategori", TRUE);
            $deskripsi = $this->input->post("deskripsi", TRUE);
            $gambar = $_FILES['gambar_produk']['name'];
            $format = 'jpg|png|jpeg';
            if ($gambar) {
                $this->primslib->upload_image('gambar_produk', $gambar, $format, 10000);
                $this->db->set('gambar_produk', $gambar);
            }

            $status = 1;
            $data = [
                'kd_produk' => $kode,
                'nama_produk' => $nama,
                'harga_produk' => $harga,
                'diskon_produk' => $diskon,
                'kategori_produk' => $kategori,
                'desk_produk' => $deskripsi,
                'status_produk' => $status
            ];
            $where = ['kd_produk' => $kode];
            $this->admin->editData('tb_produk', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil mengubah data');
            redirect('admin/produk/dataproduk');
        }
    }

    public function delproduk($id)
    {
        $this->admin->delData('tb_produk', ['kd_produk' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Produk.');
        redirect('admin/produk/dataproduk');
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
        redirect('admin/produk/dataproduk');
    }

    public function editdesk()
    {
        $kode = $this->input->post("kode", TRUE);
        $desk = $this->input->post("desk", TRUE);
        $data = ['desk_produk' => $desk];
        $where = ['kd_produk' => $kode];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data.');
        redirect('admin/produk/dataproduk');
    }

    public function editdiskon()
    {
        $kode = $this->input->post("kode", TRUE);
        $diskon = $this->input->post("diskon", TRUE);
        $data = ['diskon_produk' => $diskon];
        $where = ['kd_produk' => $kode];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Diskon.');
        redirect('admin/produk/dataproduk');
    }

    public function produkaktif($id)
    {
        $data = ['status_produk' => 1];
        $where = ['kd_produk' => $id];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Produk Kode ' . $id . ' Ditampilkan');
        redirect('admin/produk/dataproduk');
    }

    public function produkarsip($id)
    {
        $data = ['status_produk' => 2];
        $where = ['kd_produk' => $id];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Produk Kode ' . $id . ' Diarsipkan');
        redirect('admin/produk/dataproduk');
    }
}
