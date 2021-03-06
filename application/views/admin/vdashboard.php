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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Pelanggan Login Hari Ini</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pelanggan as $u) { ?>
                                                <tr>
                                                    <th><?= $no++; ?></th>
                                                    <td><?= $u->nama_lengkap; ?></td>
                                                    <td><span class="badge badge-success px-2">Login</span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div id="chart">
                                    </div>
                                    <script src="<?= base_url('assets/highcharts/') ?>jquery.min.js" type="text/javascript"></script>
                                    <script src="<?= base_url('assets/highcharts/') ?>highcharts.js" type="text/javascript"></script>
                                    <script src="<?= base_url('assets/highcharts/') ?>modules/exporting.js" type="text/javascript"></script>
                                    <script src="<?= base_url('assets/highcharts/') ?>modules/offline-exporting.js" type="text/javascript"></script>
                                    <script type="text/javascript">
                                        jQuery(function() {
                                            new Highcharts.Chart({
                                                chart: {
                                                    renderTo: 'chart',
                                                    type: 'line',
                                                },
                                                title: {
                                                    text: 'Grafik Statistik Pembelian',
                                                    x: -20
                                                },
                                                subtitle: {
                                                    text: 'Jumlah Pembelian',
                                                    x: -20
                                                },
                                                xAxis: {
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                                                        'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'
                                                    ]
                                                },
                                                yAxis: {
                                                    title: {
                                                        text: 'Total Pembelian'
                                                    }
                                                },
                                                series: [{
                                                    name: 'Data dalam Bulan',
                                                    data: <?php echo json_encode($grafik); ?>
                                                }]
                                            });
                                        });
                                    </script>
                                </div>
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