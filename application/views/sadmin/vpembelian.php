<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Keuangan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembelian</a></li>
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
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Jumlah Beli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produk as $p) { ?>
                                        <tr>
                                            <form action="<?= base_url('Sadmin/tambahcart/' . $p->kd_produk); ?>" method="post">
                                                <td><?= $p->kd_produk; ?></td>
                                                <td><?= $p->nama_produk; ?></td>
                                                <td>Rp <?= $p->harga_produk; ?></td>
                                                <td><input type="number" value="1" min="1" name="qty" class="form-control" style="width:50%;"></td>
                                                <td>
                                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Tambah">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Jumlah Beli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Pembelian</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Jumlah Beli</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($this->cart->contents() as $c) { ?>
                                        <tr>
                                            <td><?= $c['id']; ?></td>
                                            <td><?= $c['name']; ?></td>
                                            <td>Rp <?= $c['price']; ?></td>
                                            <td><?= $c['qty'];; ?></td>
                                            <td><?= $c['subtotal'];; ?></td>
                                            <td>
                                                <a href="<?= base_url('Sadmin/hapuscart/' . $c['rowid']) ?>" type="button" data-toggle="tooltip" title="" class="fa-lg text-danger" data-original-title="Hapus">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title col-md-6">Total</h4>
                                <button class="btn btn-warning text-white ml-auto col-md-6" disabled>
                                    Rp <?= $this->cart->total(); ?>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"></h4>
                                <a href="<?= base_url('Sadmin/tambahbeli'); ?>" type="button" class="btn btn-primary btn-round ml-auto">
                                    Submit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>