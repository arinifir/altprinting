<!--================ Start title area =================-->
<div class="container">
	<div class="section-intro pt-5">
		<h2>Pesanan <span class="section-intro__style">Saya</span></h2>
	</div>
</div>
<!--================End title area =================-->
<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="s_product_text mt-1">
			<div class="row card_area d-flex align-items-center mx-1">
				<a class="icon_btn card_paket mt-1 active" data-kode="1">Belum Bayar</a>
				<a class="icon_btn card_paket mt-1" data-kode="2">Konfirmasi</a>
				<a class="icon_btn card_paket mt-1" data-kode="3">Dikemas</a>
				<a class="icon_btn card_paket mt-1" data-kode="4">Dikirim</a>
				<a class="icon_btn card_paket mt-1" data-kode="5">Selesai</a>
				<a class="icon_btn card_paket mt-1" data-kode="0">Dibatalkan</a>
				<a class="icon_btn card_paket mt-1" data-kode="0">Pengembalian</a>
			</div>
		</div>
		<?php foreach ($order as $order) { ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card_pesanan">
					<h3 class="mb-3">No Pesanan : <span id="dataCopy"><?= $order->no_transaksi; ?></span><sup><span class="kapital" id="copyButton"> Salin</span></sup></h3>
					<hr />
					<div class="media">
						<div class="media-body">
							<div class="row">
								<div class="col-md-4">
									<h6>Penerima:</h6>
									<p><?= $order->nama_pembeli; ?></p>
								</div>
								<div class="col-md-4">
									<h6>Pembayaran:</h6>
									<p><?= $order->jenis_pembayaran == 1 ? 'Transfer Bank' : 'Cash On Delivery' ?></p>
								</div>
								<div class="col-md-4">
									<h6>Total:</h6>
									<p><?= number_format($order->total_bayar, 2, ',', '.'); ?></p>
								</div>
							</div>
							<h6>Alamat Lengkap:</h6>
							<p><?= $order->alamat_pembeli . ', ' . $order->kab_pembeli . ', Provinsi ' . $order->prov_pembeli . ' ' . $order->kpos_pembeli . ' (<strong>No Telp</strong> '.$order->no_pembeli.')'; ?></p>
						</div>
					</div>
					<a href="<?= base_url('pelanggan/Order/notapesanan/' . $order->no_transaksi); ?>" class="tombol tombol_lihat">Lihat</a>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- <div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Nomor Pesanan</th>
							<th scope="col">Nama Penerima</th>
							<th scope="col">Alamat</th>
							<th scope="col">Total</th>
							<th scope="col">Pembayaran</th>
							<th scope="col">Status Pesanan</th>
							<th scope="col">Lihat Pesanan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($order as $order) { ?>
							<tr>
								<td>
									<h5><?= $order->no_transaksi; ?></h5>
								</td>
								<td>
									<h5><?= $order->nama_pembeli; ?></h5>
								</td>
								<td>
									<div class="media">
										<div class="d-flex">
											<img src="img/cart/cart1.png" alt="">
										</div>
										<div class="media-body">
											<p><?= $order->alamat_pembeli . ', Kecamatan ' . $order->kec_pembeli . ', ' . $order->kab_pembeli . ', Provinsi ' . $order->prov_pembeli . ' ' . $order->kpos_pembeli; ?></p>
										</div>
									</div>
								</td>
								<td>
									<h5><?= number_format($order->total_bayar, 2, ',', '.'); ?></h5>
								</td>
								<td>
									<h5><?= $order->jenis_pembayaran == 1 ? 'Transfer Bank' : 'Cash On Delivery' ?></h5>
								</td>
								<td>
									<h5>
										<?php if ($order->status_transaksi == 0) {
											echo '<span class="text-danger">Pesanan Dibatalkan</span>';
										} else if ($order->status_transaksi == 1) {
											echo '<span class="text-danger">Menunggu Pembayaran</span>';
										} else if ($order->status_transaksi == 2) {
											echo '<span class="text-danger">Konfirmasi Pembayaran</span>';
										} else if ($order->status_transaksi == 3) {
											echo '<span class="text-danger">Dikemas</span>';
										} else if ($order->status_transaksi == 4) {
											echo '<span class="text-danger">Sedang Dikirim (No resi : ' . $order->no_resi . ')</span>';
										} else {
											echo '<span class="text-success">Selesai</span>';
										}
										?>
									</h5>
								</td>
								<td>
									<div class="cupon_text d-flex align-items-center">
										<a class="button button-login" href="<?= base_url('pelanggan/Order/notapesanan/' . $order->no_transaksi); ?>">Lihat</a>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div> -->
	</div>
</section>
<!--================End Cart Area =================-->