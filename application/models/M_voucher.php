<?php

class M_voucher extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    public function getVoucherByKode($kd_voucher)
    {
        return $this->db->get_where('tb_voucher',['kd_voucher' => $kd_voucher, 'status_voucher' => 1])->row_array();
    }
}
?>