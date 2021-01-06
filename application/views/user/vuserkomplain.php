<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Komplain Pesanan</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="review_box">
                            <h4>Pengajuan</h4>
                            <form action="<?= base_url('pelanggan/Order/ajukankomplain'); ?>" class="form-contact form-review mt-3" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input class="form-control" name="nomor" type="text" readonly placeholder="Nomor Pesanan Anda*" value="<?= $transaksi->no_transaksi; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="gambar" type="file" placeholder="Upload Gambar*">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="nowa" type="text" placeholder="Isi No WhatsApp agar kami dapat menghubungi Anda*" value="<?= $transaksi->no_pembeli; ?>" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="isi" id="textarea" cols="30" rows="5" placeholder="Permasalahan*" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="solusi" id="textarea" cols="30" rows="5" placeholder="Solusi yang Anda inginkan*" required></textarea>
                                </div>
                                <div class="form-group text-center text-md-right mt-3">
                                    <button type="submit" class="button button--active button-review">Ajukan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>