<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
  <div class="brand-logo">
    <a href="index.html">
      <b class="logo-abbr"><img src="<?= base_url('assets/images/logo.png') ?>"> </b>
      <span class="logo-compact"><img src="<?= base_url('assets/images/logo-compact.png') ?>" alt=""></span>
      <span class="brand-title">
        <img src="<?= base_url('assets/images/logo-text.png') ?>">
      </span>
    </a>
  </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->

  <div class="container-fluid">

  </div>
  <div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Pelanggan</a>
        </li>
        <li class="breadcrumb-item active">Data Pelanggan</li>
    </ol>
    <div class="card mb-3">
        
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <tr>
    <th>No.</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Alamat</th>    
    <th>Email</th> 
    <th>Aksi</th>  
  </tr>
  <?php 
  $no=1; 
  foreach ($join2 as $row) { ?>
  <tr>
  <td><?php echo $no++;?></td>
  <td><?php echo $row->nama_lengkap;?></td>
  <td><?php echo $row->no_hp;?></td>
  <td><?php echo $row->alamat;?></td>
  <td><?php echo $row->email;?></td>
  <td>
                                
 <?php echo form_open('Pelanggan/hapus/'.$row->id_user) ?>
<button type="submit" class="btn btn-sm btn-outline-danger" style="padding-bottom: 0px; padding-top: 0px;"
 onclick="return confirm('Anda Yakin Ingin Menghapus?');">
Hapus
<span class="btn-label btn-label-right"><i class="fa fa-trash"></i></span>
</button>
<?php echo form_close() ?>
</td>
  </tr>
    <?php } ?>
    
</table>
              
            </div>
        </div>
    </div>
</div>

  <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->