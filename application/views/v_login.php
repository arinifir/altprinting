<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center">
                                <h4>Selamat Datang di ALT Printing</h4>
                            </a>

                            <?php if ($this->session->flashdata('logsalah')) : ?>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Email atau Password <strong>salah !</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <form class="mt-5 mb-5 login-input" action="<?= base_url('login/auth') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn login-form__btn submit w-100">Masuk</button>
                            </form>
                            <p class="mt-5 login-form__footer">Belum punya akun? <a href="<?= base_url('API/regis') ?>" class="text-primary">Daftar</a> sekarang!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>