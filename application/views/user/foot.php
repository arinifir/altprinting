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
                        // list_image();
                    });
                },
            };

            // list_image();

            // function list_image() {
            //     $.ajax({
            //         url: "<?= base_url('pelanggan/Order/upload/') . $no ?>",
            //         success: function(data) {
            //             $('#preview').html(data);
            //         }
            //     });
            // }

            // $(document).on('click', '.remove_image', function() {
            //     var name = $(this).attr('id');
            //     $.ajax({
            //         url: "<?= base_url('pelanggan/Order/upload') . $no ?>",
            //         method: "POST",
            //         data: {
            //             name: name
            //         },
            //         success: function(data) {
            //             list_image();
            //         }
            //     })
            // });

        });
    </script>

</body>

</html>