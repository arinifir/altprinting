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
                                    <form class="form-valide" action="<?= base_url('Sadmin/addproduk') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Nama Produk <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="namaproduk" placeholder="Masukkan nama produk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Harga <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="harga" placeholder="Masukkan harga produk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Harga Diskon <span class="text-danger">persen *</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="" name="hargadiskon" placeholder="Masukkan diskon produk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Kategori <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <select id="inputState" name="kategori" class="form-control">
                                                        <option selected="selected" disabled>Pilih</option>
                                                        <?php foreach ($kategori as $k) : ?>
                                                            <option value="<?= $k->kd_kategori; ?>"><?= $k->kategori; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Deskripsi <span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <textarea type="text" class="form-control" id="" name="deskripsi" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Gambar <span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="file" name="gambar_produk" class="form-control-file" id="gambar">
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

                        <?php foreach ($produk as $pr) { ?>
                            <div class="modal fade" id="editModal<?= $pr->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Data <?= $pr->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editproduk') ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="text" value="<?= $pr->kd_produk; ?>" class="form-control" id="" name="kode" hidden>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="" >Nama Produk <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $pr->nama_produk; ?>" name="namaproduk" placeholder="Masukkan nama produk">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="" >Harga <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $pr->harga_produk; ?>" name="harga" placeholder="Masukkan harga produk">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="" >Harga Diskon <span class="text-danger">persen *</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="" value="<?= $pr->diskon_produk; ?>" name="hargadiskon" placeholder="Masukkan diskon produk">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Kategori <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <select id="inputState" name="kategori" class="form-control">
                                                            <option value="<?= $pr->kategori_produk; ?>" selected="selected">
                                                                <?= $this->db->get_where('tb_kategori',['kd_kategori' => $pr->kategori_produk])->row()->kategori; ?>
                                                            </option>
                                                            <option disabled>Pilih</option>
                                                            <?php foreach ($kategori as $k) : ?>
                                                                <option value="<?= $k->kd_kategori; ?>"><?= $k->kategori; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Deskripsi <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $pr->desk_produk; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="">Gambar <span class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <input type="file" name="gambar_produk" class="form-control-file" id="gambar" value="<?= $pr->gambar_produk; ?>">
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

                        <?php foreach ($produk as $pr) { ?>
                            <div class="modal fade" id="diskon<?= $pr->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Diskon <?= $pr->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editdiskon') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Diskon <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="val-username" name="kode" value="<?= $pr->kd_produk; ?>" hidden>
                                                        <input type="number" class="form-control" id="val-username" name="diskon" placeholder="Masukkan diskon" value="<?= $pr->diskon_produk; ?>">
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
                        <?php foreach ($produk as $pr) { ?>
                            <div class="modal" id="gambar<?= $pr->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?= base_url('assets/'); ?>images/produk/<?= $pr->gambar_produk; ?>" width="100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($produk as $pr) { ?>
                            <div class="modal fade" id="desk<?= $pr->kd_produk; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deskripsi <?= $pr->kd_produk; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form class="form-valide" action="<?= base_url('Sadmin/editdesk') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Deskripsi <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input name="kode" hidden value="<?= $pr->kd_produk; ?>">
                                                        <textarea name="desk" class="summernote"><?= $pr->desk_produk; ?></textarea>
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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Harga Final</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Status Produk</th>
                                        <th>Aktif/Nonaktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $pr) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $pr->kd_produk; ?>" data-toggle="tooltip" title="" class="btn mb-1 btn-warning" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <a href="<?= base_url('Sadmin/delproduk/' . $pr->kd_produk); ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pr->kd_produk; ?></td>
                                            <td><img src="<?= base_url('assets/'); ?>files/<?= $pr->gambar_produk; ?>" width="32" /></td>
                                            <td><?= $pr->nama_produk; ?></td>
                                            <td><?= "Rp " . number_format($pr->harga_produk, 0, ',', '.') ?></td>
                                            <td><?= $pr->diskon_produk; ?>% <a title="Edit Diskon" href="#" type="button" class="mdi mdi-pencil fa-lg text-warning" data-toggle="modal" data-target="#diskon<?= $pr->kd_produk ?>"></a></td>
                                            <td><?= "Rp " . number_format(($pr->harga_produk - ($pr->harga_produk * ($pr->diskon_produk / 100))), 0, ',', '.') ?></td>
                                            <td><?= $pr->kategori; ?></td>
                                            <td><a type="button" href="#" data-toggle="modal" data-target="#desk<?= $pr->kd_produk; ?>" class="mdi mdi-eye fa-lg text-info" data-original-title="Lihat Deskripsi"></td>
                                            <td>
                                                <?php if ($pr->status_produk == 1) { ?>
                                                    <span class="label label-pill label-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="label label-pill label-danger">Arsip</span>
                                                <?php } ?>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Sadmin/produkaktif/' . $pr->kd_produk) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success" data-original-title="Aktifkan">
                                                        <i class="fa fa-check text-white"></i>
                                                    </a>
                                                    <a href="<?= base_url('Sadmin/produkarsip/' . $pr->kd_produk) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger" data-original-title="Arsipkan">
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
                                        <th>Kode Produk</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Harga Final</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Status Produk</th>
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