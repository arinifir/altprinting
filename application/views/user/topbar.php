<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="<?= base_url('User') ?>"><img src="<?= base_url('assets/') ?>alt_jember_rb_120.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('User') ?>">Beranda</a></li>
                        <!-- <li class="nav-item submenu dropdown">
                            <a href="<?= base_url('pelanggan/Kategori/') ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produk</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kategori/') ?>detail_produk">Foto Polaroid</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('assets/user/') ?>page/single-product.html">Figura Desain</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kategori') ?>">Belanja</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Konfirmasi') ?>">Konfirmasi Pembayaran</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Panduan') ?>">Panduan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Kontak') ?>">Kontak</a></li>
                        <?php if ($this->session->userdata('id_user')) { ?>
                            <li class="nav-item submenu dropdown">
                                <a href="<?= base_url('pelanggan/Kategori/') ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Halo, <?= $this->session->userdata('nama');; ?></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/') ?>">Profil Saya</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('assets/user/') ?>page/single-product.html">Alamat Saya</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/pesanansaya') ?>">Pesanan Saya</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/Profil/riwayatpesanan') ?>">Riwayat Pesanan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="logout()" id="btnkeluar">Keluar</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav-shop">
                        <!-- <li class="nav-item"><button><i class="mdi mdi-magnify fa-lg"></i></button></li> -->
                        <li class="nav-item">
                            <a class="keranjang" href="<?= base_url('pelanggan/Keranjang') ?>"><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?= $this->cart->total_items(); ?></span></a>
                        </li>
                        <?php if (!$this->session->userdata('id_user')) { ?>
                            <li class="nav-item"><a class="button button-header" href="<?= base_url('Auth') ?>">Masuk</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>