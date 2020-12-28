<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menunggu Pembayaran</a></li>
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
                            <h4 class="card-title">Menunggu Pembayaran</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Detail</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat/COD</th>
                                        <th>Notelp</th>
                                        <th>Pembayaran</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <?php if ($t->jenis_pembayaran == 2) { ?>
                                                        <a href="<?= base_url('admin/Transaksi/konfirmasi/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Lanjut Pengemasan">
                                                            <i class="mdi mdi-check"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <a href="<?= base_url('admin/Transaksi/orderbatal/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Batalkan Pesanan">
                                                        <i class="mdi mdi-close"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/Transaksi/detailtransaksi/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-secondary text-white" data-original-title="Detail Transaksi">Detail</a>
                                            </td>
                                            <td><?= $t->no_transaksi; ?></td>
                                            <td><?= $t->tanggal_transaksi; ?></td>
                                            <td><?= $t->desk_transaksi; ?></td>
                                            <td><?= $t->nama_pembeli; ?></td>
                                            <td><?= $t->email_pembeli; ?></td>
                                            <td>
                                                <?php if ($t->jenis_pembayaran == 1) { ?>
                                                    <?= $t->alamat_pembeli . ', Kecamatan ' . $t->kec_pembeli . ', ' . $t->kab_pembeli . ', Provinsi ' . $t->prov_pembeli . ' ' . $t->kpos_pembeli; ?>
                                                <?php } else if ($t->jenis_pembayaran == 2) { ?>
                                                    <?= $t->detail_cod; ?>
                                                <?php } else {
                                                    echo 'Tidak Valid';
                                                } ?>
                                            </td>
                                            <td><?= $t->no_pembeli; ?></td>
                                            <td>
                                                <?php if ($t->jenis_pembayaran == 1) { ?>
                                                    <span class="label label-pill label-warning">Transfer</span>
                                                <?php } else if ($t->jenis_pembayaran == 2) { ?>
                                                    <span class="label label-pill label-warning">COD</span>
                                                <?php } else {
                                                    echo 'Tidak Valid';
                                                } ?>
                                            </td>
                                            <td><?= "Rp " . number_format($t->pot_voucher, 0, ',', '.') ?></td>
                                            <td><?= "Rp " . number_format($t->biaya_ongkir, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Detail</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat/COD</th>
                                        <th>Notelp</th>
                                        <th>Pembayaran</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
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