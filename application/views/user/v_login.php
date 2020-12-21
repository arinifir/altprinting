<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Belum Punya Akun?</h4>
                        <p>Dapatkan berbagai keuntungan dengan membuat Akun Anda sendiri.</p>
                        <a class="button button-account" href="<?= base_url('Auth/register') ?>">Buat Akun</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner justify-content-center">
                    <h3 class="mb-5">Log in untuk Masuk</h3>
                    <div id="login_error" class="col-md-8 login_form mb-4" role="alert">
                    </div>
                    <div class="row login_form" id="contactForm">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control password" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        &nbsp;
                        <div class="col-md-12 form-group">
                            <button class="button button-login w-100 btnlogin">Log In</button>
                            <a href="<?= base_url('Auth/lupapassword') ?>">Lupa Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->