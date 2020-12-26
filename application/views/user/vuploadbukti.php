<!--================Tracking Box Area =================-->
<section class="tracking_box_area section-margin--small">
    <div class="container">
        <div class="tracking_box_inner">
            <p>1. Lakukan konfirmasi pembayaran upload bukti pembayaran Anda untuk membayar pesanan Anda.<br/>
                2. Bukti yang sudah di upload akan dilakukan pengecekan kebenarannya.<br/>
                3. Jika pembayaran benar, maka akan ada pemberitahuan pembayaran selesai di Email Anda.</p>
            <form action="<?= base_url('pelanggan/Konfirmasi/uploadfile'); ?>" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Upload File<span class="text-danger">*</span>
                                    <span class="text-danger">(mohon untuk upload file dalam format file image)</span>
                                </label>
                                <div class="preview-zone hidden">
                                    <div class="kotak kotak-solid">
                                        <div class="kotak-header with-border">
                                            <h4><b>Preview</b></h4>
                                            <div class="kotak-tools pull-right">
                                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kotak-body"></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="text" name="nomor" hidden value="<?= $nomor; ?>">
                                    <input type="file" name="gambar" accept="image/*" class="dropzone">
                                </div>
                                <div><a class="text-danger"><i>*Anda tidak dapat mengganti file bukti pembayaran yang sudah terupload. Jadi, pastikan file yang Anda pilih benar.</i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="button">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->