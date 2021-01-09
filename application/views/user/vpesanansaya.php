<!--================ Start title area =================-->
<div class="container">
	<div class="section-intro pt-5">
		<h2>Pesanan <span class="section-intro__style">Saya</span></h2>
	</div>
</div>
<!--================End title area =================-->
<!--================Cart Area =================-->
<section class="cart_area mt-1">
	<div class="container">
		<div class="s_product_text mt-1">
			<div class="row card_area d-flex align-items-center mx-1">
				<form action="#">
					<?php
					$status = [
						'Belum Bayar',
						'Konfirmasi',
						'Dikemas',
						'Dikirim',
						'Selesai',
						'Dibatalkan'
					];
					foreach ($status as $key => $value) { ?>
						<a href="<?= base_url('Pelanggan/Profil/pesanansaya') . '?sts=' . ($key + 1) ?>" class="tombol_status mt-1 <?= $this->input->get('sts') != $key + 1 ? '' : 'active' ?>"><?= $value ?></a>
					<?php } ?>
				</form>
			</div>
		</div>
		<?php
		if ($order) {
			foreach ($order as $order) { ?>
				<div class="row mt-2">
					<div class="col-lg-12">
						<div class="card_pesanan">
							<div class="row mb-3">
								<h3 class="col-md-6">No Pesanan : <span id="dataCopy"><?= $order->no_transaksi; ?></span><sup><span class="kapital" id="copyButton"> Salin</span></sup></h3>
								<?php if ($order->status_transaksi == 4 || $order->status_transaksi == 5) { ?>
									<h3 class="col-md-6" align="right">No Resi : <span id="dataCopy2"><?= $order->no_resi; ?></span><sup><span class="kapital" id="copyButton2"> Salin</span></sup></h3>
								<?php } ?>
							</div>
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
											<p>Rp <?= number_format($order->total_bayar, 2, ',', '.'); ?></p>
										</div>
									</div>
									<h6>Alamat Lengkap:</h6>
									<?php if ($order->jenis_pembayaran == 1) { ?>
										<p><?= $order->alamat_pembeli . ', ' . $order->kab_pembeli . ', Provinsi ' . $order->prov_pembeli . ' ' . $order->kpos_pembeli . ' (<strong>No Telp</strong> ' . $order->no_pembeli . ')'; ?></p>
									<?php } else { ?>
										<p><?= $order->detail_cod .' (<strong>No Telp</strong> ' . $order->no_pembeli . ')'; ?></p>
									<?php } ?>
								</div>
							</div>
							<?php if ($order->status_transaksi == 1 && $order->jenis_pembayaran == 1) { ?>
								<a href="<?= base_url('pelanggan/Konfirmasi/upload/' . $order->no_transaksi); ?>" class="tombol tombol_lihat">Upload Bukti</a>
							<?php } ?>
							<a href="<?= base_url('pelanggan/Order/notapesanan/' . $order->no_transaksi); ?>" class="tombol tombol_lihat">Rincian</a>
							<?php if ($order->status_transaksi == 1 || $order->status_transaksi == 2) { ?>
								<a href="<?= base_url('pelanggan/Order/uploadgambar/' . $order->no_transaksi); ?>" class="tombol tombol_lihat">Gambar</a>
							<?php } ?>
							<?php if ($order->status_transaksi == 5 || $order->status_transaksi == 6) { ?>
								<a href="<?= base_url('pelanggan/Order/userkomplain/' . $order->no_transaksi); ?>" class="tombol tombol_lihat">Komplain</a>
							<?php } ?>
							<?php if ($order->status_transaksi == 4) { ?>
								<a href="javascript:void(0)" onclick="orderselesai(<?= $order->no_transaksi ?>)" class="tombol tombol_lihat">Selesai</a>
							<?php } ?>

						</div>
					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
			<div class="mt-2">
				<div class="col-lg-12">
					<div class="card_pesanan">
						<h3 align="center">Tidak Ada Pesanan</h3>
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