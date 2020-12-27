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
            <div class="col-md-2">
                <div class="card my-auto">
                    <div class="card-body">
                        <div class="media align-items-center text-center">
                            <div class="media-body">
                                <h3 class="mb-0"><?= $admin->nama_lengkap ?></h3>
                            </div>
                        </div>
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
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $admin->nama_lengkap ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nomer Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $admin->no_hp ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $admin->email ?>" disabled>
                                </div>
                            </div>
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