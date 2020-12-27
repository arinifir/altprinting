<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Resi Pengiriman</a></li>
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
                            <h4 class="card-title">Resi Pengiriman</h4>
                        </div>
                        <?php foreach ($transaksi as $t) { ?>
                            <div class="modal fade" id="resi<?= $t->no_transaksi; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Resi <?= $t->no_transaksi; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/tambahresi') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Resi <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="nomor" value="<?= $t->no_transaksi; ?>" hidden>
                                                        <input type="text" class="form-control" id="val-username" name="resi" placeholder="Masukkan resi" value="<?= $t->no_resi; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>No Resi</th>
                                        <th>Detail</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Notelp</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($t->no_resi == "") { ?>
                                                    <a href="#" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger text-white disabled" data-original-title="Dikemas">
                                                        Kirim Resi
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('Sadmin/orderselesai/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Selesai">
                                                        Selesai
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/resi/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger text-white" data-original-title="Dikemas">
                                                        Kirim Resi
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($t->no_resi == "") { ?>
                                                    <div class="form-button-action">
                                                        <a type="button" href="#" data-toggle="modal" data-target="#resi<?= $t->no_transaksi; ?>" class="btn btn-secondary text-white" data-original-title="Resi"> Masukkan Resi
                                                        </a>
                                                    </div>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-warning"><?= $t->no_resi; ?></span>&nbsp; <a title="Edit Resi" href="#" type="button" class="mdi mdi-pencil fa-lg text-warning" data-toggle="modal" data-target="#resi<?= $t->no_transaksi ?>"></a>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Sadmin/detailtransaksi/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-info text-white" data-original-title="Detail Transaksi">Detail</a>
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
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>No Resi</th>
                                        <th>Detail</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Notelp</th>
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