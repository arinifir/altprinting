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
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <form class="row contact_form" action="<?= base_url('pelanggan/Profil')?>">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="nomerhp" name="nomerhp" placeholder="Nomer HP">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <!--================ End form area =================-->
                    <div class="col-lg-4">
                        <div class="order_box">
                            <br>
                            <div class="payment_item active text-center">
                                <h3>Mau ganti profil? Klik tombol dibawah ya</h3>
                            </div>
                            <br>
                            <div class="text-center">
                                <a class="button button-paypal" href="#">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>