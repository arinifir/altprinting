<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_api', 'api');
        $this->load->model('m_admin', 'admin');
        $this->load->model('m_produk', 'produk');
        $this->load->model('m_voucher', 'voucher');
        $this->load->model('m_transaksi', 'transaksi');
    }

    public function login()
    {
        //cek user ada atau tidak
        $email = $this->input->post("email", TRUE);
        $pass1 = ($this->input->post("password", TRUE));
        $pass = hash('sha256', $pass1);
        $data = $this->api->checkuser('tb_user', $email);
        if ($data) {
            if ($data['status'] == 1) {
                if ($data['password'] == $pass) {
                    if ($data['level'] == 1) {
                        $this->date_online($data['id_user']);
                        $output = [
                            'status' => "success",
                            'role' => "super admin",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_sadmin' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Super Admin"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    } elseif ($data['level'] == 2) {
                        $this->date_online($data['id_user']);
                        $output = [
                            'status' => "success",
                            'role' => "admin",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_admin' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Admin"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    } elseif ($data['level'] == 3) {
                        $this->date_online($data['id_user']);
                        $output = [
                            'status' => "success",
                            'role' => "pelanggan",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_user' => $data['id_user'],
                            'nama' => $data['nama_lengkap'],
                            'email' => $data['email'],
                            'level' => "Pelanggan"
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    }
                } else {
                    $output = [
                        'status' => "wrong_password",
                        'message' =>  "gagal login"
                    ];
                    echo json_encode($output);
                }
            } else {
                $output = [
                    'status' => "not_active",
                    'message' =>  "akun tidak terverifikasi"
                ];
                echo json_encode($output);
            }
        } else {
            $output = [
                'status' => "empty",
                'message' =>  "user tidak terdaftar"
            ];
            echo json_encode($output);
        }
    }

    public function date_online($id)
    {
        $data = [
            'date_online' => date('Y-m-d H:i:s')
        ];
        $where = [
            'id_user' => $id
        ];
        $this->admin->editData('tb_user', $data, $where);
    }

    public function getPaketById($id_paket)
    {
        $paket = $this->produk->getPaketById($id_paket);
        $data = [
            'status' => 'success',
            'data' => $paket
        ];

        echo json_encode($data);
    }

    public function checkProduk($id_produk)
    {
        $paket = $this->produk->getPaketByProduk($id_produk);
        $data = [
            'status' => 'success',
            'data' => $paket
        ];

        echo json_encode($data);
    }

    public function updatecart($rowid, $qty)
    {
        $data = [
            'rowid' => $rowid,
            'qty' => $qty
        ];
        $this->cart->update($data);
        echo 'sukses diubah';
    }


    /*====================================================  RAJA ONGKIR API  ====================================================*/
    public function getProvinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 7473506335604c508c524b09f2181bdc"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function getKabKota($id_provinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id_provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 7473506335604c508c524b09f2181bdc"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function hitungOngkir($id_kabkota)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=160&destination=$id_kabkota&weight=1000&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 7473506335604c508c524b09f2181bdc"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    /*====================================================  RAJA ONGKIR API  ====================================================*/
    public function checkVoucher($kode)
    {
        $voucher = $this->voucher->getVoucherByKode($kode);
        // var_dump($voucher);
        if ($voucher) {
            $data = [
                'message' => '1',
                'data' => $voucher
            ];
            echo json_encode($data);
        } else {
            $data = [
                'message' => '0'
            ];
            echo json_encode($data);
        }
    }

    public function getOrder($user, $status)
    {
        $order = $this->transaksi->getOrderBy($user,$status);
        if ($order) {
            $data = [
                'message' => '1',
                'data' => $order
            ];
            echo json_encode($data);
        } else {
            $data = [
                'message' => '0'
            ];
            echo json_encode($data);
        }
    }

}
