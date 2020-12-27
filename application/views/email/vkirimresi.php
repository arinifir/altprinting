<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>alt_rectangle_120.png">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>mycss/my.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Icons by MDI -->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <!-- <script src="<?= base_url('assets/user/myjs/') ?>quantity.js"></script> -->

</head>

<body>
    <!--================ Start title area =================-->
    <div class="container">
        <div class="section-intro pt-5">
            <h2>No Resi <span class="section-intro__style"><?= $order->no_resi; ?></span></h2>
        </div>
    </div>
    <!--================End title area =================-->
    <!--================Order Details Area =================-->
    <section class="order_details section-margin--small">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="confirmation-card">
                        <h3 class="billing-title">Info Pesanan</h3>
                        <table class="order-rable">
                            <tr>
                                <td>Nomor Pesanan</td>
                                <td>: <?= $order->no_transaksi; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:
                                    <?php
                                    $date = date_create($order->tanggal_transaksi);
                                    echo date_format($date, 'd M Y'); ?></td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>:
                                    <?= date_format($date, 'H:i'); ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: <?= "Rp " . number_format($order->total_bayar, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td>Pembayaran Via</td>
                                <td>: <?= $order->jenis_pembayaran == 1 ? 'Transfer Bank' : 'Cash On Delivery' ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Pesanan</td>
                                <td>:
                                    <?php if ($order->status_transaksi == 0) {
                                        echo '<span class="text-danger">Pesanan Dibatalkan</span>';
                                    } else if ($order->status_transaksi == 1) {
                                        echo '<span class="text-danger">Menunggu Pembayaran</span>';
                                    } else if ($order->status_transaksi == 2) {
                                        echo '<span class="text-danger">Konfirmasi Pembayaran</span>';
                                    } else if ($order->status_transaksi == 3) {
                                        echo '<span class="text-danger">Dikemas</span>';
                                    } else if ($order->status_transaksi == 4) {
                                        echo '<span class="text-danger">Sedang Dikirim</span>';
                                    } else {
                                        echo '<span class="text-success">Selesai</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="confirmation-card">
                        <h3 class="billing-title">Info Pelanggan</h3>
                        <table class="order-rable">
                            <tr>
                                <td>Nama</td>
                                <td>: <?= $order->nama_pembeli; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?= $order->email_pembeli; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>: <?= $order->no_pembeli; ?></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>: <?= $order->desk_transaksi; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="confirmation-card">
                        <h3 class="billing-title">Alamat Pengiriman</h3>
                        <table class="order-rable">
                            <?php if ($order->jenis_pembayaran == 1) { ?>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $order->alamat_pembeli; ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>: <?= $order->kec_pembeli; ?></td>
                                </tr>
                                <tr>
                                    <td>Kota/Kabupaten</td>
                                    <td>: <?= $order->kab_pembeli; ?></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>: <?= $order->prov_pembeli; ?></td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td>: <?= $order->kpos_pembeli; ?></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>Tempat COD</td>
                                    <td>: <?= $order->detail_cod; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Detail Pesanan</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col" style="text-align:right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subtotal = 0;
                            foreach ($detail as $d) { ?>
                                <tr>
                                    <td>
                                        <p><?= $d->produk_paket; ?></p>
                                    </td>
                                    <td>
                                        <p><?= "Rp " . number_format($d->harga_produk_paket, 0, ',', '.') ?></p>
                                    </td>
                                    <td>
                                        <h5>x <?= $d->jumlah_produk; ?></h5>
                                    </td>
                                    <td align="right">
                                        <p><?= "Rp " . number_format($d->subtotal, 0, ',', '.'); ?></p>
                                    </td>
                                </tr>
                            <?php
                                $subtotal += $d->subtotal;
                            } ?>
                            <tr>
                                <td>
                                    <h4>Subtotal</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td align="right">
                                    <p><?= "Rp " . number_format($subtotal, 0, ',', '.'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Biaya Ongkir</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td align="right">
                                    <p><?= "Rp " . number_format($order->biaya_ongkir, 0, ',', '.'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Voucher</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td align="right">
                                    <p class="text-danger"><i><?= "- Rp " . number_format($order->pot_voucher, 0, ',', '.'); ?></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td align="right">
                                    <h4><?= "Rp " . number_format($order->total_bayar, 2, ',', '.'); ?></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>&nbsp;
        </div>
    </section>
    <!--================End Order Details Area =================-->
    <!--================ Start footer Area  =================-->
    <footer class="footer">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Tentang Kami</h4>
                            <p>
                                ALT Printing
                            </p>
                            <p>
                                Bisnis Lokal Anak Muda Jember <br>
                                Bergerak dalam bidang percetakan
                                berupa foto polaroid dan foto figura desain
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Navigasi</h4>
                            <ul class="list">
                                <li><a href="#">Beranda</a></li>
                                <li><a href="#">Produk</a></li>
                                <li><a href="#">Konfirmasi Pembayaran</a></li>
                                <li><a href="#">Panduan</a></li>
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r1.jpg" alt=""></li>
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r2.jpg" alt=""></li>
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r3.jpg" alt=""></li>
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r5.jpg" alt=""></li>
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r7.jpg" alt=""></li>
                            <li><img src="<?= base_url('assets/user/') ?>img/gallery/r8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div> -->
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Hubungi Kami</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="mdi mdi-map-marker"></span>
                                    Tempat Cetak
                                </p>
                                <p>Jl. Kaliurang. Perum Istana Tidar Regency B4/4
                                    KAB. JEMBER - SUMBER SARI</p>

                                <p class="sm-head">
                                    <span class="mdi mdi-phone fa-lg"></span>
                                    Nomer Telepon
                                </p>
                                <p>
                                    (+62)822 3312 3326 Admin 1<br>
                                    (+62)822 5784 5010 Admin 2
                                </p>

                                <p class="sm-head">
                                    <span class="mdi mdi-email"></span>
                                    Email
                                </p>
                                <p>
                                    altclothingjember@gmail.com
                                </p>

                                <p class="sm-head">
                                    <span class="mdi mdi-instagram"></span>
                                    Instagram
                                </p>
                                <p>
                                    <a class="text-white" href="https://www.instagram.com/alt_jember/" target="_blank" rel="noopener noreferrer">
                                        alt_jember
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!--================ End footer Area  =================-->

    <script src="<?= base_url('assets/user/') ?>vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/skrollr.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/nouislider/nouislider.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/mail-script.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/myjs/') ?>my.js"></script>
    <script src="<?= base_url('assets/myjs/') ?>paket.js"></script>

</body>

</html>