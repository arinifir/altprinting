<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Produk</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Paket</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $produk->nama_produk; ?></a></li>
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
                            
                                <h4 class="card-title">Data Paket <?= $produk->nama_produk; ?></h4>
                            
                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data
                                <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>
                        <!-- <div class="modal fade" id="addModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-valide" action="<?= base_url('Sadmin/addadmin') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-username">Nama <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-username" name="name" placeholder="Masukkan nama">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Masukkan email yang valid">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">No Telepon <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-username" name="no" placeholder="Masukkan nomer telepon">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-password" name="password" placeholder="Masukkan password minimal 8 digit">
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
                        <?php foreach ($pdmin as $p) { ?>
                            <div class="modal fade" id="editModal<?= $p->id_user; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data <?= $p->id_user; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editadmin') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="kode" value="<?= $p->id_user; ?>" hidden>
                                                        <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter a name.." value="<?= $p->nama_lengkap; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-email" name="email" value="<?= $p->email; ?>" placeholder="Your valid email..">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-email">No Telepon <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="no" value="<?= $p->no_hp; ?>" placeholder="Your active number..">
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
                        <?php } ?> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th conspan="2">Action</th>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Status Paket</th>
                                        <th conspan="2">Aktif/Nonaktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($paket as $p) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $p->kd_paket; ?>" data-toggle="tooltip" title="" class="btn mb-1 btn-warning" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="<?= base_url('Sadmin/deladmin/' . $p->kd_paket); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->kd_paket; ?></td>
                                            <td><?= $p->nama_paket; ?></td>
                                            <td><?= $p->isi_paket; ?></td>
                                            <td><?= $p->harga_paket; ?></td>
                                            <td>
                                                <?php if ($p->status_paket == 1) { ?>
                                                    <span class="label label-pill label-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Non-Active</span>
                                                <?php } ?>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Sadmin/adminactive/' . $p->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Active">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/adminonactive/' . $p->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Non-Active">
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
                                        <th>Kode Paket</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Status Paket</th>
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