<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="<?= base_url('Sadmin') ?>">
                    <b class="logo-abbr"><img src="<?= base_url('assets/') ?>images/alt_logo.png" class="center" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url('assets/') ?>images/alt_logo.png" alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url('assets/') ?>images/alt_jember.png">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <!-- <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <?php
                                $notif = $this->db->get_where('tb_transaksi', ['status_baca' => 0])->num_rows();
                                if ($notif > 0) { ?>
                                    <span class="badge badge-pill gradient-1"><?= $notif; ?></span>
                                <?php } ?>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <?php if ($notif > 0) { ?>
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class=""><?= $notif; ?> Pesanan Baru</span>
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-1"><?= $notif; ?></span>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php
                                        $dn = $this->db->get_where('tb_transaksi', ['status_baca' => 0])->result();
                                        foreach ($dn as $dn) {
                                        ?>
                                            <li class="notification-unread">
                                                <a href="<?= base_url('Sadmin/statusbaca/' . $dn->no_transaksi); ?>">
                                                    <span class="float-center mr-3 avatar-img"><i class="fa fa-shopping-cart text-warning fa-3x"></i></span>
                                                    <div class="notification-content">
                                                        <div class="notification-heading"><?= $dn->nama_pembeli; ?></div>
                                                        <div class="notification-timestamp text-warning"><?= $dn->no_transaksi; ?></div>
                                                        <div class="notification-text text-warning">
                                                            <?php
                                                            $dp = $this->db->get_where('tb_dtrans', ['no_transaksi' => $dn->no_transaksi])->result();
                                                            foreach ($dp as $dp) {
                                                            ?>
                                                                <?= $dp->produk_paket; ?> x <?= $dp->jumlah_produk ?>,
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>Hello, <strong class="pr-2"><?= $this->session->userdata("nama") ?></strong>
                                <img src="<?= base_url('assets/admin/') ?>images/user/form-user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('sadmin/editprofilsadm') ?>"><i class="mdi mdi-account"></i> <span>Profil</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="javascript:void(0)" onclick="logout()"><i class="mdi mdi-logout"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->