<div class="card">
    <div class="card-header">
        <div class="card-title">Tabel Dosen</div>
    </div>
    <div class="col-md-4 float-left">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAlamat" class="btn btn-primary mt-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtuser" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Penerima</th>
                        <th>No Handphone</th>
                        <th>Alamat Pengiriman</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alamat as $alm) : ?>
                        <tr>
                            <td><?php echo $alm['nama_penerima'] ?></td>
                            <td><?php echo $alm['nohp'] ?></td>
                            <td><?php echo $alm['alamat'] ?></td>
                            <td><?php echo $alm['kecamatan'] ?></td>
                            <td><?php echo $alm['Kabupaten'] ?></td>
                            <td><?php echo $alm['Provinsi'] ?></td>
                            <td><?php echo $alm['Kode Pos'] ?></td>
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

<div class="modal fade" id="modalDsn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/admin/c_dosen/tambah/" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan nip" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="form-group">
                        <label for="defaultSelect">Jabatan</label>
                        <select class="form-control form-control" id="defaultSelect" name="jabatan">
                            <?php foreach ($jabatan as $jbt) : ?>
                                <option value="<?= $jbt['kode_jabatan'] ?>"><?php echo $jbt['jabatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="defaultSelect">Program Studi</label>
                        <select class="form-control form-control" id="defaultSelect" name="prodi">
                            <?php foreach ($prodi as $prd) : ?>
                                <option value="<?= $prd['kode_prodi'] ?>"><?php echo $prd['prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor Handphone</label>
                        <input type="text" name="nohp" class="form-control" id="nohp" placeholder="Masukkan Nomor Handphone" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Pilih Foto</label>
                        <input type="file" name="zip" class="form-control-file" id="file_zip">
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

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart("admin/mahasiswa/uploadExcel/") ?>
                <div class="row">
                    <div class="form-group mx-4">
                        <label for="exampleFormControlFile1">Pilih File Excel</label>
                        <input type="file" name="excel" class="form-control-file" id="file_excel">
                        <button type="submit" class="btn btn-primary btn-sm mt-1"> <i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                    </div>
                    <div class="form-group float-right mx-5">
                        <label for="exampleFormControlFile1">Pilih File Zip</label>
                        <input type="file" name="zip" class="form-control-file" id="file_zip">
                        <button type="submit" class="btn btn-primary btn-sm mt-1"> <i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                    </div>
                </div>
                <p class="mx-3 text-muted">Nb : Silahkan download template Excel terlebih dahulu dengan cara klik tombol "Download" di bawah ini.</p>
                <div class="float-right">
                    <a href="<?= base_url() ?>assets/excel/Templates.xlsx" class="btn btn-success"><i class="fas fa-download"></i>&nbsp;&nbsp;Download</a>
                </div>
            </div>
        </div>
    </div>
</div>