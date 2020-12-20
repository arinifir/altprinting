const base_url = 'http://localhost/altprinting/'
$('.btnlogin').on('click', function() {
    const email = $('.email').val();
    const password = $('.password').val();
    $.ajax({
        method: "post",
        url: base_url+"API/login",
        data: {
            email: email,
            password: password
        },
        dataType: "json",
        success: function(response) {
            const status = response.status;
            const role = response.role;
            if (status == "success") {
                if (role == "super admin") {
                    window.location.href = base_url+'Sadmin';
                } else if (role == "admin") {
                    window.location.href = base_url+'Admin';
                } else if (role == "pelanggan") {
                    window.location.href = base_url+'User';
                }
            } else if (status == "wrong_password") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password Salah!'
                })
                $('.password').val('')
            } else if (status == "not_active") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Akun Belum Terverifikasi!'
                })
            } else if (status == "empty") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User Tidak Terdaftar!'
                })
            }
            if (email == '' || password == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Email atau Password Kosong!'
                })
            }
        }
    });
})
$(document).on('click','.btnDel', function () { 
    const id = $(this).data('id')
    console.log(id);
    $.ajax({
        url: base_url+"API/deleteproduk/"+id,
        dataType: "text",
        success: function (response) {
            if (response=="berhasil") {
                window.location.href = base_url+'API/delproduk/'+id;
            }else{
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Jika Anda menghapus data ini, Data Paket dan Ulasan produk juga akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = base_url+'API/delbyproduk/'+id;
                    }
                })
            }
        }
    });
    
})

$(document).on('click', '#myImg', function () {
    var dataid = $(this).data('id');
    var selector = '#myGambar' + dataid;
    var modalImg = $('#img' + dataid);
    var modal = $(selector);
    modal.css("display", "block");
    modalImg.attr('src', this.src);
    $(document).on('click', '.popup .tutup', () => {
        modal.css("display", "none");
    })
})
