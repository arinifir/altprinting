        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Net Profit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">$ 8541</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">New Customers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Customer Satisfaction</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--test-->

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
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->