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
    <!--================Order Details Area =================-->
    <section class="order_details section-margin--small">
        <div class="container">
            <p class="text-center billing-alert">Terima kasih sudah berbelanja di ALT Printing</p>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="confirmation-card">
                        <h3 class="billing-title">Ulasan</h3>
                        <div class="order-rable">
                            <p>Berikan rating dan ulasan Anda mengenai produk yang Anda beli di menu detail produk.</p>
                            <div class="form-group">
                                <a type="button" href="<?= base_url('pelanggan/Kategori'); ?>" class="button button-tracking">Kategori</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="confirmation-card">
                        <h3 class="billing-title">Komplain</h3>
                        <div class="order-rable">
                            <p>Anda bisa mengajukan komplain mengenai pesanan yang Anda terima dengan klik tombol di bawah ini.</p>
                            <div class="form-group">
                                <a type="button" href="<?= base_url('pelanggan/Order/userkomplain/' . $order->no_transaksi); ?>" class="button button-tracking">Komplain</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->

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