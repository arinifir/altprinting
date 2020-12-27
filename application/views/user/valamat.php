<section class="checkout_area section-margin--small">
    <div class="container col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5 class="text-center">Tambah Data Alamat</h5>
            </div>
            <div class="col-md-4 float-left">
                <a href="<?= base_url('pelanggan/Alamat/pageTambah'); ?>" class="button mt-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dtuser" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Penerima</th>
                                <th>No Handphone</th>
                                <th>Alamat Pengiriman</th>
                                <th>Daerah Pengiriman</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alamat as $alm) : ?>
                                <tr>
                                    <td><?php echo $alm['nama_penerima'] ?></td>
                                    <td><?php echo $alm['nohp'] ?></td>
                                    <td><?php echo $alm['alamat'] ?></td>
                                    <td><?php echo $alm['kabupaten'] ?></td>
                                    <td><?php echo $alm['provinsi'] ?></td>
                                    <td><?php echo $alm['kodepos'] ?></td>
                                    <td width="130">
                                        <a href="<?php echo base_url('pelanggan/alamat/edit/') . $alm['id_alamat'] ?>" data-tooltip="tooltip" title="Edit Data" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button data-tooltip="tooltip" title="Hapus Data" type="button" data-id="<?= $alm['id_alamat'] ?>" data-link="pelanggan/alamat/hapus/" data-nama=" dosen <?= $alm['nama'] ?>" id="hapus_crud" class="btn btn-danger btn-sm hapus_crud"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/pelanggan/alamat/tambah/" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Penerima</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor Handphone</label>
                        <input type="text" name="nohp" class="form-control" id="nohp" placeholder="Masukkan Nomor Handphone" maxlength="13" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select class="custom-select" id="provinsi" aria-label="Example select with button addon">

                        </select>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <div class="select">
                                    <select class="form-control" id="provinsi">
                                        <option>Pilih Provinsi</option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <div class="select">
                                    <select class="form-control" id="provinsi">
                                        <option>Pilih Provinsi</option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <div class="select">
                                    <select class="form-control" id="provinsi">
                                        <option>Pilih Provinsi</option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="kabupaten">Kabupaten</label>
                        <select class="custom-select" id="kabupaten" aria-label="Example select with button addon">
                            <option selected>Pilih Kabupaten.</option>
                            <option value="1">One</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select class="custom-select" id="kecamatan" aria-label="Example select with button addon">
                            <option selected>Pilih Kecamatan</option>
                            <option value="1">One</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nim">Kode Pos</label>
                        <input type="text" name="kodepos" class="form-control" id="kodepos" placeholder="Masukkan Kode Pos" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <input type="submit" id="tbh_mhs" class="btn btn-primary" value="Tambah Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($alamat as $gol) { ?>
    <div class="modal fade" id="<?= $alm->id_alamat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Alamat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>/admin/c_golongan/edit/<?= $gol->id_alamat ?>" method="post">
                        <div class="form-group">
                            <label for="golongan">Alamat</label>
                            <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Masukkan Alamat" pattern="[A-Z]" title="Masukan harus diisi, dan hanya menggunakan Huruf Kapital" value="<?= $alm->golongan ?>" required>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <input type="submit" id="tbh_mhs" class="btn btn-primary" value="Simpan Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>