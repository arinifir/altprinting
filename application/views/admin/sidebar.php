<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="<?= base_url('admin/Admin') ?>" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text pl-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Data Master</li>
            <li>
                <a href="<?= base_url('admin/Pelanggan/datapelanggan') ?>" aria-expanded="false">
                    <i class="mdi mdi-account-multiple"></i><span class="nav-text pl-2">Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Produk/dataproduk') ?>" aria-expanded="false">
                    <i class="mdi mdi-image-multiple"></i><span class="nav-text pl-2">Produk</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Kategori/datakategori') ?>" aria-expanded="false">
                    <i class="mdi mdi-shape"></i><span class="nav-text pl-2">Kategori</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Voucher/datavoucher') ?>" aria-expanded="false">
                    <i class="mdi mdi-ticket-percent"></i><span class="nav-text pl-2">Voucher</span>
                </a>
            </li>
            <li class="nav-label">Transaksi</li>
            <li>
                <a href="<?= base_url('admin/Transaksi/datatransaksi') ?>" aria-expanded="false">
                    <i class="mdi mdi-credit-card-remove"></i><span class="nav-text pl-2">Menunggu Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/confirmbayar') ?>" aria-expanded="false">
                    <i class="mdi mdi-credit-card-check"></i><span class="nav-text pl-2">Konfirmasi Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/pengemasan') ?>" aria-expanded="false">
                    <i class="mdi mdi-package-variant"></i><span class="nav-text pl-2">Pengemasan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/kemascod') ?>" aria-expanded="false">
                    <i class="mdi mdi-package"></i><span class="nav-text pl-2">Pengemasan(COD)</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/resikirim') ?>" aria-expanded="false">
                    <i class="mdi mdi-tag-text"></i><span class="nav-text pl-2">Resi Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/datacod') ?>" aria-expanded="false">
                    <i class="mdi mdi-run-fast"></i><span class="nav-text pl-2">COD</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/transelesai') ?>" aria-expanded="false">
                    <i class="mdi mdi-check"></i><span class="nav-text pl-2">Selesai</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/ulasanproduk') ?>" aria-expanded="false">
                    <i class="mdi mdi-comment"></i><span class="nav-text pl-2">Ulasan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Transaksi/tidakvalid') ?>" aria-expanded="false">
                    <i class="mdi mdi-close"></i><span class="nav-text pl-2">Pesanan Batal</span>
                </a>
            </li>
            <li class="nav-label">Keuangan</li>
            <li>
                <a href="<?= base_url('Admin/pembelian') ?>" aria-expanded="false">
                    <i class="mdi mdi-cart"></i><span class="nav-text pl-2">Pembelian</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Admin/riwayatpembelian') ?>" aria-expanded="false">
                    <i class="mdi mdi-history"></i><span class="nav-text pl-2">Riwayat Pembelian</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->