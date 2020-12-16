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
        $this->load->library('primslib');
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
            $kode   = $this->admin->randomcode($length);
            $nama   = $this->input->post("name", TRUE);
            $email  = $this->input->post("email", TRUE);
            $data   = $this->admin->cekEmail($email);
            if ($data == 0) {
                $no         = $this->input->post("no", TRUE);
                $password   = ($this->input->post("password", TRUE));
                $pass       = hash('sha256', $password);
                $level      = 3;
                $status     = 1;
                $data = [
                    'id_user' => $kode,
                    'nama_lengkap' => $nama,
                    'email' => $email,
                    'no_hp' => $no,
                    'password' => $pass,
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
            $length = 4;
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
}
