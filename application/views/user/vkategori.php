<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Kategori</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul>
                                    <?php foreach ($kategori as $ktg) : ?>
                                        <li class="filter-list " onclick="filter('<?= $ktg->kd_kategori ?>')"><input class="pixel-radio" type="radio" id="men" name="brand" <?= $this->input->get('ktg') == $ktg->kd_kategori ? 'checked="checked"' : '' ?>><label for="men"><?= $ktg->kategori ?><span> (3600)</span></label></li>
                                    <?php endforeach; ?>
                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>Rp </span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>Rp </span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                        <div class="text-center col-md-12 mt-1"><button id="btn_harga" class="btn btn-primary button_merah btn-block" href="">Terapkan</button></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">

                    <div class="row">
                        <?php 
                        if ($produk) {
                        foreach ($produk as $prd) : ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="<?= base_url() . "/assets/images/produk/" . $prd->gambar_produk ?>" alt="">
                                        <ul class="card-product__imgOverlay">
                                            <li><button><i class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                    <?php $kategori = $this->db->get_where('tb_kategori',['kd_kategori' => $prd->kategori_produk])->row(); ?>
                                        <p><?= $kategori->kategori ?></p>
                                        <h4 class="card-product__title"><a href="#"><?= $prd->nama_produk ?></a></h4>
                                        <p class="card-product__price">Rp. <?= $prd->harga_produk ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    } else {
                        echo '<div class="alert alert-danger col-md-11 mx-auto text-center" role="alert">
                        HABES
                        </div>';
                    }
                        ?>
                    </div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>

</section>
<!-- ================ category section end ================= -->