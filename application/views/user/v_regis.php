<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Sudah Punya Akun?</h4>
                        <p>Silahkan Login dengan akun anda. Tekan Tombol di bawah ini untuk masuk ke halaman Login</p>
                        <a class="button button-account" href="<?= base_url('Auth'); ?>">Login Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3>Create an account</h3>
                    <?= $this->session->flashdata('message'); ?>
                    <form class="row login_form" method="post" action="<?= base_url('Auth/register'); ?>">
                        <div class="col-md-12 form-group">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Nomer HP">
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="show-password"><i class="ti-eye"></i>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-register w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->