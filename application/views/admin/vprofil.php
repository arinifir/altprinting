        <!--**********************************
            Content body start
        ***********************************-->
        <?php foreach ($admin as $adm) { ?>

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
                        <form action="<?= base_url() ?>admin/Profiladm/edit/<?= $adm->nip ?>" method="post">
                            <div class="col-lg-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center mb-4">
                                            <div class="media-body">
                                                <h3 class="mb-0">Pikamy Cha</h3>
                                            </div>
                                        </div>
                                        <ul class="card-profile__info">
                                            <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                                            <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="#" class="form-profile">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $adm->nama_lengkap ?>" placeholder="Masukkan Nama">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomer Handphone</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $adm->nohp != '' ? $adm->nohp : '-' ?>" placeholder="Masukkan No HP">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary px-3 ml-4 float-right">Update</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            <!-- #/ container -->
            </div>
        <?php } ?>
        <!--**********************************
            Content body end
        ***********************************-->