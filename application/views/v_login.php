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

                            <form class="mt-5 mb-5 login-input" action="<?= base_url('login/auth') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn login-form__btn submit w-100">Masuk</button>
                            </form>
                            <p class="mt-5 login-form__footer">Belum punya akun? <a href="page-register.html" class="text-primary">Daftar</a> sekarang!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>