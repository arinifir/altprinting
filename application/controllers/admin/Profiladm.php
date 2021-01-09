<?php
class Profiladm extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Primslib');
        $this->load->model('M_admin', 'admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        admin_logged_in();
    }

    public function index()
    {
        $id = $this->session->userdata('id_admin');
        $data['admin'] = $this->admin->edit(array('id_user' => $id), 'tb_user')->row();

        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vprofil', $data);
        $this->load->view('admin/footer');
    }

    public function editprofiladm()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomer', 'Nomer', 'required|max_length[13]|min_length[11]|numeric|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_message('required', 'Mohon masukkan data!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai!');
            redirect('admin/Profiladm');
        } else {
            $kode = $this->input->post("kode", TRUE);
            $nama = $this->input->post("nama", TRUE);
            $email = $this->input->post("email", TRUE);
            $no = $this->input->post("nomer", TRUE);
            $data1 = $this->db->get_where('tb_user',  ['id_user' => $kode, 'email' => $email])->num_rows();
            if ($data1 == 1) {
                $data = [
                    'nama_lengkap' => $nama,
                    'no_hp' => $no
                ];
                $where = ['id_user' => $kode];
                $this->admin->editData('tb_user', $data, $where);
                $this->session->set_flashdata('simpan', 'Data berhasil diubah!');
                redirect('admin/Profiladm');
            } else {
                $data = $this->admin->cekEmail($email);
                if ($data == 0) {
                    $data = [
                        'nama_lengkap' => $nama,
                        'no_hp' => $no,
                        'email' => $email
                    ];
                    $where = ['id_user' => $kode];
                    $this->admin->editData('tb_user', $data, $where);
                    $this->session->set_flashdata('simpan', 'Data berhasil diubah!');
                    redirect('admin/Profiladm');
                } else {
                    $this->session->set_flashdata('gagal', 'Email sudah terdaftar!');
                    redirect('admin/Profiladm');
                }
            }
        }
    }
}
