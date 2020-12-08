<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ALT | Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>images/alt_logo.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url('assets/admin/') ?>css/style.css" rel="stylesheet">
</head>

<body class="login">

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
                            <div class="card-body pt-5">

                                <a class="text-center" href="index.html">
                                    <h4>Silakan mendaftar!</h4>
                                </a>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('Auth/register'); ?>">
                                    <div class="form-group">
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No Handphone">
                                        <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <div class="show-password">
                                            <i class="icon-eye"></i>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Daftar</button>
                                </form>
                                <p class="mt-5 login-form__footer">Sudah punya akun? <a href="<?= base_url('Auth') ?>" class="text-primary">Login </a> disini</p>
                                </p>
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
</body>

</html>