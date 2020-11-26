<script>
    //triggers
    $('.btnlogin').on('click', function() {
        const email = $('.email').val();
        const password = $('.password').val();
        // console.log(email,password);
        $.ajax({
            method: "post",
            url: "<?= base_url('API/login') ?>",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            success: function(response) {
                const status = response.status;
                const role = response.role;
                console.log(response);
                if (status == "success") {
                    if (role == "super admin") {
                        window.location.href = '<?= base_url('Sadmin') ?>';
                    } else if (role == "admin") {
                        window.location.href = '<?= base_url('Admin') ?>';
                    } else if (role == "pelanggan") {
                        window.location.href = '<?= base_url('Pelanggan') ?>';
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
</script>