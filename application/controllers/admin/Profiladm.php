<?php
class Profiladm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->library('Primslib');
        admin_logged_in();
    }

    function index()
    {
        $id = $this->session->userdata('id_admin');
        // $data['admin'] = $this->m_admin->edit(array('id_admin' => $id), 'tb_user')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vprofil');
        $this->load->view('admin/footer');
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
                    'password' => $this->input->post('password'),
                    'updated_at' => $date_updated
                );

                // diupdate berdasarkan apa..
                $where = array(
                    'id_user' => $this->input->post('id_user')
                );

                $this->m_admin->editdata('tb_admin', $where, $data);
                if ($this->db->affected_rows() == true) {
                    $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Profil');
                    redirect(base_url("admin/c_profiladm/"));
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal Mengubah Profil');
                    redirect(base_url("admin/c_profiladm/"));
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

    function addr_line1($addr_line1)
    {
        if (preg_match('/[\^£$%&*()}{@#~?><>|=+¬]/', $addr_line1)) {
            $this->form_validation->set_message('addr_line1', 'Hanya memperbolehkan koma, titik, spasi dan alphanumeric');
            return false;
        } else {
            return true;
        }
    }

    function uploadFotoProfil()
    {
        $id_user = $this->input->post('id_user');
        $date_updated = date('Y-m-d H:i:s');
        $gambar_profil = null;
        $gambar_profil = $_FILES['gambar_profil']['name'];
        $select_by_nip = $this->m_admin->edit(array('id_user' => $id_user), 'admin');

        if ($gambar_profil != '') {
            $config['upload_path'] = './assets/files/gambar_profil/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '3024';
            $config['overwrite'] = true;
            if ($select_by_nip->num_rows() > 0 && $select_by_nip->row()->foto != '') {
                $config['file_name'] = $select_by_nip->row()->foto;
            } else {
                $config['encrypt_name'] = TRUE;
            }
            // $config['file_name'] = $this->db->get_where('promo', array('id_profil' => $this->input->post('id_profil')))->row()->gambar;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar_profil')) {
                $this->session->set_flashdata('pesan', $this->primslib->notify('Gagal saat mengupload gambar.', 'Terjadi kesalahan ketika mengupload gambar', 'danger', 'error'));
                redirect("admin/c_profileadm/edit/" . $id_user);
            } else {
                $gambar_profil = $this->upload->data('file_name');
            }

            $where = array('nip' => $id_user);

            $set = array(
                'foto' => $gambar_profil,
                'updated_at' => $date_updated
            );

            $upload = $this->m_admin->update($where, $set, 'admin');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata('pesan', $this->primslib->notify('Berhasil memperbarui profil anda.', 'Perubahan profil berhasil dilakukan.', 'success', 'success'));
                redirect("admin/c_profiladm/");
            } else {
                $this->session->set_flashdata('pesan', $this->primslib->notify('Gagal memperbarui profil anda.', 'Perubahan profil gagal dilakukan.', 'danger', 'error'));
                redirect("admin/c_profiladm/edit/$id_user");
            }
        } else {
            $this->session->set_flashdata('pesan', $this->primslib->notify('Gagal saat mengupload gambar.', 'Gambar yang dipilih tidak dapat ditemukan', 'danger', 'error'));
            redirect("admin/c_profiladm/edit/$id_user");
        }
    }
}
