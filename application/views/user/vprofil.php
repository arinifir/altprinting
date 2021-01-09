<!--================ Start title area =================-->
<div class="container">
    <div class="section-intro pt-5">
        <h2>Profil <span class="section-intro__style">Pelanggan</span></h2>
    </div>
</div>
<!--================End title area =================-->
<br> <br> <br>
<!--================ Start form area =================-->
<section class="related-product-area section-margin--small mt-0">
    <div class="container">
        <div class="row mt-30">
            <div class="billing_details mx-auto">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form class="row contact_form ml-4" action="<?= base_url('pelanggan/Profil/editprofil'); ?>" method="post">
                            <input type="text" value="<?= $pelanggan->id_user; ?>" class="form-control" name="kode" hidden>
                            <div class="col-md-12 form-group">
                                <label class="ml-1" style="color: #393e46">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="<?= $pelanggan->nama_lengkap ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="ml-1" style="color: #393e46">Nomer Handphone</label>
                                <input type="text" class="form-control" name="nomer" id="nomer" placeholder="Masukkan nomer hp" value="<?= $pelanggan->no_hp ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="ml-1" style="color: #393e46">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan email" value="<?= $pelanggan->email ?>">
                            </div>
                            <div class="col-lg-4 text-center mr-4 ml-auto p-2 bd-highlight">
                                <button class="button button-paypal" type="submit" onclick="simpan()">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!--================ End form area =================-->
                    <!-- Start Button Area -->
                    <!-- <div class="col-lg-4">
                        <div class="order_box">
                            <br>
                            <div class="payment_item active text-center">
                                <h3>Mau ganti password? Klik tombol dibawah ya</h3>
                            </div>
                            <br>
                            <div class="text-center mx-4">
                                <a class="button button-paypal" href="<?= base_url('pelanggan/Profil/resetpassword') ?>">Reset Password</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Button Area -->
                </div>
            </div>
        </div>
    </div>
</section>