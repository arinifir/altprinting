<!--================Tracking Box Area =================-->
<section class="tracking_box_area section-margin--small">
    <div class="container">
        <?= $this->session->flashdata('failed'); ?>
        <div class="tracking_box_inner">
            <p>Untuk melakukan konfirmasi pembayaran, masukkan nomor pesanan Anda dan tekan tombol "Lanjutkan" untuk upload bukti pembayaran Anda.
                Nomor ini diberikan kepada Anda pada tanda terima dan dalam email konfirmasi yang seharusnya Anda terima.</p>
            <form class="row tracking_form" action="<?= base_url('pelanggan/Konfirmasi/caripesanan'); ?>" method="post">
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Pesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Pesanan'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Penagihan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Penagihan'">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-tracking">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->