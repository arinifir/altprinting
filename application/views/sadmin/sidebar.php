<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="<?= base_url('Sadmin') ?>" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text pl-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Data Master</li>
            <li>
                <a href="<?= base_url('Sadmin/datadmin') ?>" aria-expanded="false">
                    <i class="mdi mdi-account"></i><span class="nav-text pl-2">Admin</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/datapelanggan') ?>" aria-expanded="false">
                    <i class="mdi mdi-account-multiple"></i><span class="nav-text pl-2">Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/dataproduk') ?>" aria-expanded="false">
                    <i class="mdi mdi-image-multiple"></i><span class="nav-text pl-2">Produk</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/datakategori') ?>" aria-expanded="false">
                    <i class="mdi mdi-shape"></i><span class="nav-text pl-2">Kategori</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/datavoucher') ?>" aria-expanded="false">
                    <i class="mdi mdi-ticket-percent"></i><span class="nav-text pl-2">Voucher</span>
                </a>
            </li>
            <li class="nav-label">Transaksi</li>
            <li>
                <a href="<?= base_url('Sadmin/datatransaksi') ?>" aria-expanded="false">
                    <i class="mdi mdi-view-list"></i><span class="nav-text pl-2">Menunggu Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/confirmbayar') ?>" aria-expanded="false">
                    <i class="mdi mdi-credit-card-check"></i><span class="nav-text pl-2">Konfirmasi Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/pengemasan') ?>" aria-expanded="false">
                    <i class="mdi mdi-truck-fast"></i><span class="nav-text pl-2">Pengemasan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/kemascod') ?>" aria-expanded="false">
                    <i class="mdi mdi-package"></i><span class="nav-text pl-2">Pengemasan(COD)</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/resikirim') ?>" aria-expanded="false">
                    <i class="mdi mdi-tag-text"></i><span class="nav-text pl-2">Resi Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/datacod') ?>" aria-expanded="false">
                    <i class="mdi mdi-run-fast"></i><span class="nav-text pl-2">COD</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/transelesai') ?>" aria-expanded="false">
                    <i class="mdi mdi-check"></i><span class="nav-text pl-2">Selesai</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/tidakvalid') ?>" aria-expanded="false">
                    <i class="mdi mdi-close"></i><span class="nav-text pl-2">Tidak Valid</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/dataulasan') ?>" aria-expanded="false">
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
                <a href="<?= base_url('Sadmin/pembelian') ?>" aria-expanded="false">
                    <i class="mdi mdi-cart"></i><span class="nav-text pl-2">Pembelian</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/riwayatpembelian') ?>" aria-expanded="false">
                    <i class="mdi mdi-history"></i><span class="nav-text pl-2">Riwayat Pembelian</span>
                </a>
            </li>
            <li class="nav-label">Laporan</li>
            <li>
                <a href="<?= base_url('Sadmin/laporanmasuk') ?>" aria-expanded="false">
                    <i class="mdi mdi-text-box-plus"></i><span class="nav-text pl-2">Laporan Pendapatan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Sadmin/laporankeluar') ?>" aria-expanded="false">
                    <i class="mdi mdi-text-box-minus"></i><span class="nav-text pl-2">Laporan Pengeluaran</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->