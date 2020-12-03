<?php
class Login_model extends CI_Model
{
    //cek email dan password tb_user
    function auth_admin($email, $password)
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE email='$email' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek email dan password pengguna
    function auth_pelanggan($email, $password)
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE email='$email' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
}
