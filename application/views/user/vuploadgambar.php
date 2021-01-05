<div class="container py-2 mt-5">
    <h4 class="my-2 mb-3">Upload Gambar</h4>
    <p>1. Upload Gambar diperlukan untuk beberapa kategori seperti Polaroid<br />
        2. Gambar yang ter upload bisa diubah selama belum dikemas.</p>
    <form action="<?= base_url('pelanggan/Order/upload/' . $no); ?>" class="dropzone" id="dropzoneFrom" enctype="multipart/form-data">
    </form>
    <div><a class="text-danger"><i>*Upload gambar sesuai dengan jumlah Pesanan Anda. Jika lebih, kami akan memilih secara acak sesuai Pesanan Anda</i></a></div>
    <div align="center" class="py-2 mt-2">
        <a href="<?= base_url('pelanggan/Order/uploadgambar/' . $no); ?>" type="button" class="button btn-primary" id="submit-all">Upload</a>
        <a href="<?= base_url('pelanggan/Order/orderfinal/' . $no); ?>" type="button" class="button btn-primary" id="submit-all">Lanjutkan</a>
    </div>
    <div class="row py-2">
        <?php foreach ($gambar as $g) { ?>
            <div class="col-md-2">
                <img src="<?= base_url('assets/images/order/' . $no . '/' . $g->foto_upload) ?>" class="img-thumbnail" height="175" width="100%">
                <a href="<?= base_url('pelanggan/Order/removegambar/' . $no. '/' . $g->foto_upload); ?>" type="button" class="btn btn-link remove_image">Hapus</a>
            </div>
        <?php } ?>
    </div>
</div>