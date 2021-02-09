<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        admin_logged_in();
    }

    //Transaksi
    public function datatransaksi()
    {
        $status = 1;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdatatrans', $data);
        $this->load->view('admin/footer');
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
        $data['judul'] = "ALT Printing - Nota Pemesanan";
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
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkonfirm', $data);
        $this->load->view('admin/footer');
    }

    public function pengemasan()
    {
        $status = 3;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkemas', $data);
        $this->load->view('admin/footer');
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
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkemascod', $data);
        $this->load->view('admin/footer');
    }

    public function resikirim()
    {
        $status = 4;
        $jenis = 1;
        $data['transaksi'] = $this->admin->transbystatus($status, $jenis);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vresi', $data);
        $this->load->view('admin/footer');
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
        $this->session->set_flashdata('berhasil', 'Pesanan ' . $no . ' Selesai');
        redirect($this->agent->referrer());
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
        $data['judul'] = "ALT Printing - Nota Pemesanan";
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
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vcod', $data);
        $this->load->view('admin/footer');
    }

    public function transelesai()
    {
        $status = 5;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vselesai', $data);
        $this->load->view('admin/footer');
    }

    public function dataulasan()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vulasan');
        $this->load->view('admin/footer');
    }

    public function tidakvalid()
    {
        $status = 0;
        $data['transaksi'] = $this->admin->transtatus($status);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vnvalid', $data);
        $this->load->view('admin/footer');
    }

    public function detailtransaksi($no)
    {
        $data['transaksi'] = $this->admin->transByNo($no);
        $data['detail'] = $this->admin->detailByNo($no);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/detailtransaksi', $data);
        $this->load->view('admin/footer');
    }
    public function gambartransaksi($no)
    {
        $data['nomor'] = $no;
        $data['gambar'] = $this->admin->getImage($no);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gambartransaksi', $data);
        $this->load->view('admin/footer');
    }
    //download file foto
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
    public function ulasanproduk()
    {
        $data['ulasan'] = $this->admin->jmlUlasan();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vulasan', $data);
        $this->load->view('admin/footer');
    }
    public function lihatulasan($kode)
    {
        $data['ulas'] = $this->admin->getUlasan($kode);
        $data['rating'] = $this->admin->rating($kode);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/lihatulasan', $data);
        $this->load->view('admin/footer');
    }
    //Komplain
    public function datakomplain()
    {
        $data['komplain'] = $this->db->get('tb_komplain')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkomplain', $data);
        $this->load->view('admin/footer');
    }
    public function komplainselesai($id)
    {
        $data = ['status_komplain' => 2];
        $where = ['id_komplain' => $id];
        $this->admin->editData('tb_komplain', $data, $where);
        $this->session->set_flashdata('berhasil', 'Komplain ' . $id . ' Terselesaikan');
        redirect($this->agent->referrer());
    }
    public function statusbaca($no)
    {
        $data = ['status_baca' => 1];
        $where = ['no_transaksi' => $no];
        $this->admin->editData('tb_transaksi', $data, $where);
        redirect('admin/Transaksi/detailtransaksi/' . $no);
    }
}
