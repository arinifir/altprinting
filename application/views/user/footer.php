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

    <!-- <div class="footer-bottom"> -->
    <!-- <div class="container"> -->
    <!-- <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center"> -->
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    <!-- Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    <!-- </p>
            </div> -->
    <!-- </div> -->
    <!-- </div> -->
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
<script>
    // Show Password
    function showPassword(button) {
        var inputPassword = $(button).parent().find('input');
        if (inputPassword.attr('type') === "password") {
            inputPassword.attr('type', 'text');
        } else {
            inputPassword.attr('type', 'password');
        }
    }

    $('.show-password').on('click', function() {
        showPassword(this);
    })
</script>
<script>
    $(document).ready(function() {
        $('#dtuser').DataTable();
    });
</script>

<?php
if ($this->session->flashdata('message')) :
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Yey...',
                text: '<?= $this->session->flashdata('message'); ?>'
            })
        })
    </script>
<?php endif ?>

<?php
if ($this->session->flashdata('verified')) :
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Selamat',
                text: '<?= $this->session->flashdata('verified'); ?>'
            })
        })
    </script>
<?php endif ?>

<?php
if ($this->session->flashdata('gagal')) :
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops..',
                confirmButtonColor: '#A80201',
                text: '<?= $this->session->flashdata('gagal'); ?>',
            })
        })
    </script>
<?php endif ?>

<?php
if ($this->session->flashdata('berhasil')) :
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Hore..',
                confirmButtonColor: '#A80201',
                text: '<?= $this->session->flashdata('berhasil'); ?>',
            })
        })
    </script>
<?php endif ?>

<script>
    function logout() {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda ingin keluar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = base_url + "Auth/logout";
            }
        });
    }
</script>

<?php
if ($this->session->flashdata('simpan')) :
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Selamat',
                text: '<?= $this->session->flashdata('simpan'); ?>'
            })
        })
    </script>
<?php endif ?>

</body>

</html>