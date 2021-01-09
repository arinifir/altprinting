<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Tambahkan Alamat Saya</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('error');; ?>
                        <form action="<?= base_url('pelanggan/Alamat/addalamat'); ?>" class="form-contact form-review mt-3" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input class="form-control" name="nama" type="text" placeholder="Nama Penerima*">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input class="form-control" name="nomor" type="text" placeholder="Nomor Telefon yang Aktif*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group p_star">
                                    <select class="form-control different-control w-100" id="select_provinsi" name="inputprov">
                                        <option disabled selected>Silahkan Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $prov) : ?>
                                            <option value="<?= $prov->province_id; ?>"><?= $prov->province; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="hidden" name="input_provinsi" id="input_provinsi">
                                </div>
                                <div class="col-md-6 form-group">
                                    <select name="inputkab" class="form-control different-control w-100" id="select_kabkota">
                                        <option selected disabled>Silahkan Pilih Kabupaten/Kota</option>
                                    </select>
                                    <input type="hidden" name="input_kabkota" id="input_kabkota">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="alamatlengkap" id="textarea" cols="30" rows="5" placeholder="Tambahkan Detail Alamat Anda*"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="kdpos" type="text" placeholder="Kode Pos*">
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
</section>