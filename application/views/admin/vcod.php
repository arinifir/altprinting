<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">COD</a></li>
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
                            <h4 class="card-title">COD</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Detail COD</th>
                                        <th>Notelp</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) { ?>
                                        <tr>
                                            
                                            
                                            <td><?= $t->no_transaksi; ?></td>
                                            <td><?= $t->tanggal_transaksi; ?></td>
                                            <td><?= $t->desk_transaksi; ?></td>
                                            <td><?= $t->nama_pembeli; ?></td>
                                            <td><?= $t->email_pembeli; ?></td>
                                            <td><?= $t->detail_cod; ?></td>
                                            <td><?= $t->no_pembeli; ?></td>
                                            <td><?= "Rp " . number_format($t->pot_voucher, 0, ',', '.') ?></td>
                                            <td><?= "Rp " . number_format($t->biaya_ongkir, 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/Transaksi/detailtransaksi/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" class="btn mb-1 btn-info text-white" data-original-title="Detail Transaksi">Detail</a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/Transaksi/orderselesai/' . $t->no_transaksi) ?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-success text-white" data-original-title="Selesai">
                                                    Selesai
                                                </a>
                                                <a href="https://wa.me/62<?=$t->no_pembeli;?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger text-white" data-original-title="Chat Nomor Ini">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                                <a href="tel:<?= $t->no_pembeli;?>" type="button" data-toggle="tooltip" title="" class="btn mb-1 btn-danger text-white" data-original-title="Telfon Nomor Ini">
                                                    <i class="fa fa-phone"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Email</th>
                                        <th>Detail COD</th>
                                        <th>Notelp</th>
                                        <th>Potongan</th>
                                        <th>Ongkir</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
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