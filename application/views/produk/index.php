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
            <a href="#">Produk</a>
        </li>
        <li class="breadcrumb-item active">Data Produk</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
          
            <?php echo anchor('Produk/tambah','Tambah Produk',array('class'=>'btn btn-primary')) ?>
        </div>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1 ?>
                    <?php foreach ($produk as $item) : ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $item->nama_produk ?></td>
                            <td><?php echo $item->harga_produk ?></td>
                            <td><?php echo $item->diskon_produk ?></td>
                            <td><?php echo $item->desk_produk ?></td>
                            <td><?php echo $item->gambar_produk ?></td>
                            <td><?php echo $item->kategori_produk ?></td>
                            <td><?php echo $item->status_produk ?></td>
                            <td>
                            
                                <a href="<?php echo site_url('Produk/edit/'.$item->kd_produk) ?>" class="btn btn-sm btn-outline-secondary"
                                    style="padding-bottom: 0px; padding-top: 0px;">
                                    Edit
                                    <span class="btn-label btn-label-right"><i class="fa fa-edit"></i></span>
                                </a>
                                <?php echo form_open('Produk/hapus/'.$item->kd_produk) ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="padding-bottom: 0px; padding-top: 0px;"
                                    onclick="return confirm('Anda Yakin Ingin Menghapus?');">
                                    Delete
                                    <span class="btn-label btn-label-right"><i class="fa fa-trash"></i></span>
                                </button>
                                <?php echo form_close() ?>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        <?php endforeach; ?>
                    </tbody>
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