<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        // $this->load->model('m_admin');
        //load helper login
        $this->load->helper('auth_helper');
    }
    public function index()
    {
        $this->load->view('vlogin');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 72)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('token_user', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' User Telah di Aktivasi!!Silahkan Login</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);

                    $this->db->delete('token_user', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Kadaluarsa!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Gagal</div>');
            redirect('auth');
        }
    }

    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Lupa Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupapassword');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token_user', $user_token);
                $this->_sendEmail($token, 'Lupa');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="success">Silahkan Cek Email Anda Untuk Reset Password!!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Anda Belum Terdaftar! Atau Akun Belum Aktif</div>');
                redirect('auth/lupapassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!Email Salah!</div>');
            redirect('auth');
        }
    }

    public function gantiPassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/ganti-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->model_auth->hapus_token($email);
            $this->session->unset_userdata('reset_email');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah! Silahkan Login</div>');
            redirect('auth');
        }
    }
    public function verify_akun_admin()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 72)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' User Telah di Aktivasi!!Silahkan Masukkan data Password Anda</div>');
                    redirect("auth/resetpassword?email=" . $email . "&token=" . urlencode($token));
                } else {
                    $this->db->delete('user', ['email' => $email]);

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Kadaluarsa!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Gagal</div>');
            redirect('auth');
        }
    }

    // Auth -> Activation (Untuk aktivasi Akun) + Isi Password untuk akun baru + Set is_active->1

    public function activated()
    {
        if (!$this->session->userdata('email_aktivasi')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Aktivasi Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/activated');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('email_aktivasi');
            $active = 1;
            $this->db->set('password', $password);
            $this->db->set('is_active', $active);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->model_auth->hapus_token($email);
            $this->session->unset_userdata('email_aktivasi');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diaktivasi! Silahkan Login</div>');
            redirect('auth');
        }
    }

    public function activation()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('email_aktivasi', $email);
                $this->activated();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!Email Salah!</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token)
    {
        // Config Setting 
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'emailpass49@gmail.com',
            'smtp_pass' => 'IndowebsteR9',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        // Send Token Password
        $emailAkun = $this->input->post('email');
        $aktivasi_akun = "
                                <html>
                                <head>
                                    <title>Kode Aktivasi Akun + Isi Password</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk Aktivasi Akun Anda!</p>
                                    <h4><a href='" . base_url() . "auth/activation?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi Akun!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('alfiannsx98@gmail.com', 'Aktivasi Akun');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Aktivasi Akun');
        $this->email->message($aktivasi_akun);
        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function register()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|is_unique[tb_user.email]',
            array(
                'is_unique' => 'This Email already Exist'
            )
        );
        $this->form_validation->set_rules(
            'no_hp',
            'Nomor Telepon',
            'trim|required|numeric|min_length[8]|max_length[14]',
            array(
                'numeric' => 'This contain not number'
            )
        );
        $this->form_validation->set_rules('password', 'Password Baru', 'required|trim|min_length[8]');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_regis');
        } else {

            // Function untuk create data + autonumber
            $length = 6;
            $password_baru = htmlspecialchars($this->input->post('password'));
            $password = hash('sha256', $password_baru);
            $data = [
                'id_user' => htmlspecialchars($this->admin->randomcode($length)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'no_hp' => htmlspecialchars($this->input->post('no_hp')),
                'password' => $password,
                'level' => 3,
                'status' => 2,
                'date_created' => htmlspecialchars(time()),
                'date_updated' => 0
            ];

            // Function untuk send email ketika berhasil registrasi

            // $email = $this->input->post('email');
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            // $this->db->insert('token_user', $user_token);
            // $this->_sendEmail($token);

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('Auth');
        }
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
    public function delproduk($id)
    {
        $this->admin->delData('tb_produk', ['kd_produk' => $id]);
        $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Produk.');
        redirect('Sadmin/dataproduk');
    }
}

}
