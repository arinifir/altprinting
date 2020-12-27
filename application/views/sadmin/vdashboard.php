        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Produk Terjual</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= number_format($sold->jumlah) ?></h2>
                                    <p class="text-white mb-0">Jan - <?= date('M, d Y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pendapatan</h3>
                                <div class="d-inline-block">
                                    <h3 class="text-white"><?= "Rp " . number_format($total->bayar, 0, ',', '.') ?></h3>
                                    <p class="text-white mb-0">Jan - <?= date('M, d Y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pelanggan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= number_format($user) ?></h2>
                                    <p class="text-white mb-0">Jan - <?= date('M, d Y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pesanan Diproses</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= number_format($order) ?></h2>
                                    <p class="text-white mb-0">Jan - <?= date('M, d Y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-repeat"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Lokasi</h4>
                                <div id="world-map" style="height: 470px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->