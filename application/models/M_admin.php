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
        $text = '1234567890';
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
    public function cekodepaket()
    {
        $query = $this->db->query("SELECT MAX(kd_paket) as kd_paket from tb_paket");
        $hasil = $query->row();
        return $hasil->kd_paket;
    }

    public function tampilproduk()
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_produk.kategori_produk = tb_kategori.kd_kategori');
        return $this->db->get()->result();
    }
    public function tampilpaket()
    {
        $this->db->select('*');
        $this->db->from('tb_paket');
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
    public function paketbykode($kode)
    {
        $this->db->select('*');
        $this->db->from('tb_paket');
        $this->db->join('tb_produk', 'tb_produk.kd_produk = tb_paket.kd_produk');
        $this->db->where(['tb_paket.kd_produk' => $kode]);
        $this->db->where(['status_paket' => 1]);
        return $this->db->get()->result();
    }
    public function produkbykode($kode)
    {
        return $this->db->get_where('tb_produk', ['kd_produk' => $kode])->row();
    }
    public function duatable()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_alamat', 'tb_alamat.id_alamat=tb_user.id_user');
        $query = $this->db->get();
        return $query->result();
    }
    public function transbystatus($status, $jenis)
    {
        return $this->db->get_where('tb_transaksi', ['status_transaksi' => $status, 'jenis_pembayaran' => $jenis])->result();
    }
    public function transtatus($status)
    {
        return $this->db->get_where('tb_transaksi', ['status_transaksi' => $status])->result();
    }

    function statistik_pendapatan()
    {

        $sql = $this->db->query("
  
  select
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=1)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Januari`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=2)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Februari`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=3)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Maret`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=4)AND (YEAR(tanggal_transaksi)=2020))),0) AS `April`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=5)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Mei`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=6)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Juni`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=7)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Juli`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=8)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Agustus`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=9)AND (YEAR(tanggal_transaksi)=2020))),0) AS `September`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=10)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Oktober`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=11)AND (YEAR(tanggal_transaksi)=2020))),0) AS `November`,
  ifnull((SELECT count(no_transaksi) FROM (tb_transaksi)WHERE((Month(tanggal_transaksi)=12)AND (YEAR(tanggal_transaksi)=2020))),0) AS `Desember`
 from tb_transaksi GROUP BY YEAR(tanggal_transaksi) 
  
  ");

        return $sql;
    }
    public function transByNo($no)
    {
        return $this->db->get_where('tb_transaksi', ['no_transaksi' => $no])->row();
    }
    public function detailByNo($no)
    {
        return $this->db->get_where('tb_dtrans', ['no_transaksi' => $no])->result();
    }
    public function productSold()
    {
        $this->db->select('SUM(jumlah_produk) as jumlah');
        $this->db->from('tb_dtrans');
        $this->db->join('tb_transaksi', 'tb_dtrans.no_transaksi=tb_transaksi.no_transaksi');
        $this->db->where(['status_transaksi' => 5]);
        $query = $this->db->get();
        return $query->row();
    }
    public function allPelanggan()
    {
        return $this->db->get_where('tb_user', ['level' => 3])->num_rows();
    }
    public function orderProcess()
    {
        $this->db->where('status_transaksi != 0');
        $this->db->where('status_transaksi != 5');
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function pendapatan()
    {
        $this->db->select('SUM(total_bayar) as bayar');
        $this->db->from('tb_transaksi');
        $this->db->where(['status_transaksi' => 5]);
        $query = $this->db->get();
        return $query->row();
    }
    public function getImage($no)
    {
        return $this->db->get_where('tb_gambar', ['no_transaksi' => $no])->result();
    }
    function jmlUlasan()
    {
        return $this->db->select('tb_produk.kd_produk, nama_produk, gambar_produk, count(id_ulas) as jml, round(avg(rating_ulas),1) as rerata')
            ->from('tb_produk')
            ->join('tb_ulasan', 'tb_produk.kd_produk=tb_ulasan.kd_produk', 'left')
            ->group_by('tb_produk.kd_produk')->get()->result();
    }
    public function getUlasan($kode)
    {
        return $this->db->select('*')->from('tb_ulasan')->get_where('', ['kd_produk' => $kode])->result();
    }
    public function rating($kode)
    {
        return $this->db->select('*, count(id_ulas) as jml, round(avg(rating_ulas),1) as rerata')->from('tb_ulasan')->get_where('', ['kd_produk' => $kode])->result();
    }
}
