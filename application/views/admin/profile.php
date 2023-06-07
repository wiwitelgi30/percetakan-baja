<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>
    <hr>

    <div class="row mb-4">

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                Profile
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('admin/profile/ubah_profile') ?>">
                                    <input type="hidden" name="id_user" value="<?= $admin->id_user ?>">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $admin->nama ?>" placeholder="Nama Anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $admin->alamat ?>" placeholder="Alamat Anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Handphone</label>
                                        <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $admin->no_hp ?>" placeholder="Nomor Hancphone Anda" min="10" required>
                                    </div>
                                    <button style="float: right" type="submit" class="btn btn-primary"> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                Ubah Password
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('admin/profile/ubah_password') ?>">
                                    <input type="hidden" name="id_user" value="<?= $admin->id_user ?>">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password saat ini</label>
                                        <input type="password" class="form-control" name="password_sekarang" id="Password" placeholder="Password saat ini">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password baru" class="form-label">Password baru</label>
                                        <input type="password" class="form-control" name="password_baru" id="Password baru" placeholder="Masukkan password baru">
                                    </div>
                                    <div class="mb-3">
                                        <label for="konfirmasi Password" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="konfirmasi_password" id="Konfirmasi Password" placeholder="Konfirmasi Password">
                                    </div>
                                    <button style="float: right" type="submit" class="btn btn-primary"> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

    </div>
</div>
<!-- /.container-fluid -->