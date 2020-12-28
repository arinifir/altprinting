<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gambar Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $nomor; ?></a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Slides With controls</h4>
                        <div class="bootstrap-carousel">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php 
                                    $i = 1;
                                    foreach($gambar as  $g){ ?>
                                    <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
                                        <img class="d-block w-100" src="<?= base_url('assets/images/'); ?>order/<?= $g->no_transaksi; ?>/<?= $g->foto_upload; ?>" alt="First slide">
                                    </div>
                                    <?php
                                    $i++;
                                } ?>
                                </div><a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carouselExampleControls" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Sadmin/gambartransaksi'); ?>" type="button" class="btn mb-1 btn-primary">Unduh File Gambar
                            <span class="btn-icon-right"><i class="fa fa-download"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>