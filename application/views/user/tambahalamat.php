<section class="checkout_area section-margin--small">
    <div class="container col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5 class="text-center">Tambah Data Alamat</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>/pelanggan/alamat/tambah/" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Penerima</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor Handphone</label>
                        <input type="text" name="nohp" class="form-control" id="nohp" placeholder="" maxlength="13" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="nohp">Provinsi</label>
                            <div class="input-group">
                                <select class="custom-select" id="provinsi">
                                    <option selected>Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <option value="<?= $prov->id; ?>"><?= $prov->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="nohp">Kabupaten</label>
                            <div class="input-group">
                                <select class="custom-select" id="kabupaten" disabled>
                                    <option selected>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="nohp">Kecamatan</label>
                            <div class="input-group">
                                <select class="custom-select" id="kecamatan" disabled>
                                    <option selected>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nim">Kode Pos</label>
                        <input type="text" name="kodepos" class="form-control" id="kodepos" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer float-right">
                        <a type="button" class="button" href="<?= base_url('pelanggan/Alamat'); ?>">Kembali</a>
                        <button type="submit" id="tbh_data" class="button" value="Tambah Data">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>