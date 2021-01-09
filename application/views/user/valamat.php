<!--================ Start title area =================-->
<div class="container">
    <div class="section-intro pt-5">
        <div class="row">
            <h2 class="col-md-6">Alamat <span class="section-intro__style">Saya</span> </h2>
            <div class="col-md-6">
                    <a href="<?= base_url('pelanggan/Alamat/pageTambah') ?>" class="tombol tombol_lihat">Tambah Alamat Baru</a>
                </div>
            </div>
        </div>

        <!-- <sup><a><span class="tombol_alamat"> Tambah Alamat Baru</span><a></sup> -->
    </div>
</div>
<!--================End title area =================-->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">

        <?php foreach ($alamat as $alm) : ?>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="card_pesanan">
                        <div class="row mb-3">
                            <h3 class="col-md-6"><?= $alm['nama_penerima'] ?>
                                <?php if ($alm['status_alamat'] == 1) { ?>
                                    <sup><span class="text-danger"> [Utama]</span></sup>
                                <?php } ?>
                            </h3>
                            <a class="col-md-6" align="right" href="<?= base_url('pelanggan/Alamat/delalamat/'.$alm['id_alamat']) ?>" class="tombol tombol_lihat"><i class="fa fa-trash tombol_icon"></i></a>
                        </div>
                        <hr />
                        <div class="media">
                            <div class="media-body">
                                <h6>No Telp:</h6>
                                <p><?= $alm['nohp'] ?></p>
                                <h6>Alamat Lengkap:</h6>
                                <p><?= $alm['alamat'] ?>, <?= $alm['kota_kab'] ?>, Provinsi <?= $alm['provinsi'] ?> <?= $alm['kodepos'] ?></p>
                            </div>
                            <!-- <a href="<?= base_url('pelanggan/Order/notapesanan/'); ?>" class="tombol tombol_lihat">Lihat</a>
                            <a href="<?= base_url('pelanggan/Order/uploadgambar/') ?>" class="tombol tombol_lihat">Gambar</a> -->
                        </div>
                        <a align="right" href="<?= base_url('pelanggan/Alamat/pageEdit/') . $alm['id_alamat'] ?>" data-tooltip="tooltip" title="Ubah Alamat" class="tombol tombol_lihat">Ubah</a>
                        <?php if ($alm['status_alamat'] == 1) { ?>
                        <?php } else { ?>
                            <a align="right" href="<?= base_url('pelanggan/Alamat/alamatutama/') . $alm['id_alamat'] ?>" data-tooltip="tooltip" title="Atur Sebagai Utama" class="tombol tombol_lihat">Buat Utama</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Penerima</th>
                                <th>No Handphone</th>
                                <th>Alamat Pengiriman</th>
                                <th>Status Alamat</th>
                                <th conspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alamat as $alm) : ?>
                                <tr>
                                    <td><?= $alm['nama_penerima'] ?></td>
                                    <td><?= $alm['nohp'] ?></td>
                                    <td><?= $alm['alamat'] ?>, <?= $alm['kota_kab'] ?>, <?= $alm['provinsi'] ?> <?= $alm['kodepos'] ?></td>
                                    <td>
                                        <?php if ($alm['status_alamat'] == 1) { ?>
                                            <span class="badge badge-success">Utama</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Opsi</span>
                                        <?php } ?>
                                    </td>
                                    <td width="130">
                                        <a href="<?= base_url('pelanggan/Alamat/edit/') . $alm['id_alamat'] ?>" data-tooltip="tooltip" title="Edit Alamat" class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i></a>
                                        <?php if ($alm['status_alamat'] == 1) { ?>
                                        <?php } else { ?>
                                            <a href="<?= base_url('pelanggan/Alamat/alamatutama/') . $alm['id_alamat'] ?>" data-tooltip="tooltip" title="Jadikan Utam" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div> -->
    </div>
</section>
<!--================End Cart Area =================-->