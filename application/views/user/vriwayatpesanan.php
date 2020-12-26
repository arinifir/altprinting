<!--================ Start title area =================-->
<div class="container">
	<div class="section-intro pt-5">
		<h2>Riwayat <span class="section-intro__style">Pesanan</span></h2>
	</div>
</div>
<!--================End title area =================-->
<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
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
						<?php foreach($order as $order){ ?>
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
									} else if ($order->status_transaksi == 5) {
										echo '<span class="text-success">Selesai</span>';
									}
									?>
								</h5>
							</td>
							<td>
								<div class="cupon_text d-flex align-items-center">
									<a class="button button-login" href="<?= base_url('pelanggan/Order/notapesanan/'.$order->no_transaksi); ?>">Lihat</a>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->