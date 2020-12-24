<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
	<div class="container">
		<p class="text-center billing-alert">Thank you. Your order has been received.</p>
		<div class="row mb-5">
			<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
				<div class="confirmation-card">
					<h3 class="billing-title">Info Pesanan</h3>
					<table class="order-rable">
						<tr>
							<td>Nomor Pesanan</td>
							<td>: <?= $order->no_transaksi; ?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:
								<?php
								$date = date_create($order->tanggal_transaksi);
								echo date_format($date, 'd M Y'); ?></td>
						</tr>
						<tr>
							<td>Jam</td>
							<td>:
								<?= date_format($date, 'H:i'); ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>: <?= "Rp " . number_format($order->total_bayar, 0, ',', '.'); ?></td>
						</tr>
						<tr>
							<td>Pembayaran Via</td>
							<td>: <?= $order->jenis_pembayaran == 1 ? 'Transfer Bank' : 'Cash On Delivery' ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
				<div class="confirmation-card">
					<h3 class="billing-title">Info Pelanggan</h3>
					<table class="order-rable">
						<tr>
							<td>Nama</td>
							<td>: <?= $order->nama_pembeli; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: <?= $order->email_pembeli; ?></td>
						</tr>
						<tr>
							<td>Nomor Telepon</td>
							<td>: <?= $order->no_pembeli; ?></td>
						</tr>
						<tr>
							<td>Catatan</td>
							<td>: <?= $order->desk_transaksi; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
				<div class="confirmation-card">
					<h3 class="billing-title">Alamat Pengiriman</h3>
					<table class="order-rable">
						<?php if ($order->jenis_pembayaran == 1) { ?>
							<tr>
								<td>Alamat</td>
								<td>: <?= $order->alamat_pembeli; ?></td>
							</tr>
							<tr>
								<td>Kecamatan</td>
								<td>: <?= $order->kec_pembeli; ?></td>
							</tr>
							<tr>
								<td>Kota/Kabupaten</td>
								<td>: <?= $order->kab_pembeli; ?></td>
							</tr>
							<tr>
								<td>Provinsi</td>
								<td>: <?= $order->prov_pembeli; ?></td>
							</tr>
							<tr>
								<td>Kode Pos</td>
								<td>: <?= $order->kpos_pembeli; ?></td>
							</tr>
						<?php } else { ?>
							<tr>
								<td>Tempat COD</td>
								<td>: <?= $order->detail_cod; ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="order_details_table">
			<h2>Detail Pesanan</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Produk</th>
							<th scope="col">Harga</th>
							<th scope="col">Jumlah</th>
							<th scope="col" style="text-align:right;">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$subtotal = 0;
						foreach ($detail as $d) { ?>
							<tr>
								<td>
									<p><?= $d->produk_paket; ?></p>
								</td>
								<td>
									<p><?= "Rp " . number_format($d->harga_produk_paket, 0, ',', '.') ?></p>
								</td>
								<td>
									<h5>x <?= $d->jumlah_produk; ?></h5>
								</td>
								<td align="right">
									<p><?= "Rp " . number_format($d->subtotal, 0, ',', '.'); ?></p>
								</td>
							</tr>
						<?php
							$subtotal += $d->subtotal;
						} ?>
						<tr>
							<td>
								<h4>Subtotal</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<h5></h5>
							</td>
							<td align="right">
								<p><?= "Rp " . number_format($subtotal, 0, ',', '.'); ?></p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Biaya Ongkir</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<h5></h5>
							</td>
							<td align="right">
								<p><?= "Rp " . number_format($order->biaya_ongkir, 0, ',', '.'); ?></p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Voucher</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<h5></h5>
							</td>
							<td align="right">
								<p class="text-danger"><i><?= "- Rp " . number_format($order->pot_voucher, 0, ',', '.'); ?></i></p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Total</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<h5></h5>
							</td>
							<td align="right">
								<h4><?= "Rp " . number_format($order->total_bayar, 2, ',', '.'); ?></h4>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>&nbsp;
		<?php if ($order->jenis_pembayaran == 1) { ?>
			<div class="col-md-12 form-group">
				<a type="button" href="<?= base_url('pelanggan/Konfirmasi/upload/'.$order->no_transaksi); ?>" class="button button-tracking float-right">Lanjutkan</a>
			</div>
		<?php } ?>
	</div>
</section>
<!--================End Order Details Area =================-->