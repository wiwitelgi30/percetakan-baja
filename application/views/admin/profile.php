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

                                    <button style="float: right" type="submit" class="btn btn-primary"> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

    </div>
</div>
<!-- /.container-fluid -->