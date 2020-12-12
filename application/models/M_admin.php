<?php

class M_admin extends CI_Model
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

    function userbylevel($table, $field1)
    {
        return $this->db->get_where($table, ['level' => $field1])->result();
    }

    function randomcode($length)
    {
        $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123457890';
        $panj = $length;
        $txtl = strlen($text) - 1;
        $result = '';
        for ($i = 1; $i <= $panj; $i++) {
            $result .= $text[rand(0, $txtl)];
        }
        return $result;
    }

    function productCode($length)
    {
        $text = 'PR1234567890';
        $panj = $length;
        $txtl = strlen($text) - 1;
        $result = '';
        for ($i = 1; $i <= $panj; $i++) {
            $result .= $text[rand(0, $txtl)];
        }
        return $result;
    }

    public function cekEmail($id)
    {
        return $this->db->get_where('tb_user', ['email' => $id])->num_rows();
    }

    public function tampilkategori()
    {
        return $this->db->get('tb_kategori')->result();
    }

    public function cekProduk($id)
    {
        return $this->db->get_where('tb_produk', ['tb_produk.kategori_produk' => $id])->num_rows();
    }

    public function cekByProduk($id)
    {
        return $this->db->get_where('tb_produk', ['tb_produk.kategori_produk' => $id])->num_rows();
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(kd_kategori) as kd_kategori from tb_kategori");
        $hasil = $query->row();
        return $hasil->kd_kategori;
    }

    public function tampilproduk()
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_produk.kategori_produk = tb_kategori.kd_kategori');
        return $this->db->get()->result();
    }

    public function tampilvoucher()
    {
        return $this->db->get('tb_voucher')->result();
    }

    public function cekVoucher($id)
    {
        return $this->db->get_where('tb_voucher', ['kd_voucher' => $id])->num_rows();
    }

    public function duatable()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_alamat', 'tb_alamat.id_alamat=tb_user.id_user');
        $query = $this->db->get();
        return $query->result();
    }
}
