<!--================ Start title area =================-->
<div class="container">
    <div class="section-intro pt-5">
        <h2>Alamat <span class="section-intro__style">Saya</span></h2>
    </div>
</div>
<!--================End title area =================-->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
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
    </div>
</section>
<!--================End Cart Area =================-->