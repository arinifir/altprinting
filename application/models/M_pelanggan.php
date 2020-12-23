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
}
