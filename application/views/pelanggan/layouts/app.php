<!DOCTYPE html>
<html lang="en">

<head>
    <title>Percetakan Baja</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('assets/pelanggan/img/apple-icon.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/pelanggan/img/favicon.ico'); ?> ">

    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/templatemo.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/custom.css'); ?>">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/fontawesome.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php $this->load->view('pelanggan/layouts/navbar');?>
    <?php $this->load->view('pelanggan/layouts/header');?>
    <?php $this->load->view($content);?>
    <?php $this->load->view('pelanggan/layouts/footer');?>

    <!-- Search Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade bg-white" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('auth/login') ?>" method="POST" class="modal-content modal-body border-0 p-0">
                <div class="mb-4">
                    <h3>Login Pengguna</h3>
                </div>

                <?php if ($this->session->flashdata('success.daftar')): ?>
                <div class="mb-4 alert alert-success" role="alert">
                    <?= $this->session->flashdata('success.daftar') ?>
                </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error.login')): ?>
                <div class="mb-4 alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error.login') ?>
                </div>
                <?php endif; ?>

                <div class="form-group mb-4">
                    <label for="username" class="form-label">Email/No. HP</label>
                    <input type="text" id="login-username" name="username" class="form-control" placeholder="Masukkan Email/No. HP" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="login-password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="text-end form-group mb-4">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Modal -->
    <div class="modal fade bg-white" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('auth/daftar') ?>" method="POST" class="modal-content modal-body border-0 p-0">
                <div class="mb-4">
                    <h3>Daftar Pengguna</h3>
                </div>
                
                <?php if ($this->session->flashdata('error.daftar')): ?>
                <div class="mb-4 alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error.daftar') ?>
                </div>
                <?php endif; ?>
                
                <div class="form-group mb-4">
                    <label for="daftar-nama" class="form-label">Nama Lengkap</label>
                    <input type="text" id="daftar-nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group mb-4">
                    <label for="daftar-no_hp" class="form-label">No. HP (Whatsapp)</label>
                    <input type="number" id="daftar-no_hp" name="no_hp" class="form-control" placeholder="Masukkan No. HP" required>
                </div>
                <div class="form-group mb-4">
                    <label for="daftar-email" class="form-label">Email</label>
                    <input type="email" id="daftar-email" name="email" class="form-control" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group mb-4">
                    <label for="daftar-alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="daftar-alamat" class="form-control" cols="30" rows="2" placeholder="Alamat Lengkap" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="daftar-password" class="form-label">Password</label>
                    <input type="password" id="daftar-password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="text-end form-group mb-4">
                    <button type="submit" class="btn btn-success">Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Script -->
    <script src="<?= base_url('assets/pelanggan/js/jquery-1.11.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/templatemo.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/custom.js'); ?>"></script>
    <!-- End Script -->
</body>

</html>