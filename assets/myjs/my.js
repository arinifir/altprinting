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
    var url = window.location.href;
    var check = url.includes('?filter=true');
    if(check == true){
        var url1 = `&min=${min}&max=${max}`;
    } else {
        var url1 = `?filter=true&min=${min}&max=${max}`;
    }
    var url2 = url.concat(url1);
    console.log(url,url1);
    
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
