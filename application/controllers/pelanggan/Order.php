<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi', 'transaksi');
        $this->load->model('M_admin', 'admin');

        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        $this->load->library('configemail');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = "ALT Jember - Kategori";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vkategori');
        $this->load->view('user/footer');
    }
    public function inputpesanan()
    {
        $text = '123457890';
        $panj = 4;
        $txtl = strlen($text) - 1;
        $char = date('Ymd');
        $result = '';
        for ($i = 1; $i <= $panj; $i++) {
            $result .= $text[rand(0, $txtl)];
        }
        $nomor = $char . $result;
        $tanggal = date('Y-m-d H:i:s');
        $desk = $this->input->post('message');
        $status = 1;
        $nama = $this->input->post('inputnama');
        $email = $this->input->post('inputemail');
        $alamat = $this->input->post('inputalamat');
        $kab_pembeli = $this->input->post('input_kabkota');
        $prov_pembeli = $this->input->post('input_provinsi');
        $kpos_pembeli = $this->input->post('inputkdpos');
        $no_pembeli = $this->input->post('inputnomor');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $kd_voucher = $this->input->post('kd_voucher');
        $potongan = $this->input->post('potongan_voucher');
        $jenis = $this->input->post('jenis_voucher');
        $biaya = $this->input->post('biaya_ongkir');
        $subtotal = $this->input->post('subtotal');
        $detail_cod = $this->input->post('inputcod');
        $id = $this->session->userdata('id_user');
        if ($jenis == 1) {
            $total = ($subtotal + $biaya) - $potongan;
        } else {
            $total = ($subtotal * $potongan) / 100 + $biaya;
        }
        $tanggal = date('Y-m-d H:i:s');
        $detail = $this->cart->contents();
        $array = [];
        foreach ($detail as $d) {
            $dtrans = [
                'no_transaksi' => $nomor,
                'kd_produk' => $d['id'],
                'kd_paket' => $d['options']['kd_paket'],
                'produk_paket' => $d['name'],
                'harga_produk_paket' => $d['price'],
                'jumlah_produk' => $d['qty'],
                'subtotal' => $d['subtotal']
            ];
            array_push($array, $dtrans);
        }
        if ($jenis_pembayaran == 2) {
            $data = [
                'no_transaksi' => $nomor,
                'tanggal_transaksi' => $tanggal,
                'desk_transaksi' => $desk,
                'status_transaksi' => $status,
                'user' => $id,
                'nama_pembeli' => $nama,
                'email_pembeli' => $email,
                'no_pembeli' => $no_pembeli,
                'jenis_pembayaran' => $jenis_pembayaran,
                'kode_voucher' => $kd_voucher,
                'pot_voucher' => $potongan,
                'detail_cod' => $detail_cod,
                'total_bayar' => $total
            ];
        } else {
            $data = [
                'no_transaksi' => $nomor,
                'tanggal_transaksi' => $tanggal,
                'desk_transaksi' => $desk,
                'status_transaksi' => $status,
                'user' => $id,
                'nama_pembeli' => $nama,
                'email_pembeli' => $email,
                'alamat_pembeli' => $alamat,
                'kab_pembeli' => $kab_pembeli,
                'prov_pembeli' => $prov_pembeli,
                'kpos_pembeli' => $kpos_pembeli,
                'no_pembeli' => $no_pembeli,
                'jenis_pembayaran' => $jenis_pembayaran,
                'kode_voucher' => $kd_voucher,
                'pot_voucher' => $potongan,
                'biaya_ongkir' => $biaya,
                'total_bayar' => $total
            ];
        }
        // var_dump($array);die;
        $this->admin->addData('tb_transaksi', $data);
        $this->db->insert_batch('tb_dtrans', $array);
        $this->cart->destroy();
        // $this->session->set_flashdata('berhasil', 'Terima kasih ');
        // redirect($this->agent->referrer());

        $this->buatfolder($nomor);
        $this->kirimnota($nomor);
        $this->uploadgambar($nomor);
    }
    public function buatfolder($no)
    {

        // Do some stuff with it here
        $file_path = "./assets/images/order/" .  $no;

        if (!file_exists($file_path)) {
            mkdir($file_path);
        }
    }
    public function uploadgambar($no)
    {
        $cek = $this->db->get_where('tb_transaksi', ['no_transaksi' => $no])->row();
        if ($cek->status_transaksi == 1 || $cek->status_transaksi == 2) {
            $data['no'] = $no;
            $data['judul'] = "ALT Jember - Upload Gambar";
            $data['gambar'] = $this->db->get_where('tb_gambar', ['no_transaksi' => $no])->result();
            $this->load->view('user/head', $data);
            $this->load->view('user/topbar');
            $this->load->view('user/vuploadgambar');
            $this->load->view('user/foot');
        } else {
            $this->session->set_flashdata('gagal', 'Maaf, masa waktu untuk ubah data gambar telah lewat');
            redirect('pelanggan/Profil/pesanansaya/' . $no);
        }
    }
    public function removegambar($no, $nama)
    {
        $this->db->delete('tb_gambar', ['no_transaksi' => $no, 'foto_upload' => $nama]);
        unlink('./assets/images/order/' .  $no . '/' . $nama);
        redirect($this->agent->referrer());
    }
    public function unggah($no)
    {
        $folder_name = './assets/images/order/' .  $no . '/';
        if (!empty($_FILES)) {
            $temp_file = $_FILES['file']['tmp_name'];
            $location = $folder_name . $_FILES['file']['name'];
            move_uploaded_file($temp_file, $location);
            $this->db->insert('tb_gambar', ['no_transaksi' => $no, 'foto_upload' => $_FILES['file']['name']]);
            redirect($this->agent->referrer());
        }

        if (isset($_POST["name"])) {
            $filename = $folder_name . $_POST["name"];
            unlink($filename);
        }

        $result = array();
        $files = scandir($folder_name);
        $output = '<div class="row">';

        if (false !== $files) {
            foreach ($files as $file) {
                if ('.' !=  $file && '..' != $file) {
                    $output .= '
                            <div class="col-md-2">
                            <img src="' . $folder_name . $file . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                            <button type="button" class="btn btn-link remove_image" id="' . $file . '">Remove</button>
                            </div>
                            ';
                }
            }
        }
        $output .= '</div>';
        echo $output;
    }
    public function upload($no)
    {
        $folder_name = './assets/images/order/' .  $no . '/';
        $temp_file = $_FILES['file']['tmp_name'];
        $location = $folder_name . $_FILES['file']['name'];
        move_uploaded_file($temp_file, $location);
        $this->db->insert('tb_gambar', ['no_transaksi' => $no, 'foto_upload' => $_FILES['file']['name']]);
        redirect('pelanggan/Order/uploadgambar/' . $no);
    }
    public function orderfinal($no)
    {
        $this->notapesanan($no);
    }
    public function notapesanan($no)
    {
        $data['order'] = $this->transaksi->orderbyid($no);
        $data['detail'] = $this->transaksi->detailbyid($no);
        $data['judul'] = "ALT Jember - Nota Pesanan";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
    public function kirimnota($no)
    {
        $this->configemail->email_config();
        $from = "altprinting3@gmail.com";
        $subject = "Halo Pelanggan ALT Printing Jember";
        $data['order'] = $this->db->query('select * from tb_transaksi where no_transaksi=' . $no)->row();
        $data['detail'] = $this->db->query('select * from tb_dtrans where no_transaksi=' . $data['order']->no_transaksi)->result();
        // $message = $data['transaksi']->nama_pembeli;
        $data['judul'] = " Nota Pesanan";
        $message = $this->load->view('email/vorder', $data, true);
        $this->email->from($from, 'ALT Printing Jember');
        $this->email->to($data['order']->email_pembeli);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        $this->session->set_flashdata('berhasil', 'Terima kasih sudah melakukan pemesanan di ALT Printing Jember. Silahkan cek email Anda untuk melihat detail pesanan Anda.');
    }
    public function userkomplain($no)
    {
        $data['transaksi'] = $this->db->get_where('tb_transaksi', ["no_transaksi" => $no])->row();
        $data['judul'] = "ALT Jember - Ajukan Komplain";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vuserkomplain');
        $this->load->view('user/footer');
    }
    public function ajukankomplain()
    {
        $text = '123457890';
        $panj = 5;
        $txtl = strlen($text) - 1;
        $id = '';
        for ($i = 1; $i <= $panj; $i++) {
            $id .= $text[rand(0, $txtl)];
        }
        $no = $this->input->post('nomor', true);
        $nowa = $this->input->post('nowa', true);
        $isi = $this->input->post('isi', true);
        $solusi = $this->input->post('solusi', true);
        $status = 1;
        $gambar = $_FILES['gambar']['name'];
        $format = 'jpg|png|jpeg|jfif|gif';
        if ($gambar) {
            $this->primslib->upload_komplain('gambar', $gambar, $format, 10000);
            $this->db->set('gambar_komplain', $gambar);
        }
        $data = [
            'id_komplain' => $id,
            'no_transaksi' => $no,
            'no_pengaju' => $nowa,
            'isi_komplain' => $isi,
            'solusi_komplain' => $solusi,
            'status_komplain' => $status
        ];
        $this->admin->addData('tb_komplain', $data);
        $this->session->set_flashdata('berhasil', 'Pengajuan Anda berhasil terkirim. Kami akan menghubungi Anda melalui nomor WA yang Anda masukkan.');
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
}