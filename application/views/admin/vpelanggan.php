<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelanggan</a></li>
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
                            <h4 class="card-title">Data Pelanggan</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Status Akun</th>
                                        <th conspan="2">Aktif/Nonaktif</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pelanggan as $p) { ?>
                                        <tr>
                                            <td>
                                                <?php echo form_open('admin/pelanggan/hapus/' . $p->id_user) ?>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('admin/pelanggan/delpelanggan/' . $p->id_user); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Hapus " onclick="return confirm('Anda yakin ingin menghapus?');">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->id_user; ?></td>
                                            <td><?= $p->nama_lengkap; ?></td>
                                            <td><?= $p->email; ?></td>
                                            <td><?= $p->no_hp; ?></td>
                                            <td>
                                                <?php if ($p->status == 1) { ?>
                                                    <span class="label label-pill label-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Non-Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('admin/pelanggan/useractive/' . $p->id_user) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Aktif">
                                                        <i class="fa fa-check text-white"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/pelanggan/usernonactive/' . $p->id_user) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Non-Aktif">
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
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Status Akun</th>
                                        <th conspan="2">Aktif/Nonaktif</th>
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