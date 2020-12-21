<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Paket</a></li>
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
                            <h4 class="card-title">Data Paket</h4>
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
                                    <form class="form-valide" action="<?= base_url('admin/Paket/addpaket') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Nama Paket <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="namapaket" placeholder="Masukkan nama paket">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Harga <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="harga" placeholder="Masukkan harga paket">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Isi <span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <textarea type="text" class="form-control" id="" name="isi" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Gambar <span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="file" name="gambar_paket" class="form-control-file" id="gambar">
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

                        <?php foreach ($paket as $pa) { ?>
                            <div class="modal fade" id="editModal<?= $pa->kd_paket; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data <?= $pa->kd_paket; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('admin/Paket/editpaket') ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="text" value="<?= $pa->kd_paket; ?>" class="form-control" id="" name="kode" hidden>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Nama Paket <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $pa->nama_paket; ?>" name="namapaket" placeholder="Masukkan nama paket">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Harga <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $pa->harga_paket; ?>" name="harga" placeholder="Masukkan harga paket">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Isi <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <textarea type="text" class="form-control" id="isi" name="isi" rows="3"><?= $pa->isi_paket; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Gambar <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <input type="file" name="gambar_paket" class="form-control-file" id="gambar" value="<?= $pa->gambar_paket; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($paket as $pa) { ?>
                            <div class="popup" id="myGambar<?= $pa->kd_paket ?>">
                                <img class="popup-content" id="img<?= $pa->kd_paket ?>">
                            </div>
                        <?php } ?>
                        <?php foreach ($paket as $pa) { ?>
                            <div class="modal fade" id="desk<?= $pa->kd_paket; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Isi <?= $pa->kd_paket; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('admin/Paket/editdesk') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Isi <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input name="kode" hidden value="<?= $pa->kd_paket; ?>">
                                                        <textarea name="desk" class="summernote"><?= $pa->isi_paket; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Gambar</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga</th>
                                        <th>Status Paket</th>
                                        <th>Aktif/Nonaktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($paket as $pa) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $pa->kd_paket; ?>" data-toggle="tooltip" title="" class="btn mb-1 btn-warning" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <a href="<?= base_url('admin/Paket/delpaket/' . $pa->kd_paket); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Hapus" onclick="return confirm('Anda yakin ingin menghapus?');">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/Paket/lihatpaket/' . $pa->kd_paket); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-secondary text-white" data-original-title="Lihat Paket">Paket
                                                </a>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pa->kd_paket; ?></td>
                                            <td><img src="<?= base_url('assets/'); ?>images/Paket/<?= $pa->gambar_paket; ?>" width="32" /></td>
                                            <td><?= $pa->nama_paket; ?></td>
                                            <td><?= "Rp " . number_format($pa->harga_paket, 0, ',', '.') ?></td>
                                            <td><?= $pa->diskon_paket; ?>% <a title="Edit Diskon" href="#" type="button" class="mdi mdi-pencil fa-lg text-warning" data-toggle="modal" data-target="#diskon<?= $pa->kd_paket ?>"></a></td>
                                            <td><?= "Rp " . number_format(($pa->harga_paket - ($pa->harga_paket * ($pa->diskon_paket / 100))), 0, ',', '.') ?></td>
                                            <td><?= $pa->kategori; ?></td>
                                            <td><a type="button" href="#" data-toggle="modal" data-target="#desk<?= $pa->kd_paket; ?>" class="mdi mdi-eye fa-lg text-info" data-original-title="Lihat Isi"></td>
                                            <td>
                                                <?php if ($pa->status_paket == 1) { ?>
                                                    <span class="label label-pill label-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Arsip</span>
                                                <?php } ?>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('admin/Paket/paketaktif/' . $pa->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Aktifkan">
                                                        <i class="fa fa-check text-white"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/Paket/paketarsip/' . $pa->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Arsipkan">
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
                                        <th>Aksi</th>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Gambar</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga</th>
                                        <th>Status Paket</th>
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