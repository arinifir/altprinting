<?php

class M_transaksi extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    public function cekTrans($no,$email,$status)
    {
        return $this->db->get_where('tb_transaksi', ['no_transaksi' => $no, 'email_pembeli' => $email, 'status_transaksi' => $status])->num_rows();
    }
    public function orderbyid($no)
    {
        return $this->db->get_where('tb_transaksi', ['no_transaksi' => $no])->row();
    }
    public function detailbyid($no)
    {
        return $this->db->get_where('tb_dtrans', ['no_transaksi' => $no])->result();
    }
}
?>