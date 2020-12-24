<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Ganti Password</h4>
                        <p>Masukkan password baru anda pada form di sebelah kanan. Pastikan password baru anda kuat dan mudah diingat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="login_form_inner justify-content-center" action="<?= base_url('Auth/gantiPassword') ?>" method="post">
                    <h3 class="mb-5">Silahkan Atur Ulang Password Anda</h3>
                    <div id="login_error" class="col-md-8 login_form mb-4" role="alert">
                    </div>
                    <div class="row login_form" id="contactForm">
                        <div class="col-md-12 form-group">
                            <input type="password" name="password1" class="form-control password" placeholder="Masukkan Password Baru" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" name="password2" class="form-control password" placeholder="Masukkan Kembali Password" required>
                        </div>
                        &nbsp;
                        <div class="col-md-12 form-group">
                            <button class="button button-login w-100 btnlogin">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->