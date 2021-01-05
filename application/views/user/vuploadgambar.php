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
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

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
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="<?= base_url('User') ?>"><img src="<?= base_url('assets/') ?>alt_jember_rb_120.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('User') ?>">Beranda</a></li>
                            <!-- <li class="nav-item submenu dropdown">
                            <a href="<?= base_url('pelanggan/Kategori/') ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produk</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kategori/') ?>detail_produk">Foto Polaroid</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('assets/user/') ?>page/single-product.html">Figura Desain</a></li>
                            </ul>
                        </li> -->
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kategori') ?>">Belanja</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Konfirmasi') ?>">Konfirmasi Pembayaran</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Panduan') ?>">Panduan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kontak') ?>">Kontak</a></li>
                            <?php if ($this->session->userdata('id_user')) { ?>
                                <li class="nav-item submenu dropdown">
                                    <a href="<?= base_url('pelanggan/Kategori/') ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Halo, <?= $this->session->userdata('nama');; ?></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/') ?>">Profil Saya</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Alamat') ?>">Alamat Saya</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/pesanansaya') ?>">Pesanan Saya</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/riwayatpesanan') ?>">Riwayat Pesanan</a></li>
                                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="logout()" id="btnkeluar">Keluar</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <ul class="nav-shop">
                            <!-- <li class="nav-item"><button><i class="mdi mdi-magnify fa-lg"></i></button></li> -->
                            <li class="nav-item">
                                <a class="keranjang" href="<?= base_url('pelanggan/Keranjang') ?>"><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?= $this->cart->total_items(); ?></span></a>
                            </li>
                            <?php if (!$this->session->userdata('id_user')) { ?>
                                <li class="nav-item"><a class="button button-header" href="<?= base_url('Auth') ?>">Masuk</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container py-2 mt-5">
        <h4 class="my-2 mb-3">Upload Gambar</h4>
        <p>1. Upload Gambar diperlukan untuk beberapa kategori seperti Polaroid<br />
            2. Gambar yang ter upload bisa diubah selama belum dikemas.</p>
        <form action="<?= base_url('pelanggan/Order/upload/' . $no); ?>" class="dropzone" id="dropzoneFrom" enctype="multipart/form-data">
        </form>
        <div><a class="text-danger"><i>*Upload gambar sesuai dengan jumlah Pesanan Anda. Jika lebih, kami akan memilih secara acak sesuai Pesanan Anda</i></a></div>
        <div align="center" class="py-2 mt-2">
            <a href="<?= base_url('pelanggan/Order/orderfinal/' . $no); ?>" type="button" class="button btn-primary" id="submit-all">Lanjutkan</a>
        </div>
        <div id="preview" class="py-2"></div>
    </div>

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
                                <li><a href="<?= base_url('User'); ?>">Beranda</a></li>
                                <li><a href="<?= base_url('pelanggan/Kategori'); ?>">Belanja</a></li>
                                <li><a href="<?= base_url('pelanggan/Konfirmasi'); ?>">Konfirmasi Pembayaran</a></li>
                                <li><a href="<?= base_url('pelanggan/Panduan'); ?>">Panduan</a></li>
                                <li><a href="<?= base_url('pelanggan/Kontak'); ?>">Kontak</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/Mobile-friendly-Custom-Scrollbar-Plugin-With-jQuery-NiceScroll/js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/skrollr.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/nouislider/nouislider.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>vendors/mail-script.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/main.js"></script>
    <script>
        $(document).ready(function() {

            Dropzone.options.dropzoneFrom = {
                autoProcessQueue: false,
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                init: function() {
                    var submitButton = document.querySelector('#submit-all');
                    myDropzone = this;
                    submitButton.addEventListener("click", function() {
                        myDropzone.processQueue();
                    });
                    this.on("complete", function() {
                        if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                            var _this = this;
                            _this.removeAllFiles();
                        }
                        list_image();
                    });
                },
            };

            list_image();

            function list_image() {
                $.ajax({
                    url: "<?= base_url('pelanggan/Order/upload/') . $no ?>",
                    success: function(data) {
                        $('#preview').html(data);
                    }
                });
            }

            $(document).on('click', '.remove_image', function() {
                var name = $(this).attr('id');
                $.ajax({
                    url: "<?= base_url('pelanggan/Order/upload') . $no ?>",
                    method: "POST",
                    data: {
                        name: name
                    },
                    success: function(data) {
                        list_image();
                    }
                })
            });

        });
    </script>

</body>

</html>