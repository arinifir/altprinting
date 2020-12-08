

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
                            <table class="table table-striped table-bordered zero-configuration">
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
                                    foreach ($join2 as $p) { ?>
                                        <tr>
                                            <td>
                                            <?php echo form_open('Pelanggan/hapus/'.$p->id_user) ?>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Pelanggan/delpelanggan/' . $p->id_user); ?>" type="button" data-toggle="tooltip" 
                                                    title="" class="btn mb-1 btn-danger" data-original-title="Remove " onclick="return confirm('Anda Yakin Ingin Menghapus?');">
                                                        <i class="fa fa-trash"></i>
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
                                                    <span class="label label-pill label-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Non-Active</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Admin/useractive/'. $p->id_user)?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Active">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="<?= base_url('Admin/usernonactive/'. $p->id_user)?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Non-Active">
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