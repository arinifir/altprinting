<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Super Admin</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
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
                                <h3 class="mb-0"><?= $admin->nama_lengkap ?></h3>
                            </div>
                        </div>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">No HP</strong> <span><?= $admin->no_hp != '' ? $admin->no_hp : '-' ?></span></li>
                            <li><strong class="text-dark mr-4">Email</strong><?= $admin->email ?></li>
                        </ul>
                        <div class="text-center col-md-12 mt-1"><a id="btn_harga" class="btn btn-primary button_merah btn-block" href="<?= base_url('sadmin/editpsw') ?>">Ganti Password</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('sadmin/editprofilsadm') ?>" method="POST" class="form-profile">
                            <input type="hidden" value="<?= $admin->id_user; ?>" name="kode">
                            <h4 class="card-title py-2">Profil Super Admin</h4>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="ml-1" style="color: #393e46">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin->nama_lengkap ?>" placeholder="Masukkan nama">
                                </div>
                                <div class="form-group">
                                    <label class="ml-1" style="color: #393e46">Nomer Handphone</label>
                                    <input type="text" class="form-control" id="nomer" name="nomer" value="<?= $admin->no_hp != '' ? $admin->no_hp : '-' ?>" placeholder="Masukkan nomer hp">
                                </div>
                                <div class="form-group">
                                    <label class="ml-1" style="color: #393e46">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $admin->email ?>" placeholder="Masukkan email">
                                </div>
                            </div>
                            <button class="btn btn-primary px-3 ml-2 float-right" type="submit" onclick="simpan()">Ubah</button>
                            <!-- <button class="btn btn-danger px-3 ml-2 float-right">Ganti Password</button> -->
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