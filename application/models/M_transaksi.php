<?php

class M_transaksi extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    public function cekTrans($no,$email)
    {
        return $this->db->get_where('tb_transaksi', ['no_transaksi' => $no, 'email_pembeli' => $email])->num_rows();
    }
    public function orderbyid($no)
    {
        return $this->db->get_where('tb_transaksi', ['no_transaksi' => $no])->row();
    }
    public function detailbyid($no)
    {
        return $this->db->get_where('tb_dtrans', ['no_transaksi' => $no])->result();
    }
    public function getOrderUser($id)
    {
        $this->db->where('user',$id);
        $this->db->where('status_transaksi != 0');
        $this->db->where('status_transaksi != 5');
        return $this->db->get('tb_transaksi')->result();
    }
    public function getOrderDone($id)
    {
        $this->db->where('user',$id);
        $this->db->where('status_transaksi', 0);
        $this->db->or_where('status_transaksi', 5);
        return $this->db->get('tb_transaksi')->result();
    }
    public function getBeli()
    {
        $this->db->select('*');
        $this->db->from('tb_dbeli');
        $this->db->join('tb_pembelian', 'tb_dbeli.no_beli=tb_pembelian.no_beli');
        $query = $this->db->get();
        return $query->result();
    }
}
?>