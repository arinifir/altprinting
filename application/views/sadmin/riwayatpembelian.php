<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Keuangan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Riwayat Pembelian</a></li>
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
                            <h4 class="card-title">Data Pembelian</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No Beli</th>
                                        <th>Tanggal</th>
                                        <th>ID User</th>
                                        <th>Nama</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah Beli</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($beli as $p) { ?>
                                        <tr>
                                            <td><?= $p->no_beli; ?></td>
                                            <td><?= $p->tanggal_beli; ?></td>
                                            <td><?= $p->user_beli; ?></td>
                                            <td><?= $p->nama_beli; ?></td>
                                            <td><?= $p->produk_beli; ?></td>
                                            <td><?= $p->harga_beli; ?></td>
                                            <td><?= $p->jumlah_beli; ?></td>
                                            <td>Rp <?= number_format($p->subtotal_beli, 0, '.', '.'); ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Beli</th>
                                        <th>Tanggal</th>
                                        <th>ID User</th>
                                        <th>Nama</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah Beli</th>
                                        <th>Subtotal</th>
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