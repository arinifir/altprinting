<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Voucher</a></li>
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
                            <h4 class="card-title">Data Voucher</h4>
                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data
                                <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>
                        <div class="modal fade" id="addModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-valide" action="<?= base_url('Sadmin/addvoucher') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-username">Kode Voucher <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-username" name="kode" placeholder="Enter a kode..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">Voucher <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-email" name="voucher" placeholder="Enter a voucher..">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-password">Potongan Voucher<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" class="form-control" id="val-password" name="potongan" placeholder="Enter Potongan..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">Jenis<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <select id="inputState" name="jenis" class="form-control">
                                                        <option selected="selected" disabled>Pilih...</option>
                                                        <option value="1">Pengurangan</option>
                                                        <option value="2">Persentase</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($voucher as $v) { ?>
                            <div class="modal fade" id="editModal<?= $v->kd_voucher; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editvoucher') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="text" hidden value="<?= $v->kd_voucher; ?>" class="form-control" id="val-username" name="kode" placeholder="Enter a kode..">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Voucher <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" value="<?= $v->voucher; ?>" class="form-control" id="val-email" name="voucher" placeholder="Enter a voucher..">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-password">Potongan Voucher<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="number" value="<?= $v->potongan_voucher; ?>" class="form-control" id="val-password" name="potongan" placeholder="Enter Potongan..">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Jenis<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <select id="inputState" name="jenis" class="form-control">
                                                            <option value="<?= $v->jenis_voucher; ?>" selected="selected">
                                                                <?php if ($v->jenis_voucher == 1) {
                                                                    echo 'Pengurangan';
                                                                } else if ($v->jenis_voucher == 2) {
                                                                    echo 'Persentase';
                                                                } ?>
                                                            </option>
                                                            <option disabled>Pilih...</option>
                                                            <option value="1">Pengurangan</option>
                                                            <option value="2">Persentase</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                                        <th conspan="2">Action</th>
                                        <th>No</th>
                                        <th>Kode Voucher</th>
                                        <th>Voucher</th>
                                        <th>Potongan Harga</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Aktif/Nonaktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($voucher as $v) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $v->kd_voucher; ?>" data-toggle="tooltip" title="" class="btn mb-1 btn-warning" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="<?= base_url('Sadmin/delvoucher/' . $v->kd_voucher); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $v->kd_voucher; ?></td>
                                            <td><?= $v->voucher; ?></td>
                                            <td>
                                                <?php if ($v->jenis_voucher == 1) {
                                                    echo "Rp " . number_format($v->potongan_voucher, 0, ',', '.');
                                                } else if ($v->jenis_voucher == 2) {
                                                    echo $v->potongan_voucher . '%';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($v->jenis_voucher == 1) {
                                                    echo 'Pengurangan';
                                                } else {
                                                    echo 'Persentase';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($v->status_voucher == 1) { ?>
                                                    <span class="label label-pill label-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Non-Active</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Sadmin/vaktif/' . $v->kd_voucher) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Active">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/vnaktif/' . $v->kd_voucher) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Non-Active">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th conspan="2">Action</th>
                                        <th>No</th>
                                        <th>Kode Voucher</th>
                                        <th>Voucher</th>
                                        <th>Potongan Harga</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Aktif/Nonaktif</th>
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