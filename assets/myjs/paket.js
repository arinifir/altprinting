


$(document).ready(() => {
    const id_produk = $('#input_kodeproduk').val();
    $.ajax({
        method: 'POST',
        url: base_url + `API/checkProduk/${id_produk}`,
        dataType: "JSON",
        success: function (response) {
            const produk = response.data;
            if(produk > 0){
                adaPaket();
                tampil_alert();
            } else {
                tidak_paket();
            }
        }
    });
})

$(document).on('change','#input_qty', function () {
    console.log('ok')
    var qty = $(this).val();
    var rowid = $(this).data('rowid');
    console.log(rowid);
    $.ajax({
        method: 'POST',
        url: base_url + `API/updatecart/${rowid}/${qty}`,
        dataType: "text",
        success: function (response) {
            console.log(response);
            location.reload();
        }
    });
})

/* ==================================================================================================== */

function adaPaket(){
    const card_area = $('.card_area');
    const card = $('.card_paket');
    for(var i = 0; i<card.length;i++){
        card[i].addEventListener("click", function(){
            $('#tambah_keranjang').attr('type', 'submit')
            $('#alert_paket').html('');
            var current = $('.active');
            current[0].className = current[0].className.replace(' active', '');
            this.className += " active";
            let id = $(this).data('kode');
            $.ajax({
                method: 'POST',
                url: base_url+`API/getPaketById/${id}`,
                dataType: "JSON",
                success: function (response) {
                    let harga = response.data.harga_paket;
                    let kode_paket = response.data.kd_paket;
                    let nama_produk = $('#nama_produk').html() + ' ';
                    let nama_paket = response.data.nama_paket + ' ';
                    let isi_paket = response.data.isi_paket;
                    let nama = nama_produk.concat(nama_paket,isi_paket);
                    $('#harga_produk').html(`Rp ${harga}`);
                    $('#input_kodepaket').val(kode_paket);
                    $('#input_namaproduk').val(nama);
                    $('#input_harga').val(harga);
                }
            });
        })
    }
}

function tampil_alert(){
    $(document).on('click', '#tambah_keranjang', function(){
        let button = $(this).attr('type');
        if (button == 'button') {
            $('#alert_paket').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Oops, Anda belum memilih paket
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    })
}

function tidak_paket(){
    $('#tambah_keranjang').attr('type', 'submit');
}