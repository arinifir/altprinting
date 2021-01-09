        <!--**********************************
            Content body start
        ***********************************-->


        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?= $admin['nama_lengkap'] ?></h3>
                                    </div>
                                </div>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">No HP</strong> <span><?= $admin['no_hp'] != '' ? $admin['no_hp'] : '-' ?></span></li>
                                    <li><strong class="text-dark mr-4">Email</strong><?= $admin['email'] ?></li>
                                </ul>
                                <div class="text-center col-md-12 mt-1"><a id="btn_harga" class="btn btn-primary button_merah btn-block" href="<?= base_url('sadmin/profilsadm') ?>">Edit Profil</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('sadmin/editpsw') ?>" method="post" class="form-profile">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Password Sekarang</label>
                                            <input type="text" class="form-control" id="password" name="password">
                                            <?php echo form_error('password'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="text" class="form-control" id="password1" name="password1">
                                            <?php echo form_error('password1'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="text" class="form-control" id="password2" name="password2">
                                            <?php echo form_error('password2'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary px-3 ml-4 float-right">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- #/ container -->
        </div>

        <!--**********************************
            Content body end
        ***********************************-->