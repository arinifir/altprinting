<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alamat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pelanggan");
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $data['judul'] = " Alamat";
        $data['alamat'] = $this->M_pelanggan->getAll('tb_alamat');

        // var_dump($data['provinsi']);die;
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/valamat', $data);
        $this->load->view('user/footer');
    }

    public function pageTambah()
    {
        $data['judul'] = "ALT Printing - Alamat";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => base_url('API/getProvinsi'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $provinsi = json_decode($response);
        }

        $data['provinsi'] = $provinsi->data;
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/tambahalamat');
        $this->load->view('user/footer');
    }

    function tambah()
    {
        // memeriksa apakah ada id pada database
        $row_id = $this->M_pelanggan->getIds('tb_alamat', 'id_alamat')->num_rows();
        // mengambil 1 baris data terakhir
        $old_id = $this->M_pelanggan->getIds('tb_alamat', 'id_alamat')->row();

        if ($row_id > 0) {
            // melakukan auto number dari id terakhir
            $id = $this->primslib->autonumber($old_id->id_alamat, 3, 3);
        } else {
            // generate id pertama kali jika tidak ada data sama sekali di dalam database
            $id = 'ALM001';
        }

        // merekam data yang dikirim melalui form
        $data = array(
            'id_alamat' => $id,
            'id_user' => $this->session->userdata('id_user'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kodepos' => $this->input->post('kodepos')
        );

        // menjalankan fungsi insert untuk menambah data ke database
        $this->M_pelanggan->addData('tb_alamat', $data);
        // mengirim pesan berhasil insert
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Selamat!', 'Berhasil menambahkan data.', 'success', 'success'));
            redirect('pelanggan/alamat');
        } else {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Perhatian!', 'Gagal menambahkan data.', 'danger', 'error'));
            redirect('pelanggan/alamat');
        }
    }

    function edit($id)
    {
        $where = array('id_alamat' => $id);
        // merekam data yang dikirim melalui form
        $data = array(
            'nama_penerima' => $this->input->post('nama_penerima'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kodepos' => $this->input->post('kodepos')
        );

        // menjalankan fungsi insert untuk menambah data ke database
        $this->M_pelanggan->editData( 'tb_alamat', $data, $where);
        // mengirim pesan berhasil insert
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Selamat!', 'Berhasil memperbarui data.', 'success', 'success'));
            redirect('pelanggan/alamat');
        } else {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Perhatian!', 'Gagal memperbarui data.', 'danger', 'error'));
            redirect('pelanggan/alamat');
        }
    }

    function hapus($id)
    {
        // deklarasi $where by id
        $data = array('id_alamat' => $id);
        // menjalankan fungsi delete pada m_dosen_adm
        $this->M_pelanggan->delData('tb_alamat', $data);
        // mengirim pesan berhasil dihapus
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Selamat!', 'Berhasil menghapus data.', 'success', 'success'));
            redirect('pelanggan/alamat');
        } else {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Perhatian!', 'Gagal menghapus data.', 'danger', 'error'));
            redirect('pelanggan/alamat');
        }
    }
}
