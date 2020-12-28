<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ulasan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Lihat Ulasan</a></li>
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
                            <h4 class="card-title">Rating Produk
                                <?php foreach ($rating as $r) { ?>
                                    <li class="fa fa-star text-danger"></li> <?= $r->rerata ?> (<?= $r->jml ?> Ulasan)
                                <?php } ?></h4>
                        </div>
                        <div class="row">
                            <?php foreach ($ulas as $u) { ?>
                                <!-- /.col -->
                                <div class="col-md-3">
                                    <div class="card card-warning">
                                        <div class="card-body">
                                            <h3 class="card-title"><?= $u->nama_ulas; ?></h3>
                                            <li class="fa fa-star text-danger"></li> <?= $u->rating_ulas; ?>
                                            <hr>
                                            <?= $u->isi_ulas; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            <?php } ?>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>