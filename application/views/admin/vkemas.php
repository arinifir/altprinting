<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengemasan</a></li>
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
                            <h4 class="card-title">Pengemasan</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                       
                                        <th>Pembayaran</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Notelp</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                        <th>Detail</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($t->jenis_pembayaran == 1) { ?>
                                                    <button type="button" data-toggle="modal" class="btn" data-target="#gambar<?= $t->no_transaksi; ?>" data-toggle="tooltip"><img src="<?= base_url('assets/'); ?>images/bukti/<?= $t->bukti_pembayaran; ?>" width="32" /></button>
                                                <?php } else if ($t->jenis_pembayaran == 2) { ?>
                                                    <span class="label label-pill label-warning">COD</span>
                                                <?php } else {
                                                    echo 'Tidak Valid';
                                                } ?>
                                            </td>
                                            <td><?= $t->no_transaksi; ?></td>
                                            <td><?= $t->tanggal_transaksi; ?></td>
                                            <td><?= $t->desk_transaksi; ?></td>
                                            <td><?= $t->nama_pembeli; ?></td>
                                            <td><?= $t->email_pembeli; ?></td>
                                            <td><?= $t->alamat_pembeli . ', Kecamatan ' . $t->kec_pembeli . ', ' . $t->kab_pembeli . ', Provinsi ' . $t->prov_pembeli . ' ' . $t->kpos_pembeli; ?></td>
                                            <td><?= $t->no_pembeli; ?></td>
                                            <td><?= "Rp " . number_format($t->pot_voucher, 0, ',', '.') ?></td>
                                            <td><?= "Rp " . number_format($t->biaya_ongkir, 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/Transaksi/detailtransaksi/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-secondary text-white" data-original-title="Detail Transaksi">Detail</a>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('admin/Transaksi/selesaikemas/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Dikemas">
                                                        Selesai Dikemas
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        <th>Pembayaran</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Notelp</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                        <th>Detail</th>
                                        <th>aksi</th>
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