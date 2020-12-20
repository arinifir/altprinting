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
                <a href="<?= base_url('user/User/tampilp') ?>" aria-expanded="false">
                    <i class="fa fa-dropbox menu-icon"></i><span class="nav-text">Produk User</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/datakategori') ?>" aria-expanded="false">
                    <i class="fa fa-list menu-icon"></i><span class="nav-text">Kategori</span>
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
                <a href="<?= base_url('admin/Admin/datatransaksi') ?>" aria-expanded="false">
                    <i class="mdi mdi-view-list"></i><span class="nav-text pl-2">Data Transaksi</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/confirmbayar') ?>" aria-expanded="false">
                    <i class="mdi mdi-credit-card-check"></i><span class="nav-text pl-2">Konfirmasi Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/antriankirim') ?>" aria-expanded="false">
                    <i class="mdi mdi-truck-fast"></i><span class="nav-text pl-2">Menunggu Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/resikirim') ?>" aria-expanded="false">
                    <i class="mdi mdi-tag-text"></i><span class="nav-text pl-2">Resi Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/transelesai') ?>" aria-expanded="false">
                    <i class="mdi mdi-check"></i><span class="nav-text pl-2">Selesai</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Admin/dataulasan') ?>" aria-expanded="false">
                    <i class="mdi mdi-comment"></i><span class="nav-text pl-2">Ulasan</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i><span class="nav-text pl-2">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./chart-flot.html">Flot</a></li>
                    <li><a href="./chart-morris.html">Morris</a></li>
                    <li><a href="./chart-chartjs.html">Chartjs</a></li>
                    <li><a href="./chart-chartist.html">Chartist</a></li>
                    <li><a href="./chart-sparkline.html">Sparkline</a></li>
                    <li><a href="./chart-peity.html">Peity</a></li>
                </ul>
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