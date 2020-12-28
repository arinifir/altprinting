<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        $this->load->model("M_pelanggan");
        $this->load->model("M_transaksi",'transaksi');
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('pdf');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        // is_logged_in();
    }

    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',12);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Pendapatan ALT Printing Jember',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Data Pemesanan Selesai',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'NO TRANSAKSI',1,0);
        $pdf->Cell(40,6,'TANGGAL',1,0);
        $pdf->Cell(40,6,'NAMA PEMBELI',1,0);
        $pdf->Cell(50,6,'Email',1,0);
        $pdf->Cell(30,6,'TOTAL BAYAR',1,1);
        $pdf->SetFont('Arial','',10);
        $transaksi = $this->db->get_where('tb_transaksi',['status_transaksi'=> 5])->result();
        foreach ($transaksi as $row){
            $pdf->Cell(30,6,$row->no_transaksi,1,0);
            $pdf->Cell(40,6,$row->tanggal_transaksi,1,0);
            $pdf->Cell(40,6,$row->nama_pembeli,1,0);
            $pdf->Cell(50,6,$row->email_pembeli,1,0);
            $pdf->Cell(30,6,'Rp '. $row->total_bayar,1,1); 
        }
        $pdf->Output();
    }
    function pengeluaran(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',12);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Pengeluaran ALT Printing Jember',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Data Pembelian Keperluan',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'USER',1,0);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->Cell(40,6,'PEMBELIAN',1,0);
        $pdf->Cell(25,6,'HARGA',1,0);
        $pdf->Cell(25,6,'JUMLAH',1,0);
        $pdf->Cell(25,6,'SUBTOTAL',1,1);
        $pdf->SetFont('Arial','',10);
        $transaksi = $this->transaksi->getBeli();
        foreach ($transaksi as $row){
            $pdf->Cell(40,6,$row->nama_beli,1,0);
            $pdf->Cell(30,6,$row->tanggal_beli,1,0);
            $pdf->Cell(40,6,$row->produk_beli,1,0);
            $pdf->Cell(25,6,'Rp '. $row->harga_beli,1,0);
            $pdf->Cell(25,6,$row->jumlah_beli,1,0);
            $pdf->Cell(25,6,'Rp '. $row->subtotal_beli,1,1); 
        }
        $pdf->Output();
    }

    
}
