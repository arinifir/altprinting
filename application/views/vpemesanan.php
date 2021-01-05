<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
	<div class="container">
		<div class="returning_customer">
			<div class="check_title">
				<h2>Punya Voucher? <a id="slidecupon" class="hide" href="#">Klik disini untuk memasukkan kode Anda</a></h2>
				<!-- <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2> -->
			</div>
			<div id="cuponslide">
				<p>Jika Anda memiliki kupon, masukkan dibawah ini</p>
				<!-- <div class="row contact_form"> -->
				<div class="row contact_form" action="#" method="post" novalidate="novalidate">
					<div class="col-md-6 form-group p_star">
						<input type="text" id="input_voucher" class="form-control" value="<?= isset($voucher) ? $voucher['kd_voucher'] : '' ?>" placeholder="Masukkan Kode Voucher" onfocus="this.placeholder=''" onblur="this.placeholder = 'Masukkan Kode Voucher'" id="name" name="kd_voucher">
						<!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
					</div>
					<div class="col-md-6 form-group">
						<a class="<?= isset($voucher) ? 'button_batal' : 'button_cupon' ?> btn_voucher" id="<?= isset($voucher) ? 'batal_voucher1' : 'pakai_voucher' ?>" href="javascript:void(0)"><?= isset($voucher) ? 'Batal' : 'Pakai' ?></a>
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div>

		<!-- <div class="returning_customer mb-3">
			<div class="check_title">
			</div>
			<div id="cuponslide">
				<p class="mb-2">Jika Anda memiliki kupon, masukkan dibawah ini</p>
				<div class="row contact_form">
				<div class="col-md-6 form-group p_star">
					<input type="text" id="input_voucher" class="form-control" value="<?= isset($voucher) ? $voucher['kd_voucher'] : '' ?>" placeholder="Masukkan Kode Voucher" onfocus="this.placeholder=''" onblur="this.placeholder = 'Masukkan Kode Voucher'" id="name" name="name">
					<span class="placeholder" data-placeholder="Username or Email"></span>
				</div>
				<div class="col-md-6 form-group">
					<a class="button button_coupon" id="tambah_voucher" href="javascript:void(0)">Pakai</a>
				</div>
				</div>
			</div>
		</div> -->
		<div class="billing_details mt-3">
			<div id="alert_voucher">
				<?php if(isset($voucher)) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					Voucher Berhasil Dipakai
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<h3>Detail Pembeli</h3>
					<form class="row contact_form" action="#" method="post" novalidate="novalidate">
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="first" name="inputnama" placeholder="Nama Lengkap*" <?php if ($kondisi == 1) {
																																echo 'value="' . $alamat->nama_penerima . '"';
																															} else if ($kondisi == 2) {
																																echo 'value="' . $user->nama_lengkap . '"';
																															} else {
																																"";
																															}
																															?>>
							<span class="placeholder" data-placeholder="First name"></span>
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="last" name="inputnomor" placeholder="No HP / Whatsapp*" <?php if ($kondisi == 1) {
																																	echo 'value="' . $alamat->nohp . '"';
																																} else if ($kondisi == 2) {
																																	echo 'value="' . $user->no_hp . '"';
																																} else {
																																	"";
																																}
																																?>>
							<span class="placeholder" data-placeholder="Last name"></span>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="company" name="inputemail" placeholder="Email*" <?php if ($kondisi == 1) {
																															echo 'value="' . $user->email . '"';
																														} else if ($kondisi == 2) {
																															echo 'value="' . $user->email . '"';
																														} else {
																															"";
																														}
																														?>>
						</div>
						<div class="col-md-12 form-group">
							<textarea class="form-control" name="message" id="message" rows="1" placeholder="Catatan Pembeli"></textarea>
						</div>
						<div class="col-md-12 form-group mb-0">
							<div class="creat_account">
								<h3 class="mb-1">Detail Alamat</h3>
							</div>
							<div class="row">
								<div class="payment_item col-md-6">
									<div id="transfer1" class="radion_btn hide">
										<input type="radio" id="f-option5" data-radio="transfer" name="selector">
										<label for="f-option5">Transfer Bank</label>
										<div class="check"></div>
									</div>
								</div>
								<?php if ($this->session->userdata('id_user')) : ?>
									<div class="payment_item col-md-6">
										<div id="transfer2" class="radion_btn hide">
											<input type="radio" id="f-option6" data-radio="cod" name="selector">
											<label for="f-option6">Cash On Delivery </label>
											<img src="img/product/card.jpg" alt="">
											<div class="check"></div>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div id="transfer" class="row hide">
								<div class="col-md-6 form-group p_star">
									<select class="country_select" id="select_provinsi" name="inputprov">
										<?php if($kondisi == 1): ?>
											<option value="<?= $alamat->provinsi_id; ?>" selected><?= $alamat->provinsi; ?></option>
											<?php foreach($provinsi as $prov) : ?>
												<option value="<?= $prov->province_id; ?>"><?= $prov->province; ?></option>
											<?php endforeach ?>
										<?php else: ?>
										<option disabled selected>Silahkan Pilih Provinsi</option>
											<?php foreach($provinsi as $prov): ?>
												<option value="<?= $prov->province_id; ?>"><?= $prov->province; ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="col-md-6 form-group p_star">
									<select name="inputkab" class="country_select" id="select_kabkota">
									<?php if($kondisi == 1): ?>
										<option value="<?= $alamat->kota_id ?>" selected><?= $alamat->kota_kab ?></option>
									<?php else: ?>
										<option selected disabled>Silahkan Pilih Kabupaten/Kota</option>
									<?php endif ?>
									</select>
								</div>
								<div class="col-md-12 form-group">
									<textarea class="form-control" name="inputalamat" id="message" rows="1" placeholder="Alamat Lengkap*"><?= $kondisi == 1 ?  $alamat->alamat : '' ?></textarea>
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="add1" name="inputkdpos" placeholder="Kode Pos*" <?= $kondisi == 1 ? 'value="' . $alamat->kodepos . '"' : '' ?>>
									<span class="placeholder" data-placeholder="Address line 01"></span>
								</div>
							</div>
							<div id="cod" class="row hide">
								<p class="ml-3 text-danger">Silahkan pilih tempat pertemuan untuk COD, untuk lebih detailnya tambahkan di catatan pembeli.</p>
								<div class="col-md-12 form-group p_star">
									<select name="inputcod" class="country_select">
										<option selected disabled>Pilih Daerah COD</option>
										<option value="Daerah Jl Kalimantan">Daerah Jl Kalimantan</option>
										<option value="Daerah Jl Mastrip">Daerah Jl Mastrip</option>
										<option value="Daerah Jl Riau">Daerah Jl Riau</option>
										<option value="Daerah Jl Jawa">Daerah Jl Jawa</option>
										<option value="Daerah Secaba">Daerah Secaba</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" class="form-control" id="input_bayar" name="inputbayar" value="">
					</form>
				</div>
				<div class="col-lg-4">
					<div class="order_box">
						<h2>Pesanan Anda</h2>
						<ul class="list mb-3">
							<li><a href="#">
									<h4>Produk <span>Subtotal</span></h4>
								</a></li>
							<?php $no = 1;
							foreach ($this->cart->contents() as $p) { ?>
								<li><a href="#"><?= $p['name']; ?> <span class="middle">x <?= $p['qty']; ?></span> <span class="last"><?= "Rp " . number_format($p['subtotal'], 0, ',', '.') ?></span></a></li>
							<?php } ?>
						</ul>
						<ul class="list list_2">
							<li><a href="#">Subtotal <span><?= "Rp " . number_format($this->cart->total(), 0, ',', '.') ?></span></a></li>
							<input type="hidden" id="subtotal" value="<?= $this->cart->total(); ?>">
							<li id="ongkir_info"><a href="#" id="tampilan_ongkir"></a></li>
							<?php if (isset($voucher)) : ?>
								<?php if ($voucher['jenis_voucher'] == 1) : ?>
									<li id="ongkos_voucher"><a href="#">Potongan Ongkir <span id="potongan_ongkir">-Rp <?= number_format($voucher['potongan_voucher'], 0, '.', '.') ?></span></a></li>
								<?php else : ?>
									<?php $potongan = $this->cart->total() * $voucher['potongan_voucher'] / 100;  ?>
									<li id="harga_voucher"><a href="#">Potongan Harga <span id="potongan_harga">-Rp <?= number_format($potongan, 0, '.', '.') ?></span></a></li>
								<?php endif; ?>
							<?php endif; ?>
							<li><a href="#">Total <span id="total_harga"></span></a></li>
						</ul>
						<div id="transfercard" class="payment_item hide">
							<p>Pembayaran Via Transfer Bank BNI. Setelah Anda melakukan pemesanan, Anda akan menerima email nota pemesanan Anda dan Nomor Rekening Pembayaran.</p>
						</div>
						<div id="codcard" class="payment_item active hide">
							<p>Silahkan memilih tempat COD terlebih dahulu.</p>
						</div>
						<div class="text-center">
							<form action="" method="post"></form>
							<input type="hidden" name="subtotal" id="subtotal" value="<?= $this->cart->total(); ?>">
							<input type="hidden" name="biaya_ongkir" id="biaya_ongkir">
							<input type="hidden" name="potongan_voucher" id="potongan_voucher" value="<?= isset($voucher) ? $voucher['potongan_voucher'] : '' ?>">
							<input type="hidden" name="jenis_voucher" id="jenis_voucher" value="<?= isset($voucher) ? $voucher['jenis_voucher'] : '0' ?>">
							<input type="hidden" name="total" id="total">
							<input type="hidden" name="jenis_pembayaran" id="jenis_pembayaran">
							<a class="button button-paypal" href="<?= base_url('pelanggan/Order/inputpesanan'); ?>">Pembayaran</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Checkout Area =================-->