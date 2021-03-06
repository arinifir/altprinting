<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ulasan</a></li>
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
                            <h4 class="card-title">Data Ulasan</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Rating Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ulasan as $j) { ?>
                                        <tr>
                                           
                                            <td align="center"><img src="<?= base_url('assets/'); ?>images/produk/<?= $j->gambar_produk; ?>" width="32" /></td>
                                            <td><?= $j->nama_produk ?></td>
                                            <td>
                                                <li class="fa fa-star text-warning"></li> <?= $j->rerata ?> (<?= $j->jml ?> Ulasan)
                                            </td>
                                            <td>
                                                <?php if ($j->jml > 0) { ?>
                                                    <a title="Lihat Ulasan" href="<?= base_url('admin/Transaksi/lihatulasan/' . $j->kd_produk); ?>" type="button" class="btn btn-warning text-white fa fa-eye"></a>
                                                <?php } else { ?>
                                                    <a title="Lihat Ulasan" href="javascript:void(0)" type="button" class="btn btn-warning text-white fa fa-eye disabled"></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Rating Produk</th>
                                        <th>Action</th>
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