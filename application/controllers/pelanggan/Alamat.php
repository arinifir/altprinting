<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alamat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pelanggan");
        $this->load->model("M_admin", 'admin');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    public function index()
    {
        $user = $this->session->userdata('id_user');
        $data['judul'] = "ALT Printing | Alamat Saya";
        $data['alamat'] = $this->db->get_where('tb_alamat', ['id_user' => $user])->result_array();

        // var_dump($data['provinsi']);die;
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/valamat', $data);
        $this->load->view('user/footer');
    }
    public function alamatutama($id)
    {
        $user = $this->session->userdata('id_user');
        $alamat = $this->db->get_where('tb_alamat', ['id_user' => $user])->result();
        foreach ($alamat as $a) {
            $data = ['status_alamat' => 0];
            $where = ['id_alamat' => $a->id_alamat];
            $this->admin->editData('tb_alamat', $data, $where);
        }
        $data = ['status_alamat' => 1];
        $where = ['id_alamat' => $id];
        $this->admin->editData('tb_alamat', $data, $where);
        redirect($this->agent->referrer());
    }

    public function pageTambah()
    {
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
            $data['provinsi'] = json_decode($response)->rajaongkir->results;
        }
        $data['judul'] = "ALT Printing - Tambah Alamat";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vtambahalamat');
        $this->load->view('user/footer');
    }
    public function pageEdit($id)
    {
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
            $data['provinsi'] = json_decode($response)->rajaongkir->results;
        }
        $data['alamat'] = $this->db->get_where('tb_alamat', ['id_alamat' => $id])->row();
        $data['judul'] = "ALT Printing - Ubah Alamat";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vubahalamat');
        $this->load->view('user/footer');
    }

    public function addalamat()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('alamatlengkap', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kdpos', 'Kode Pos', 'required|trim');
        $this->form_validation->set_rules('inputprov', 'ID Provinsi', 'required|trim');
        $this->form_validation->set_rules('input_provinsi', 'Nama Provinsi', 'required|trim');
        $this->form_validation->set_rules('inputkab', 'ID Kabupaten', 'required|trim');
        $this->form_validation->set_rules('input_kabkota', 'Nama Kabupaten', 'required|trim');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal Tambah Data</strong> Silahkan Isi Data dengan Benar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('pelanggan/Alamat/pageTambah');
        } else {
            $row_id = $this->M_pelanggan->getIds('tb_alamat', 'id_alamat')->num_rows();
            $old_id = $this->M_pelanggan->getIds('tb_alamat', 'id_alamat')->row();

            if ($row_id > 0) {
                $id = $this->primslib->autonumber($old_id->id_alamat, 3, 3);
            } else {
                $id = 'ALM001';
            }
            $data = [
                'id_alamat' => $id,
                'id_user' => $this->session->userdata('id_user'),
                'nama_penerima' => $this->input->post('nama'),
                'nohp' => $this->input->post('nomor'),
                'alamat' => $this->input->post('alamatlengkap'),
                'provinsi_id' => $this->input->post('inputprov'),
                'provinsi' => $this->input->post('input_provinsi'),
                'kota_id' => $this->input->post('inputkab'),
                'kota_kab' => $this->input->post('input_kabkota'),
                'kodepos' => $this->input->post('kdpos')
            ];
            $this->M_pelanggan->addData('tb_alamat', $data);
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('berhasil', 'Alamat Berhasil Ditambahkan');
                redirect('pelanggan/Alamat');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambah Data. Terjadi Kesalahan Saat Menambahkan Data!');
                redirect('pelanggan/Alamat');
            }
        }
    }

    public function editalamat($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('alamatlengkap', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kdpos', 'Kode Pos', 'required|trim');
        $this->form_validation->set_rules('inputprov', 'ID Provinsi', 'required|trim');
        $this->form_validation->set_rules('input_provinsi', 'Nama Provinsi', 'required|trim');
        $this->form_validation->set_rules('inputkab', 'ID Kabupaten', 'required|trim');
        $this->form_validation->set_rules('input_kabkota', 'Nama Kabupaten', 'required|trim');
        $this->form_validation->set_message('required', 'Please Enter Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal Ubah Data</strong> Silahkan Isi Data dengan Benar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('pelanggan/Alamat/pageEdit/'.$id);
        } else {
            $where = array('id_alamat' => $id);
            $data = [
                'nama_penerima' => $this->input->post('nama'),
                'nohp' => $this->input->post('nomor'),
                'alamat' => $this->input->post('alamatlengkap'),
                'provinsi_id' => $this->input->post('inputprov'),
                'provinsi' => $this->input->post('input_provinsi'),
                'kota_id' => $this->input->post('inputkab'),
                'kota_kab' => $this->input->post('input_kabkota'),
                'kodepos' => $this->input->post('kdpos')
            ];
            $this->M_pelanggan->editData('tb_alamat', $data, $where);
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('berhasil', 'Alamat Berhasil Diubah');
                redirect('pelanggan/Alamat');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Data. Terjadi Kesalahan Saat Mengubah Data!');
                redirect('pelanggan/Alamat');
            }
        }
    }

    function delalamat($id)
    {
        // deklarasi $where by id
        $data = array('id_alamat' => $id);
        // menjalankan fungsi delete pada m_dosen_adm
        $this->M_pelanggan->delData('tb_alamat', $data);
        // mengirim pesan berhasil dihapus
        if ($this->db->affected_rows() == true) {
            $this->session->set_flashdata('berhasil', 'Alamat Berhasil Dihapus');
            redirect('pelanggan/Alamat');
        } else {
            $this->session->set_flashdata('gagal', 'Alamat Gagal Dihapus');
            redirect('pelanggan/Alamat');
        }
    }
}
