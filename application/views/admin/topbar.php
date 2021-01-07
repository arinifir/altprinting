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
                    <b class="logo-abbr"><img src="<?= base_url('assets/') ?>alt_rectangle_120.png" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url('assets/') ?>alt_rectangle_120.png" alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url('assets/') ?>alt_jember_rb_120.png">
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
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>Hello, <strong class="pr-2"><?= $this->session->userdata("nama") ?></strong>
                                <img src="<?= base_url('assets/admin/') ?>images/user/form-user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('admin/Profiladm') ?>">
                                                <i class="mdi mdi-account"></i> <span>Profil</span>
                                            </a>
                                        </li>
                                        <hr class="my-2">
                                        <li>
                                            <a href="javascript:void(0)" onclick="logout()">
                                                <i class="mdi mdi-logout"></i> <span>Logout</span>
                                            </a>
                                        </li>
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