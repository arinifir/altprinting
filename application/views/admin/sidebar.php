<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="<?= base_url('Admin') ?>" aria-expanded="false">
                            <i class="fa fa-dashboard menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Data Master</li>
                    <li>
                        <a href="<?= base_url('admin/Pelanggan/tampil_pelanggan') ?>" aria-expanded="false">
                            <i class="fa fa-users menu-icon"></i><span class="nav-text">Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/dataproduk') ?>" aria-expanded="false">
                            <i class="fa fa-dropbox menu-icon"></i><span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/datakategori') ?>" aria-expanded="false">
                            <i class="fa fa-list menu-icon"></i><span class="nav-text">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/datavoucher') ?>" aria-expanded="false">
                            <i class="fa fa-money menu-icon"></i><span class="nav-text">Voucher</span>
                        </a>
                    </li>
                    <li class="nav-label">Transaksi</li>
                    <li>
                        <a href="<?= base_url('admin/Admin/datatransaksi') ?>" aria-expanded="false">
                            <i class="fa fa-cart-arrow-down menu-icon"></i><span class="nav-text">Data Transaksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/confirmbayar') ?>" aria-expanded="false">
                            <i class="fa fa-credit-card-alt menu-icon"></i><span class="nav-text">Konfirmasi Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/antriankirim') ?>" aria-expanded="false">
                            <i class="fa fa-cubes menu-icon"></i><span class="nav-text">Menunggu Pengiriman</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/resikirim') ?>" aria-expanded="false">
                            <i class="fa fa-truck menu-icon"></i><span class="nav-text">Resi Pengiriman</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/transelesai') ?>" aria-expanded="false">
                            <i class="fa fa-shopping-bag menu-icon"></i><span class="nav-text">Selesai</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/Admin/dataulasan') ?>" aria-expanded="false">
                            <i class="fa fa-star menu-icon"></i><span class="nav-text">Ulasan</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i><span class="nav-text">Charts</span>
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
                            <i class="fa fa-cart-plus menu-icon"></i><span class="nav-text">Pembelian</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Admin/riwayatpembelian') ?>" aria-expanded="false">
                            <i class="fa fa-th-list menu-icon"></i><span class="nav-text">Riwayat Pembelian</span>
                        </a>
                    </li>
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