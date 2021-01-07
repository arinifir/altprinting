<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk', 'produk');
        $this->load->model("M_pelanggan", 'pelanggan');
        $this->load->model("M_voucher", 'voucher');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        $this->load->library('configemail');
        // is_logged_in();
    }

    public function index()
    {
        $voucher = $this->input->get('kd_voucher');
        if ($voucher) {
            $data['voucher'] = $this->voucher->getVoucherByKode($voucher);
        }
        
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

        $id = $this->session->userdata('id_user');
        if ($id) {
            $cekalamat = $this->pelanggan->checkAddress($id);
            if ($cekalamat > 0) {
                $data['user'] = $this->pelanggan->getUserById($id);
                $data['alamat'] = $this->pelanggan->getAddress($id);
                $data['kondisi'] =1;
            }else{
                $data['user'] = $this->pelanggan->getUserById($id);
                $data['kondisi'] =2;
            } 
        }else{ 
            $data['kondisi'] = 0;
        }
        $data['judul'] = " Checkout";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/vpemesanan');
        $this->load->view('user/footer');
    }
    public function konfirmasi_pemesanan()
    {
        $data['judul'] = " Konfirmasi Pemesanan";
        $this->load->view('user/header', $data);
        $this->load->view('user/topbar');
        $this->load->view('user/notapemesanan');
        $this->load->view('user/footer');
    }
}
