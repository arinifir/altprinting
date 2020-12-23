<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Lupa Password?</h4>
                        <p>Masukkan Email anda pada form di sebelah kanan, kami akan mengirimkan link untuk mengatur ulang kata sandi anda</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="login_form_inner justify-content-center" action="<?= base_url('Auth/lupaPassword') ?>" method="post">
                    <h3 class="mb-5">Form Lupa Password</h3>
                    <div id="login_error" class="col-md-8 login_form mb-4" role="alert">
                    </div>
                    <div class="row login_form" id="contactForm">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        &nbsp;
                        <div class="col-md-12 form-group">
                            <button class="button button-login w-100 btnlogin">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->