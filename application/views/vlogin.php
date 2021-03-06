<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ALT | Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>alt_rectangle_120.png">
    <!-- CSS -->
    <link href="<?= base_url('assets/admin/') ?>css/style.css" rel="stylesheet">
</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                                <a class="text-center" href="<?= base_url('Auth') ?>">
                                    <h4>Selamat Datang di ALT Printing</h4>
                                </a>
                                <div class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control password" placeholder="Password" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100 btnlogin">Masuk</button>
                                </div>
                                <p class="mt-5 login-form__footer">Belum punya akun? <a href="<?= base_url('Auth/register') ?>" class="text-primary">Daftar sekarang !</a></p>
                                <p><a href="<?= base_url('auth/lupapassword') ?>" class="text-primary">Lupa Password</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/admin/') ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/styleSwitcher.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= base_url('assets/myjs/') ?>my.js"></script>

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
</body>

</html>