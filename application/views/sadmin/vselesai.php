<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">COD</a></li>
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
                            <h4 class="card-title">Transaksi Selesai</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
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
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) { ?>
                                        <tr>
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
                                                    <button type="button" data-toggle="modal" class="btn" data-target="#gambar<?= $t->no_transaksi; ?>" data-toggle="tooltip"><img src="<?= base_url('assets/'); ?>images/bukti/<?= $t->bukti_pembayaran; ?>" width="32" /></button>
                                                <?php } else if ($t->jenis_pembayaran == 2) { ?>
                                                    <span class="label label-pill label-warning">COD</span>
                                                <?php } else {
                                                    echo 'Tidak Valid';
                                                } ?>
                                            </td>
                                            <td><?= "Rp " . number_format($t->pot_voucher, 0, ',', '.') ?></td>
                                            <td><?= "Rp " . number_format($t->biaya_ongkir, 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= base_url('Sadmin/detailtransaksi/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-info text-white" data-original-title="Detail Transaksi">Detail</a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
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
                                        <th>Detail</th>
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