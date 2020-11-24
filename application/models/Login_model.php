<?php
class Login_model extends CI_Model
{
    //cek username dan password admin
    function auth_admin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek username dan password pengguna
    function auth_pelanggan($username, $password)
    {
        $query = $this->db->query("SELECT * FROM pelanggan WHERE username='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }
}
