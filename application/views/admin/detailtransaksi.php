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
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Info Pesanan</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $transaksi->no_transaksi; ?> (<?php
                                                                                                    $date = date_create($transaksi->tanggal_transaksi);
                                                                                                    echo date_format($date, 'd M Y'); ?>, <?= date_format($date, 'H:i'); ?>)</h6>
                        <p class="card-text">Pembayaran Via : <?= $transaksi->jenis_pembayaran == 1 ? 'Transfer Bank' : 'Cash On Delivery' ?></p>
                        <p class="card-text d-inline">
                            <?php if ($transaksi->status_transaksi == 0) {
                                echo '<span class="text-danger">Pesanan Dibatalkan</span>';
                            } else if ($transaksi->status_transaksi == 1) {
                                echo '<span class="text-danger">Menunggu Pembayaran</span>';
                            } else if ($transaksi->status_transaksi == 2) {
                                echo '<span class="text-danger">Konfirmasi Pembayaran</span>';
                            } else if ($transaksi->status_transaksi == 3) {
                                echo '<span class="text-danger">Dikemas</span>';
                            } else if ($transaksi->status_transaksi == 4) {
                                echo '<span class="text-danger">Sedang Dikirim <br/>(No resi : ' . $transaksi->no_resi . ') </span>';
                            } else {
                                echo '<span class="text-success">Selesai</span>';
                            }
                            ?><span class="card-link float-right"><?= "Rp " . number_format($transaksi->total_bayar, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Info Pelanggan</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $transaksi->no_pembeli; ?></h6>
                        <p class="card-text"><?= $transaksi->nama_pembeli; ?> (Catatan : <?= $transaksi->desk_transaksi; ?>)</p>
                        <p class="card-text d-inline"><span class="text-muted"><?= $transaksi->email_pembeli; ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alamat Pengiriman</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $transaksi->jenis_pembayaran == 1 ? 'Alamat Lengkap' : 'Tempat COD' ?></h6>
                        <p class="card-text">
                            <?php if ($transaksi->jenis_pembayaran == 1) { ?>
                                <?= $transaksi->alamat_pembeli . ', ' . $transaksi->kab_pembeli . ', Provinsi ' . $transaksi->prov_pembeli . ' ' . $transaksi->kpos_pembeli; ?>
                            <?php } else { ?>
                                <?= $transaksi->detail_cod; ?>
                            <?php } ?>
                        </p>
                        <p class="card-text d-inline"><span class="text-muted"><strong>No Telp </strong><?= $transaksi->no_pembeli; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <h4 class="col-md-6 card-title">Detail Transaksi</h4>
                                <div class="col-md-6">
                                    <a href="<?= base_url('admin/Transaksi/gambartransaksi/' . $transaksi->no_transaksi); ?>" type="button" class="btn btn-primary float-right">Lihat Gambar
                                        <span class="btn-icon-right"><i class="fa fa-eye"></i></span>
                                    </a>
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