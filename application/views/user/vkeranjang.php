<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="row cart_inner">
			<div class="table-responsive col-lg-8">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Produk</th>
							<th scope="col">Harga</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Subtotal</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody id="cart_content">
						<?php $no = 1;
						foreach ($this->cart->contents() as $p) { ?>
							<tr>
								<td>
									<div class="media">
										<div class="media-body">
											<p><?= $p['name']; ?></p>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp <?= $p['price']; ?></h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" step="1" min="1" name="quantity" id="input_qty" data-rowid="<?= $p['rowid']; ?>" title="Qty" class="input-text qty text" value="<?= $p['qty']; ?>">
									</div>
								</td>
								<td>
									<h5><?= "Rp " . number_format($p['subtotal'], 0, ',', '.') ?></h5>
								</td>
								<td>
									<a href="<?= base_url('pelanggan/Keranjang/delcart/' . $p['rowid']) ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link text-danger" data-original-title="Hapus">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-4">
				<div class="mb-3">
					<div class="cupon_text"> 
						<form action="<?= base_url('pelanggan/Checkout'); ?>" method="get">
							<input type="text" id="input_voucher" placeholder="Kode Voucher" value="">
							<a class="primary-btn btn_voucher" id="tambah_voucher" href="javascript:void(0)">Pakai</a>
					</div>
				</div>
				<div id="alert_voucher">

				</div>
				<div class="order_box">
					<h2>Total Keranjang</h2>
					<ul class="list list_2 mb-3">
						<li><a href="#">Subtotal <span><?= "Rp " . number_format($this->cart->total(), 0, '.', '.') ?></span></a></li>
						<li id="display_voucher"></li>
					</ul>
					<div class="text-center">
						<button type="submit" class="button button-paypal">Lanjutkan ke Checkout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->