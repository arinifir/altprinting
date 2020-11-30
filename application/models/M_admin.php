<?php

class M_admin extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function delData($table, $data){
        $this->db->delete($table, $data);
    }
    public function editData($table, $data, $where){
        $this->db->where($where);
		$this->db->update($table,$data);
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
    public function cekEmail($id){
        return $this->db->get_where('tb_user', ['email'=>$id])->num_rows();
    }
    public function tampilkategori()
    {
        return $this->db->get('tb_kategori')->result();
    }
    public function cekProduk($id){
        return $this->db->get_where('tb_produk', ['tb_produk.kategori_produk'=>$id])->num_rows();
    }
    public function cekkode(){ 
        $query = $this->db->query("SELECT MAX(kd_produk) as kd_produk from tb_produk");
        $hasil = $query->row();
        return $hasil->kd_produk;
    }
}
