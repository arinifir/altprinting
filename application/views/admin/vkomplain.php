<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengajuan Komplain</a></li>
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
                            <h4 class="card-title">Data Komplain</h4>
                        </div>
                        <?php foreach ($komplain as $a) { ?>
                            <div class="modal" id="gambar<?= $a->id_komplain; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?= base_url('assets/'); ?>images/komplain/<?= $a->gambar_komplain; ?>" width="100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Hubungi</th>
                                        <th>Gambar</th>
                                        <th>No Transaksi</th>
                                        <th>No WA</th>
                                        <th>Komplain</th>
                                        <th>Solusi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($komplain as $a) { ?>
                                        <tr>
                                            <td>
                                                <a href="https://wa.me/62<?= $a->no_pengaju; ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Chat Nomor Ini">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                            </td>
                                            <td><button type="button" data-toggle="modal" class="btn" data-target="#gambar<?= $a->id_komplain; ?>" data-toggle="tooltip"><img src="<?= base_url('assets/'); ?>images/komplain/<?= $a->gambar_komplain; ?>" width="32" /></button></td>
                                            <td><?= $a->no_transaksi; ?>&nbsp;
                                                <a href="<?= base_url('admin/Transaksi/detailtransaksi/' . $a->no_transaksi) ?>" type="button" data-toggle="tooltip" class="mdi mdi-eye fa-lg text-warning" data-original-title="Detail Transaksi"></a>
                                            </td>
                                            <td><?= $a->no_pengaju; ?></td>
                                            <td><?= $a->isi_komplain; ?></td>
                                            <td><?= $a->solusi_komplain; ?></td>
                                            <td>
                                                <?php if ($a->status_komplain == 1) { ?>
                                                    <span class="label label-pill label-danger">Diproses</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-success">Selesai</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('admin/Transaksi/komplainselesai/' . $a->id_komplain) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Selesai">
                                                        <i class="fa fa-check text-white"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Hubungi</th>
                                        <th>Gambar</th>
                                        <th>No Transaksi</th>
                                        <th>No WA</th>
                                        <th>Komplain</th>
                                        <th>Solusi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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