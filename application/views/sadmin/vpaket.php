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
                        <div class="modal fade" id="addModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-valide" action="<?= base_url('Sadmin/addpaket') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Nama Paket <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="kodeproduk" hidden value="<?= $produk->kd_produk; ?>">
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

                        <?php foreach ($paket as $p) { ?>
                            <div class="modal fade" id="editModal<?= $p->kd_paket; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data <?= $p->kd_paket; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('sadmin/editpaket') ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="text" value="<?= $p->kd_paket; ?>" class="form-control" id="" name="kode" hidden>
                                                <input type="text" value="<?= $p->kd_produk; ?>" class="form-control" id="" name="kodeproduk" hidden>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Nama Paket <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $p->nama_paket; ?>" name="namapaket" placeholder="Masukkan nama paket">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Harga <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $p->harga_paket; ?>" name="harga" placeholder="Masukkan harga paket">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Isi <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <textarea type="text" class="form-control" id="isi" name="isi" rows="3"><?= $p->isi_paket; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Gambar <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <input type="file" name="gambar_paket" class="form-control-file" id="gambar" value="<?= $p->gambar_paket; ?>">
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

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th conspan="2">Aksi</th>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Gambar</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Status Paket</th>
                                        <th conspan="2">Aktif/Arsip</th>
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
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <a href="<?= base_url('Sadmin/delpaket/' . $p->kd_paket); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->kd_paket; ?></td>
                                            <td><img src="<?= base_url('assets/'); ?>images/paket/<?= $p->gambar_paket; ?>" width="32" /></td>
                                            <td><?= $p->nama_paket; ?></td>
                                            <td><?= $p->isi_paket; ?></td>
                                            <td><?= $p->harga_paket; ?></td>
                                            <td>
                                                <?php if ($p->status_paket == 1) { ?>
                                                    <span class="label label-pill label-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Arsip</span>
                                                <?php } ?>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Sadmin/paketaktif/' . $p->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Aktif">
                                                        <i class="mdi mdi-check-bold text-white"></i>
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/paketarsip/' . $p->kd_paket) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Arsip">
                                                        <i class="mdi mdi-close-thick"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th conspan="2">Aksi</th>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Gambar</th>
                                        <th>Nama Paket</th>
                                        <th>Isi Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Status Paket</th>
                                        <th conspan="2">Aktif/Arsip</th>
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