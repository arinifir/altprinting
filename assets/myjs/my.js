const base_url = "http://localhost/altprinting/";
$(".btnlogin").on("click", function () {
	const email = $(".email").val();
	const password = $(".password").val();
	$.ajax({
		method: "post",
		url: base_url + "API/login",
		data: {
			email: email,
			password: password,
		},
		dataType: "json",
		success: function (response) {
			const status = response.status;
			const role = response.role;
			if (status == "success") {
				if (role == "super admin") {
					window.location.href = base_url + "Sadmin";
				} else if (role == "admin") {
					window.location.href = base_url + "admin/Admin";
				} else if (role == "pelanggan") {
					window.location.href = base_url + "User";
				}
			} else if (status == "wrong_password") {
				$("#login_error").addClass("alert alert-danger");
				$("#login_error").html("Password Salah!");
			} else if (status == "not_active") {
				$("#login_error").addClass("alert alert-danger");
				$("#login_error").html("Akun Anda Belum Terverifikasi!");
			} else if (status == "empty") {
				$("#login_error").addClass("alert alert-danger");
				$("#login_error").html("Akun Tidak Terdaftar!");
			}
			if (email == "" || password == "") {
				$("#login_error").addClass("alert alert-danger");
				$("#login_error").html("Silahkan Isi Data Login!");
			}
		},
	});
});
$(document).on("click", ".btnDel", function () {
	const id = $(this).data("id");
	console.log(id);
	$.ajax({
		url: base_url + "Sadmin/deleteproduk/" + id,
		dataType: "text",
		success: function (response) {
			if (response == "berhasil") {
				window.location.href = base_url + "Sadmin/delproduk/" + id;
			} else {
				Swal.fire({
					title: "Apakah Anda Yakin?",
					text:
						"Jika Anda menghapus data ini, Data Paket dan Ulasan produk juga akan dihapus permanen!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes, delete it!",
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = base_url + "Sadmin/delbyproduk/" + id;
					}
				});
			}
		},
	});
});

$(document).on("click", "#myImg", function () {
	var dataid = $(this).data("id");
	var selector = "#myGambar" + dataid;
	var modalImg = $("#img" + dataid);
	var modal = $(selector);
	modal.css("display", "block");
	modalImg.attr("src", this.src);
	$(document).on("click", ".popup .tutup", () => {
		modal.css("display", "none");
	});
});

$(document).on('click', '#btn_harga', function(){
    let min = $('#lower-value').html();
    let max = $('#upper-value').html();
    console.log(min,max);
    var url = window.location.href;
    var check = url.includes('?filter=true');
    var check2 = url.includes('?filter=true&min=');
    if(check == true && check2 == false){
        var url1 = `&min=${min}&max=${max}`;
    } else if(check2 == true) {
        var url1 = `?filter=true&min=${min}&max=${max}`;
        var url = url.split("?",1);
    } 
    var url2 = url.concat(url1);
    console.log(url,url1);
    console.log('hasilnya',url2);
    // window.location.href = url2;
    // window.location.href = url
})

function readFile(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
    var htmlPreview = 
    '<img width="200" src="' + e.target.result + '" />'+
    '<center><p>' + input.files[0].name + '</p></center>';
    var wrapperZone = $(input).parent();
    var previewZone = $(input).parent().parent().find('.preview-zone');
    var boxZone = $(input).parent().parent().find('.preview-zone').find('.kotak').find('.kotak-body');
    
    wrapperZone.removeClass('dragover');
    previewZone.removeClass('hidden');
    boxZone.empty();
    boxZone.append(htmlPreview);
    };
    
    reader.readAsDataURL(input.files[0]);
    }
}

function copy(copyId) {
	var $inp=$("<input>");
	$("body").append($inp);
	$inp.val($(""+copyId).text()).select();
	document.execCommand("copy");
	$inp.remove();
	$(".alert").fadeIn(500, function() {
		$(".alert").fadeOut();
	}); 
}
$(document).ready(function(){
	$("#copyButton").click(function() {
		copy("#dataCopy");
	});
});

function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
}
$(".dropzone").change(function(){
    readFile(this);
});
$('.dropzone-wrapper').on('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
});
$('.dropzone-wrapper').on('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
});
$('.remove-preview').on('click', function() {
    var boxZone = $(this).parents('.preview-zone').find('.kotak-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
});

function filter(kategori){
    console.log('kepencet')
    window.location.href = base_url+`pelanggan/kategori?filter=true&ktg=${kategori}`;
}

$(document).ready(function(){
	$("#cuponslide").hide();
	$("#transfer").hide();
	$("#transfercard").hide();
	$("#cod").hide();
	$("#codcard").hide();
})

$(document).on('click', '#slidecupon', function(){
	var tampil = $(this).attr('class');
	if (tampil == 'hide') {
		$("#cuponslide").slideDown();
		$("#slidecupon").removeClass("hide");
		$("#slidecupon").addClass("show");
	} else {
		$("#cuponslide").slideUp();
		$("#slidecupon").removeClass("show");
		$("#slidecupon").addClass("hide");
	}
})

$(document).on('change', 'input[name="selector"]', function(){
	var radio = $(this).data('radio');
	console.log(radio);
	if(radio == 'transfer'){
		$("#transfer").slideDown(); 
		$("#transfercard").show();
		$('#cod').slideUp();
		$('#codcard').hide();
		$('#input_bayar').val('1');
		$('#jenis_pembayaran').val('1');
		var provinsi = $('#select_provinsi').children("option:selected").html();
		$('#input_provinsi').val(provinsi);
		var kabkota = $('#select_kabkota').children("option:selected").html();
		$('#input_kabkota').val(kabkota);
	} else if(radio == 'cod') {
		$('#cod').slideDown();
		$('#codcard').show();
		$("#transfer").slideUp();
		$("#transfercard").hide();
		$('#input_bayar').val('2');
		$('#jenis_pembayaran').val('2');
		$('#biaya_ongkir').val('0');
		hitungTotal();
	}
})

$(document).on('change', '#provinsi', function(){
	$('#kabupaten').attr('disabled',true);
	$('#kabupaten').html('<option selected>Pilih Kabupaten</option>');
	var id_provinsi = $(this).val();
	$.ajax({
		method: "GET",
		url: base_url + `API/getKabKota/${id_provinsi}`,
		dataType: "JSON",
		success: function (response) {
			$('#kabupaten').removeAttr('disabled');
			var kabkota = response.data;
			$.each(kabkota, function(i,value) {
				$('#kabupaten').append(`<option value="${value.id}">${value.name}</option>`);
				$('#kabupaten').niceSelect('update');
			})
		}
	})
})

$(document).on('change', '#kabupaten', function(){
	$('#kecamatan').attr('disabled',true);
	$('#kecamatan').html('<option selected>Pilih Kecamatan</option>');
	var id_kabkota = $(this).val();
	$.ajax({
		method: "GET",
		url: base_url + `API/getKecamatan/${id_kabkota}`,
		dataType: "JSON",
		success: function (response) {
			$('#kecamatan').removeAttr('disabled');
			var kabkota = response.data;
			$.each(kabkota, function(i,value) {
				$('#kecamatan').append(`<option value="${value.id}">${value.name}</option>`);
				$('#kecamatan').niceSelect('update');
			})
		}
	})
})

$(document).on('click', '#tambah_voucher', function(){
	var kode_voucher = $('#input_voucher').val();
	console.log(kode_voucher);
	$.ajax({
		method: 'GET',
		url: base_url + `API/checkVoucher/${kode_voucher}`,
		dataType: "JSON",
		success: function (response) {
			var status = response.message;
			if (status == 1) { 
				// var kode_voucher = response.data.kd_voucher;
				$('#alert_voucher').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
					Voucher Berhasil Dipakai
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>`)
				$('#input_voucher').attr('name', 'kd_voucher');
				$('#display_voucher').html(`<a href="#">Kode Voucher <span>${response.data.kd_voucher}</span></a>`);
				$('.btn_voucher').removeClass('primary-btn');
				$('.btn_voucher').addClass('secondary-btn');
				$('.btn_voucher').html('Batal');
				$('.btn_voucher').attr('id', 'batal_voucher');
			} else {
				$('#alert_voucher').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Voucher Tidak Berlaku
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>`)
				$('#display_voucher').html('');
				$('#input_voucher').val('');
			}
		}
	});
})

$(document).on('click', '#pakai_voucher', function(){
	var kode_voucher = $('#input_voucher').val();
	var subtotal = parseInt($('#subtotal').val());
	$.ajax({
		method: "GET",
		url: base_url + `API/checkVoucher/${kode_voucher}`,
		dataType: "JSON",
		success: function (response) {
			var status = response.message;
			if (status == 1) {
				var potongan = response.data.potongan_voucher;
				$('#alert_voucher').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
					Voucher Berhasil Dipakai
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>`)
				if(response.data.jenis_voucher == 1){
					$('#ongkir_info').after(`<li id="ongkos_voucher"><a href="#">Potongan Harga <span id="potongan_ongkir">-Rp ${potongan}</span></a></li>`);
					$('.btn_voucher').removeClass('button_cupon');
					$('.btn_voucher').addClass('button_batal');
					$('.btn_voucher').html('Batal');
					$('.btn_voucher').attr('id', 'batal_voucher1');
					$('#potongan_voucher').val(potongan);
					$('#jenis_voucher').val(response.data.jenis_voucher);
				} else {
					var total_potongan = subtotal * potongan / 100;
					$('#ongkir_info').after(`<li id="harga_voucher"><a href="#">Diskon <span id="potongan_ongkir">-Rp ${total_potongan}</span></a></li>`);
					$('.btn_voucher').removeClass('button_cupon');
					$('.btn_voucher').addClass('button_batal');
					$('.btn_voucher').html('Batal');
					$('.btn_voucher').attr('id', 'batal_voucher1');
					$('#potongan_voucher').val(total_potongan);
					$('#jenis_voucher').val(response.data.jenis_voucher);
				}
				hitungTotal();
			} else {
				$('#alert_voucher').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Voucher Tidak Berlaku
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>`)
			}
		}
	});
})


$(document).on('click', '#batal_voucher', function(){
	$('#input_voucher').removeAttr('name');
	$('#input_voucher').val('');
	$('.btn_voucher').removeClass('secondary-btn');
	$('.btn_voucher').addClass('primary-btn');
	$('.btn_voucher').html('Pakai');
	$('.btn_voucher').attr('id', 'tambah_voucher');
	$('#display_voucher').html('');
	$('.alert').hide();
})

$(document).on('click', '#batal_voucher1', function(){
	$('.btn_voucher').removeClass('button_batal');
	$('.btn_voucher').addClass('button_cupon');
	$('.btn_voucher').html('Pakai');
	$('.btn_voucher').attr('id', 'pakai_voucher');
	$('#harga_voucher').remove();
	$('#ongkos_voucher').remove();
	$('.alert').hide();
	$('#potongan_voucher').val('0');
	$('#jenis_voucher').val('0');
	hitungTotal();
})

$(document).on('change', '#select_provinsi', function(){
	var id_provinsi = $(this).val();
	$('#select_kabkota').html('<option selected disabled>Silahkan Pilih Kabupaten/Kota</option>');
	$('#select_kabkota').attr('disabled', true);
	$('#select_kabkota').niceSelect('update')
	var provinsi = $(this).children("option:selected").html();
	$('#input_provinsi').val(provinsi);
	$.ajax({
		method: "GET",
		url: base_url + `API/getKabKota/${id_provinsi}`,
		dataType: "JSON",
		success: function (response) {
			var kab_kota = response.rajaongkir.results;
			kab_kota.forEach(value => {
				$('#select_kabkota').append(`<option value="${value.city_id}">${value.type} ${value.city_name}</option>`)
			})
			$('#select_kabkota').attr('disabled', false);
			$('#select_kabkota').niceSelect('update')
		}
	});
})

$(document).on('change', '#select_kabkota', function(){
	$('#tampilan_ongkir').html(`Biaya Ongkir <span id="tampilan_ongkir">Loading...</span>`);
	var id_kabkota = $(this).val();
	var kab_kota = $(this).children("option:selected").html();
	$('#input_kabkota').val(kab_kota);
	$.ajax({
		method: "GET",
		url: base_url + `API/hitungOngkir/${id_kabkota}`,
		dataType: "JSON",
		success: function (response) {
			var ongkir = response.rajaongkir.results[0].costs[1].cost[0].value;
			$('#tampilan_ongkir').html(`Biaya Ongkir <span id="tampilan_ongkir">Rp ${ongkir}</span>`);
			$('#biaya_ongkir').val(ongkir);
			hitungTotal();
		}
	});
})

function hitungTotal(){
	var subtotal = parseInt($('#subtotal').val());
	var biaya_ongkir = parseInt($('#biaya_ongkir').val());
	var potongan_voucher = parseInt($('#potongan_voucher').val());
	var jenis_voucher = $('#jenis_voucher').val();
	var jenis_pembayaran = $('#jenis_pembayaran').val();
	var total = subtotal;
	
	if(jenis_pembayaran == 1){
		if(jenis_voucher == 1){
			total += biaya_ongkir - potongan_voucher;
			$('#total_harga').html(`Rp ${total}`)
			console.log(total);
		}else if(jenis_voucher == 2){
			total *= potongan_voucher/100 + biaya_ongkir;
			$('#total_harga').html(`Rp ${total}`)
			console.log(total, 'kode 2');
		} else {
			total += biaya_ongkir;
			$('#total_harga').html(`Rp ${total}`);
			console.log(total)
		}
	} else {
		if(jenis_voucher == 1){
			total += biaya_ongkir - potongan_voucher;
			$('#total_harga').html(`Rp ${total}`)
			console.log(total);
		}else if(jenis_voucher == 2){
			total *= potongan_voucher/100 + biaya_ongkir;
			$('#total_harga').html(`Rp ${total}`)
			console.log(total, 'kode 2');
		} else {
			total += biaya_ongkir;
			$('#total_harga').html(`Rp ${total}`);
			console.log(total)
		}
	}

	}

