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
        $this->db->where('status_transaksi = 1');
        // $this->db->where('status_transaksi != 0');
        // $this->db->where('status_transaksi != 5');
        return $this->db->get('tb_transaksi')->result();
    }
    public function getOrderBy($id,$status)
    {
        $this->db->where('user',$id);
        $this->db->where('status_transaksi', $status);
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

    //laporan

    public function view_by_date($date){
        $this->db->where('DATE(tanggal_transaksi)', $date); // Tambahkan where tanggal nya
        
    return $this->db->get('tb_transaksi')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }
    
  public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal_transaksi)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_transaksi)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_transaksi')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('YEAR(tanggal_transaksi)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_transaksi')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    return $this->db->get('tb_transaksi')->result(); // Tampilkan semua data transaksi
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_transaksi) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tb_transaksi'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal_transaksi)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_transaksi)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}
?>