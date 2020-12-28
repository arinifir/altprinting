<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Transaksi</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $transaksi->no_transaksi; ?></a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title">No <?= $transaksi->no_transaksi; ?></h4>
                            <a href="<?= base_url('admin/Transaksi/gambartransaksi/' . $transaksi->no_transaksi); ?>" type="button" class="btn mb-1 btn-primary">Lihat Gambar
                                <span class="btn-icon-right"><i class="fa fa-eye"></i></span>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-mb-6">
                                <div class="form-group">
                                    <label for="exampleInputDiskon">Tanggal: &nbsp;</label>
                                    <a><?= $transaksi->tanggal_transaksi; ?></a>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDiskon">Nama: &nbsp;</label>
                                    <a><?= $transaksi->nama_pembeli; ?></a>
                                </div>
                            </div>
                            <div class="col-mb-6">
                                <div class="form-group">
                                    <label for="exampleInputDiskon">Tanggal: &nbsp;</label>
                                    <a><?= $transaksi->tanggal_transaksi; ?></a>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDiskon">Nama: &nbsp;</label>
                                    <a><?= $transaksi->nama_pembeli; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Unduh Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail as $d) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->produk_paket; ?></td>
                                            <td><?= $d->harga_produk_paket; ?></td>
                                            <td><?= $d->jumlah_produk; ?></td>
                                            <td><?= $d->subtotal; ?></td>
                                            <td><?= $d->subtotal; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Unduh Gambar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>