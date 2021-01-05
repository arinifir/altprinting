<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="<?= base_url('assets/images/') ?>produk/<?= $produk->gambar_produk; ?>" alt="">
                    </div>
                    <!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div> -->
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text mt-1">
                    <div id="alert_paket">

                    </div>
                    <h3 id="nama_produk"><?= $produk->nama_produk; ?></h3>
                    <h2 id="harga_produk">Rp <?= $produk->harga_produk; ?></h2>
                    <ul class="list">
                        <li><span>Kategori</span> : <?= $produk->kategori; ?></a></li>
                        <li><span>Stok</span> :
                            <?= $produk->status_produk == 1 ? "<a class='text-success'>Tersedia" : "<a class='text-danger'>Tidak Tersedia"; ?></a></li>
                        <li><span>Paket</span> : </a></li>
                    </ul>
                    <div class="row card_area d-flex align-items-center mx-1">
                        <?php
                        $i = 1;
                        foreach ($paket as $p) { ?>
                            <a class="icon_btn card_paket mt-1" data-kode="<?= $p->kd_paket; ?>"><?= $p->nama_paket, ' ', $p->isi_paket; ?></a>
                        <?php
                            $i++;
                        } ?>
                    </div>
                    <div class="product_count">
                        <label for="qty">Jumlah :</label> 
                        <div class="quantity buttons_added">
                            <!-- <input type="button" value="-" class="minus"> -->
                            <form action="<?= base_url('pelanggan/Keranjang/addcart'); ?>" method="post">
                                <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="kode_produk" id="input_kodeproduk" value="<?= $produk->kd_produk; ?>">
                        <input type="hidden" name="kode_paket" id="input_kodepaket" value="">
                        <input type="hidden" name="nama_produk" id="input_namaproduk" value="<?= $produk->nama_produk; ?>">
                        <input type="hidden" name="harga" id="input_harga" value="<?= $produk->harga_produk; ?>">

                        <button type="button" id="tambah_keranjang" class="button primary-btn">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Ulasan</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?= $produk->desk_produk; ?>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="review_list">
                            <div class="review_item">
                                <?php foreach ($ulasan as $u) { ?>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?= base_url('assets/images'); ?>/ulasan.png" width="64" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4><?= $u->nama_ulas; ?></h4>
                                            <?php if ($u->rating_ulas != 0) : ?>
                                                <?php for ($i = 0; $i < $u->rating_ulas; $i++) : ?>
                                                    <i class="fa fa-star"></i>
                                                <?php endfor; ?>
                                            <?php else : ?>
                                                <i class="fa fa-star text-white"></i>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                    <p class="mb-2"><?= $u->isi_ulas; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Tambah Ulasan</h4>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Anda belum memberi rating
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <p>Rating Anda:</p>&nbsp;
                            <!-- <ul class="list">
                                <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </li>
                            </ul> -->
                            <div class="row">
                                <div id="rate" class="col-mb-2 ml-3">
                                    <a type="button" id='bintang' data-kode="1"><i class="fa fa-star rating aktif"></i></a>
                                    <a type="button" id='bintang' data-kode="2"><i class="fa fa-star"></i></a>
                                    <a type="button" id='bintang' data-kode="3"><i class="fa fa-star"></i></a>
                                    <a type="button" id='bintang' data-kode="4"><i class="fa fa-star"></i></a>
                                    <a type="button" id='bintang' data-kode="5"><i class="fa fa-star"></i></a>
                                </div>
                                <!-- <div id="rate" class="col-mb-2 ml-3 rating">
                                    <a type="button" data-kode="2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div>
                                <div id="rate" class="col-mb-3 ml-3 rating">
                                    <a type="button" data-kode="3">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div>
                                <div id="rate" class="col-mb-4 ml-3 rating">
                                    <a type="button" data-kode="4">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div>
                                <div id="rate" class="col-mb-5 ml-3 rating">
                                    <a type="button" data-kode="5">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div> -->
                            </div>
                            <p>Outstanding</p>
                            <form action="<?= base_url('pelanggan/Kategori/addulasan'); ?>" class="form-contact form-review mt-3" method="post">
                                <div class="form-group">
                                    <input class="form-control" name="nama" type="text" placeholder="Nama Anda*" <?php if ($this->session->userdata('nama')) {
                                                                                                                        echo 'value="' . $this->session->userdata('nama') . '"';
                                                                                                                    } ?> required>
                                    <input class="form-control" name="rating" type="hidden" id="input_rating" value="1" required>
                                    <input class="form-control" name="kode" type="hidden" value="<?= $produk->kd_produk; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Email Anda*" <?php if ($this->session->userdata('email')) {
                                                                                                                        echo 'value="' . $this->session->userdata('email') . '"';
                                                                                                                    } ?> required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="isi" id="textarea" cols="30" rows="5" placeholder="Ulasan Anda*" required></textarea>
                                </div>
                                <div class="form-group text-center text-md-right mt-3">
                                    <button type="submit" class="button button--active button-review">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->