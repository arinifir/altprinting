<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Produk</a></li>
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
                            <h4 class="card-title">Data Produk</h4>
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
                                    <form class="form-valide" action="<?= base_url('Sadmin/addproduk') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-username">Nama Produk <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter a name..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-email">No Telepon <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-username" name="no" placeholder="Your active number..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
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
                        <!-- <?php foreach ($produk as $p) { ?>
                            <div class="modal fade" id="editModal<?= $p->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data <?= $p->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editadmin') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="kode" value="<?= $p->kd_produk; ?>" hidden>
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
                        <?php foreach ($produk as $p) { ?>
                            <div class="modal fade" id="diskon<?= $p->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Diskon <?= $p->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editdiskon') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Diskon <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="kode" value="<?= $p->kd_produk; ?>" hidden>
                                                        <input type="number" class="form-control" id="val-username" name="diskon" placeholder="Enter a diskon.." value="<?= $p->diskon_produk; ?>">
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
                        <?php foreach ($produk as $p) { ?>
                            <div class="modal" id="gambar<?= $p->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?= base_url('assets/'); ?>images/produk/<?= $p->gambar_produk; ?>" width="100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($produk as $p) { ?>
                            <div class="modal fade" id="desk<?= $p->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deskripsi <?= $p->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editdesk') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Deskripsi <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input name="kode" hidden value="<?= $p->kd_produk; ?>">
                                                        <textarea name="desk" class="summernote"><?= $p->desk_produk; ?></textarea>
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
                                        <th>Paket</th>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Harga Final</th>
                                        <th>Kategori</th>
                                        <th>Tambah Diskon</th>
                                        <th>Deskripsi</th>
                                        <th>Status Produk</th>
                                        <th conspan="2">Aktif/Nonaktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $p) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $p->kd_produk; ?>" data-toggle="tooltip" title="" class="btn mb-1 btn-warning" data-original-title="Edit">
                                                        <i class="fa fa-edit text-white"></i>
                                                    </button>
                                                    <button id="btnDel" type="button" data-toggle="tooltip" data-id="<?= $p->kd_produk; ?>" title="" class="btn mb-1 btn-danger btnDel" data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Sadmin/lihatpaket/' . $p->kd_produk) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-secondary text-white" data-original-title="Lihat Paket">Paket</a>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#gambar<?= $p->kd_produk; ?>" data-toggle="tooltip" title="" class="btn" data-original-title="Lihat Gambar">
                                                    <img src="<?= base_url('assets/'); ?>images/produk/<?= $p->gambar_produk; ?>" width="32" />
                                                </button>
                                            </td>
                                            <td><?= $p->kd_produk; ?></td>
                                            <td><?= $p->nama_produk; ?></td>
                                            <td><?= "Rp " . number_format($p->harga_produk, 0, ',', '.') ?></td>
                                            <td><?= "Rp " . number_format(($p->harga_produk - ($p->harga_produk * ($p->diskon_produk / 100))), 0, ',', '.') ?></td>
                                            <td><?= $p->kategori; ?></td>
                                            <td><?= $p->diskon_produk; ?>% <a title="Edit Diskon" href="#" type="button" class="fa fa-edit fa-lg text-warning" data-toggle="modal" data-target="#diskon<?= $p->kd_produk ?>"></a></td>
                                            <td><a type="button" href="#" data-toggle="modal" data-target="#desk<?= $p->kd_produk; ?>" class="fa fa-eye fa-lg text-info" data-original-title="Lihat Deskripsi"></td>
                                            <td>
                                                <?php if ($p->status_produk == 1) { ?>
                                                    <span class="label label-pill label-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Diarsipkan</span>
                                                <?php } ?>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Sadmin/produkaktif/' . $p->kd_produk) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Aktifkan">
                                                        <i class="fa fa-check text-white"></i>
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/produkarsip/' . $p->kd_produk) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Arsipkan">
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
                                        <th>Paket</th>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Harga Final</th>
                                        <th>Kategori</th>
                                        <th>Tambah Diskon</th>
                                        <th>Deskripsi</th>
                                        <th>Status Produk</th>
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