
    <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h2>Data Transaksi</h2><hr>
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select class="form-control" name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="form-control" placeholder="yy-mm-dd"/>
            <br /><br />
        </div>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select class="form-control" name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select class="form-control" name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit" class="btn btn-info">Tampilkan</button><br><br>
        <i href="<?= base_url('Transaksi') ?>" class="fa fa-refresh" aria-hidden="true"></i>
        <a href="<?= base_url('Transaksi') ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?= base_url('Laporan') ?>">CETAK PDF</a><br /><br />
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>No Transaksi</th>
        <th>Nama Pembeli</th>
        <th>email</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi as $data){
            $tanggal_transaksi = date('d-m-Y', strtotime($data->tanggal_transaksi));
            
        echo "<tr>";
        echo "<td>".$tanggal_transaksi."</td>";
        echo "<td>".$data->no_transaksi."</td>";
        echo "<td>".$data->nama_pembeli."</td>";
        echo "<td>".$data->email_pembeli."</td>";
        echo "<td>".$data->total_bayar."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
    </tbody>
</table>
                </div>
            </div>        
    </div>
</div>
<!-- #/ container -->
</div>
    
