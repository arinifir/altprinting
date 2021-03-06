<?php

class M_pelanggan extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delData($table, $data)
    {
        $this->db->delete($table, $data);
    }

    public function editData($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table)->result();
    }
    public function getKGByStatus()
    {
        return $this->db->get_where('tb_kategori',['status_kategori'=>1])->result();
    }

    public function getIds($table, $order)
    {
        return $this->db->query("SELECT * FROM $table ORDER BY $order DESC LIMIT 1");
    }
    public function getUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row();
    }
    public function getAddress($id)
    {
        return $this->db->get_where('tb_alamat', ['id_user' => $id, 'status_alamat' => 1])->row();
    }
    public function checkAddress($id)
    {
        return $this->db->get_where('tb_alamat', ['id_user' => $id])->num_rows();
    }
}
