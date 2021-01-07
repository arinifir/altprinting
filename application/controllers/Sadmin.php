<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin', 'admin');
        $this->load->model('m_produk', 'produk');
        $this->load->model('m_transaksi', 'transaksi');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        $this->load->library('configemail');
        sadmin_logged_in();
    }

    public function index()
    {
        foreach ($this->admin->statistik_pendapatan()->result_array() as $row) {
            $data['grafik'][] = (float)$row['Januari'];
            $data['grafik'][] = (float)$row['Februari'];
            $data['grafik'][] = (float)$row['Maret'];
            $data['grafik'][] = (float)$row['April'];
            $data['grafik'][] = (float)$row['Mei'];
            $data['grafik'][] = (float)$row['Juni'];
            $data['grafik'][] = (float)$row['Juli'];
            $data['grafik'][] = (float)$row['Agustus'];
            $data['grafik'][] = (float)$row['September'];
            $data['grafik'][] = (float)$row['Oktober'];
            $data['grafik'][] = (float)$row['November'];
            $data['grafik'][] = (float)$row['Desember'];
        }
        $data['sold'] = $this->admin->productSold();
        $data['user'] = $this->admin->allPelanggan();
        $data['order'] = $this->admin->orderProcess();
        $data['total'] = $this->admin->pendapatan();
        //ambil data login
        $date = date('Y-m-d');
        $data['pelanggan'] = $this->db->get_where('tb_user', ['level' => 3, 'date_online' => $date])->result();
        $data['admin'] = $this->db->get_where('tb_user', ['level' => 2, 'date_online' => $date])->result();
        $data['sadmin'] = $this->db->get_where('tb_user', ['level' => 1, 'date_online' => $date])->result();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vdashboard', $data);
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
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('no', 'Number', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
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
        $this->session->set_flashdata('berhasil', 'Akun ' . $id . ' Diaktifkan');
        redirect('Sadmin/datadmin');
    }

    public function adminonactive($id)
    {
        $data = ['status' => 2];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ID ' . $id . ' Dinonaktifkan');
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
        $this->session->set_flashdata('berhasil', 'Akun ' . $id . ' Diaktifkan');
        redirect('Sadmin/datapelanggan');
    }

    public function usernonactive($id)
    {
        $data = ['status' => 2];
        $where = ['id_user' => $id];
        $this->admin->editData('tb_user', $data, $where);
        $this->session->set_flashdata('berhasil', 'Akun ID ' . $id . ' Dinonaktifkan');
        redirect('Sadmin/datapelanggan');
    }

    //Kategori
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

    //Produk
    public function dataproduk()
    {
        $data['kategori'] = $this->admin->tampilkategori();
        $data['produk'] = $this->admin->tampilproduk();
        // var_dump($data['produk']);
        // die;
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vproduk', $data);
        $this->load->view('sadmin/footer');
    }

    public function addproduk()
    {
        $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('hargadiskon', 'Harga Diskon', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        // Input gambar belum !!!
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/dataproduk');
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
            redirect('Sadmin/dataproduk');
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
            redirect('Sadmin/dataproduk');
        } else {
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
            redirect('Sadmin/dataproduk');
        }
    }

    public function delproduk($id)
    {
        $this->admin->delData('tb_produk', ['kd_produk' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Produk.');
        redirect('Sadmin/dataproduk');
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
        $this->session->set_flashdata('berhasil', 'Produk Kode ' . $id . ' Ditampilkan');
        redirect('Sadmin/dataproduk');
    }

    public function produkarsip($id)
    {
        $data = ['status_produk' => 2];
        $where = ['kd_produk' => $id];
        $this->admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Produk Kode ' . $id . ' Diarsipkan');
        redirect('Sadmin/dataproduk');
    }

    //Paket
    public function lihatpaket($kode)
    {
        $data['produk'] = $this->admin->produkbykode($kode);
        $data['paket'] = $this->admin->paketbykode($kode);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vpaket', $data);
        $this->load->view('sadmin/footer');
    }

    public function addpaket()
    {
        $this->form_validation->set_rules('namapaket', 'Nama Paket', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('sadmin/lihatpaket');
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
            redirect('sadmin/lihatpaket/' . $produk);
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
            redirect('sadmin/lihatpaket');
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
            redirect('sadmin/lihatpaket/' . $kode_produk);
        }
    }

    public function delpaket($id)
    {
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->delData('tb_paket', ['kd_paket' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil menghapus data paket.');
        redirect('sadmin/lihatpaket/' . $kode_produk);
    }

    public function paketaktif($id)
    {
        $data = ['status_paket' => 1];
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Ditampilkan');
        redirect('sadmin/lihatpaket/' . $kode_produk);
    }

    public function paketarsip($id)
    {
        $data = ['status_paket' => 2];
        $where = ['kd_paket' => $id];
        $kode_produk = $this->admin->edit($where, 'tb_paket')->row()->kd_produk;
        $this->admin->editData('tb_paket', $data, $where);
        $this->session->set_flashdata('berhasil', 'paket Kode ' . $id . ' Diarsipkan');
        redirect('sadmin/lihatpaket/' . $kode_produk);
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

    public function addvoucher()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('voucher', 'Voucher', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_message('required', 'Please Enter Data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Sadmin/datavoucher');
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
                redirect('Sadmin/datavoucher');
            } else {
                $this->session->set_flashdata('gagal', 'Kode Voucher Sudah Ada!');
                redirect('Sadmin/datavoucher');
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
            redirect('Sadmin/datavoucher');
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
            redirect('Sadmin/datavoucher');
        }
    }

    public function delvoucher($kode)
    {
        $where = [
            'kd_voucher' => $kode
        ];
        $this->admin->delData('tb_voucher', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data.');
        redirect('Sadmin/datavoucher');
    }

    public function vaktif($id)
    {
        $data = ['status_voucher' => 1];
        $where = ['kd_voucher' => $id];
        $this->admin->editData('tb_voucher', $data, $where);
        $this->session->set_flashdata('berhasil', 'Voucher ' . $id . ' Diaktifkan');
        redirect('Sadmin/datavoucher');
    }

    public function vnaktif($id)
    {
        $data = ['status_voucher' => 2];
        $where = ['kd_voucher' => $id];
        $this->admin->editData('tb_voucher', $data, $where);
        $this->session->set_flashdata('berhasil', 'Voucher ' . $id . ' Dinonaktifkan');
        redirect('Sadmin/datavoucher');
    }

    //Transaksi
    public function datatransaksi()
    {
        $status = 1;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vdatatrans', $data);
        $this->load->view('sadmin/footer');
    }
    public function hapusorder($no)
    {
        $where = [
            'no_transaksi' => $no
        ];
        $this->admin->delData('tb_dtrans', $where);
        $this->admin->delData('tb_transaksi', $where);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Dihapus');
        redirect($this->agent->referrer());
    }
    public function konfirmasi($no)
    {
        $data = ['status_transaksi' => 3];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->kirimkonfirm($no);
        $this->session->set_flashdata('berhasil', 'Email Konfirmasi Dikirim');
        redirect($this->agent->referrer());
    }
    public function orderbatal($no)
    {
        $data = ['status_transaksi' => 0];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Dibatalkan');
        redirect($this->agent->referrer());
    }

    public function kirimkonfirm($no)
    {
        $this->configemail->email_config();
        $from = "altprinting3@gmail.com";
        $subject = "Pesanan Anda Diterima";
        $data['order'] = $this->db->query('select * from tb_transaksi where no_transaksi=' . $no)->row();
        $data['detail'] = $this->db->query('select * from tb_dtrans where no_transaksi=' . $data['order']->no_transaksi)->result();
        // $message = $data['transaksi']->nama_pembeli;
        $data['judul'] = " Nota Pemesanan";
        $message = $this->load->view('email/vkirimkonfirm', $data, true);
        $this->email->from($from, 'ALT Printing Jember');
        $this->email->to($data['order']->email_pembeli);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function confirmbayar()
    {
        $status = 2;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vkonfirm', $data);
        $this->load->view('sadmin/footer');
    }
    public function pengemasan()
    {
        $status = 3;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vkemas', $data);
        $this->load->view('sadmin/footer');
    }
    public function selesaikemas($no)
    {
        $data = ['status_transaksi' => 4];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Sudah Dikemas');
        redirect($this->agent->referrer());
    }
    public function kemascod()
    {
        $status = 3;
        $jenis = 2;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vkemascod', $data);
        $this->load->view('sadmin/footer');
    }
    public function resikirim()
    {
        $status = 4;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vresi', $data);
        $this->load->view('sadmin/footer');
    }
    public function tambahresi()
    {
        $data = ['no_resi' => $this->input->post('resi')];
        $where = ['no_transaksi' => $this->input->post('nomor')];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'No Resi Berhasil Ditambahkan');
        redirect($this->agent->referrer());
    }
    public function orderselesai($no)
    {
        $data = ['status_transaksi' => 5];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        $this->kirimselesai($no);
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Selesai');
        redirect($this->agent->referrer());
    }
    public function kirimselesai($no)
    {
        $this->configemail->email_config();
        $from = "altprinting3@gmail.com";
        $subject = "Terima Kasih Telah Berbelanja di ALT Printing.";
        $data['order'] = $this->db->query('select * from tb_transaksi where no_transaksi=' . $no)->row();
        // $message = $data['transaksi']->nama_pembeli;
        $data['judul'] = "ALT Printing | Pesanan Selesai";
        $message = $this->load->view('email/vemailselesai', $data, true);
        $this->email->from($from, 'ALT Printing Jember');
        $this->email->to($data['order']->email_pembeli);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    public function resi($no)
    {
        $this->kirimresi($no);
        $this->session->set_flashdata('berhasil', 'Email Resi Dikirim');
        redirect($this->agent->referrer());
    }
    public function kirimresi($no)
    {
        $this->configemail->email_config();
        $from = "altprinting3@gmail.com";
        $subject = "Pesanan Anda Sedang Dikirim.";
        $data['order'] = $this->db->query('select * from tb_transaksi where no_transaksi=' . $no)->row();
        $data['detail'] = $this->db->query('select * from tb_dtrans where no_transaksi=' . $data['order']->no_transaksi)->result();
        // $message = $data['transaksi']->nama_pembeli;
        $data['judul'] = " Nota Pemesanan";
        $message = $this->load->view('email/vkirimresi', $data, true);
        $this->email->from($from, 'ALT Printing Jember');
        $this->email->to($data['order']->email_pembeli);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    public function datacod()
    {
        $status = 4;
        $jenis = 2;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vcod', $data);
        $this->load->view('sadmin/footer');
    }
    public function transelesai()
    {
        $status = 5;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vselesai', $data);
        $this->load->view('sadmin/footer');
    }
    public function dataulasan()
    {
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vulasan');
        $this->load->view('sadmin/footer');
    }
    public function tidakvalid()
    {
        $status = 6;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vnvalid', $data);
        $this->load->view('sadmin/footer');
    }

    public function profilsadm()
    {
        $id = $this->session->userdata('id_sadmin');
        $data['admin'] = $this->admin->edit(array('id_user' => $id), 'tb_user')->row();

        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vprofil', $data);
        $this->load->view('sadmin/footer');
    }

    function edit($id)
    {
        if ($post = $this->input->post()) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email');
            $this->form_validation->set_rules('nohp', 'Nomor HP', 'trim|required|min_length[10]|max_length[13]|numeric');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[4]|max_length[255]|callback_addr_line1');
            // custom message
            $this->form_validation->set_message('required', 'Mohon maaf, {field} harus diisi');
            $this->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter');
            $this->form_validation->set_message('max_length', '{field} harus kurang dari {param} karakter');
            $this->form_validation->set_message('alpha_dash', 'Tidak boleh memberi masukan karakter spesial');
            $this->form_validation->set_message('valid_email', 'Periksa kembali penulisan {field} anda.');
            // custom delimiter
            $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

            // form validation
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
                $data['admin'] = $this->m_admin->edit(array('id_admin' => $id), 'tb_user')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/topbar');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/vprofil', $data);
                $this->load->view('admin/footer');
            } else {
                // menentukan apa yang akan diupdate
                $date_updated = date('Y-m-d H:i:s');
                $data = array(
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'email' => $this->input->post('email'),
                    'nohp' => $this->input->post('nohp'),
                    'updated_at' => $date_updated
                );

                // diupdate berdasarkan apa..
                $where = array(
                    'id_user' => $this->input->post('id_user')
                );

                $this->m_admin->editdata('tb_admin', $where, $data);
                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Profil');
                    redirect(base_url("admin/profiladm"));
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal Mengubah Profil');
                    redirect(base_url("admin/profiladm"));
                }
            }
        } else {
            $data['admin'] = $this->m_admin->edit(array('id_admin' => $id), 'tb_user')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/topbar');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/vprofil', $data);
            $this->load->view('admin/footer');
        }
    }

    public function editpsw()
    {
        $id = $this->session->userdata('id_sadmin');
        /** Ambil data admin */
        $data['admin'] = $this->admin->edit(array('id_user' => $id), 'tb_user')->row();

        $this->form_validation->set_rules('passoword', 'Lma', 'trim|required|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek'
        ]);

        $this->form_validation->set_rules('password1', 'bru', 'trim|required|matches[pswbru1]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('password2', 'bru1', 'trim|required|matches[pswbru]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek',
            'matches' => 'konfirmasi password tidak sesuai'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('sadmin/header');
            $this->load->view('sadmin/topbar');
            $this->load->view('sadmin/sidebar');
            $this->load->view('sadmin/vprofil', $data);
            $this->load->view('sadmin/footer');
        } else {
            $pswlma = hash('sha256', $this->input->post(htmlspecialchars('pwlama')));
            $pswbru1 = hash('sha256', $this->input->post(htmlspecialchars('password1')));

            if ($pswlma != $data['admin']['password']) {
                $this->session->set_flashdata('message', 'Password Salah');
                redirect('sadmin/editpsw');
            } else {
                if ($pswbru1 == $data['admin']['password']) {
                    $this->session->set_flashdata('message', 'Password Tidak Boleh Sama');
                    redirect('sadmin/editpsw');
                } else {
                    $pswhash = $pswbru1;
                    $this->m_admin->ubhpsw($pswhash, $id);
                    $this->session->set_flashdata('berhasil', 'Password anda telah diperbarui');
                    redirect('sadmin/profilsadm');
                }
            }
        }
    }
    public function detailtransaksi($no)
    {
        $data['transaksi'] = $this->admin->transByNo($no);
        $data['detail'] = $this->admin->detailByNo($no);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/detailtransaksi', $data);
        $this->load->view('sadmin/footer');
    }
    public function gambartransaksi($no)
    {
        $data['nomor'] = $no;
        $data['gambar'] = $this->admin->getImage($no);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/gambartransaksi', $data);
        $this->load->view('sadmin/footer');
    }
    public function ulasanproduk()
    {
        $data['ulasan'] = $this->admin->jmlUlasan();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vulasan', $data);
        $this->load->view('sadmin/footer');
    }
    public function lihatulasan($kode)
    {
        $data['ulas'] = $this->admin->getUlasan($kode);
        $data['rating'] = $this->admin->rating($kode);
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/lihatulasan', $data);
        $this->load->view('sadmin/footer');
    }
    public function pembelian()
    {
        $data['produk'] = $this->produk->getProdukByKG();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vpembelian', $data);
        $this->load->view('sadmin/footer');
    }
    public function tambahcart($kode)
    {
        $data1 = $this->db->get_where('tb_produk', ['kd_produk' => $kode])->row();
        $data = array(
            'id'      => $data1->kd_produk,
            'qty'     => $this->input->post('qty'),
            'price'   => $data1->harga_produk,
            'name'    => $data1->nama_produk
        );
        $this->cart->insert($data);
        redirect($this->agent->referrer());
    }
    public function hapuscart($id)
    {
        $this->cart->remove($id);
        redirect($this->agent->referrer());
    }
    public function tambahbeli()
    {
        $text = '123457890';
        $panj = 4;
        $txtl = strlen($text) - 1;
        $result = '';
        for ($i = 1; $i <= $panj; $i++) {
            $result .= $text[rand(0, $txtl)];
        }
        $id = $this->session->userdata('id_sadmin');
        $tanggal = date('Y-m-d');
        $detail = $this->cart->contents();
        $array = [];
        foreach ($detail as $d) {
            $dtrans = [
                'no_beli' => $result,
                'kode_produk' => $d['id'],
                'produk_beli' => $d['name'],
                'harga_beli' => $d['price'],
                'jumlah_beli' => $d['qty'],
                'subtotal_beli' => $d['subtotal']
            ];
            $array[] = $dtrans;
        }
        $data1 = [
            'no_beli' => $result,
            'tanggal_beli' => $tanggal,
            'user_beli' => $id,
            'nama_beli' => $this->session->userdata('nama'),
            'total_beli' => $this->cart->total()
        ];
        $this->admin->addData('tb_pembelian', $data1);
        $this->db->insert_batch('tb_dbeli', $array);
        $this->cart->destroy();
        $this->session->set_flashdata('berhasil', 'Data Pembelian Ditambahkan');
        redirect($this->agent->referrer());
    }
    public function riwayatpembelian()
    {
        $data['beli'] = $this->transaksi->getBeli();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/riwayatpembelian', $data);
        $this->load->view('sadmin/footer');
    }
    public function downloadfile($no)
    {
        unlink('./assets/images/order/' .  $no . '.zip');
        $file = './assets/images/order/' . $no . '.zip';
        $this->zipfile($no);
        force_download($file, Null);
        redirect($this->agent->referrer());
    }
    public function zipfile($no)
    {
        $pathdir = './assets/images/order/' . $no . '/';
        $zipcreated = './assets/images/order/' . $no . ".zip";
        $newzip = new ZipArchive;
        if ($newzip->open($zipcreated, ZipArchive::CREATE) === TRUE) {
            $dir = opendir($pathdir);
            while ($file = readdir($dir)) {
                if (is_file($pathdir . $file)) {
                    $newzip->addFile($pathdir . $file, $file);
                }
            }
            $newzip->close();
        }
        // phpinfo();
    }
    public function datakomplain()
    {
        $data['komplain'] = $this->db->get('tb_komplain')->result();
        $this->load->view('sadmin/header');
        $this->load->view('sadmin/topbar');
        $this->load->view('sadmin/sidebar');
        $this->load->view('sadmin/vkomplain', $data);
        $this->load->view('sadmin/footer');
    }
    public function komplainselesai($id)
    {
        $data = ['status_komplain' => 2];
        $where = ['id_komplain' => $id];
        $this->admin->editData('tb_komplain', $data, $where);
        $this->session->set_flashdata('berhasil', 'Komplain ' . $id . ' Terselesaikan');
        redirect($this->agent->referrer());
    }
}
