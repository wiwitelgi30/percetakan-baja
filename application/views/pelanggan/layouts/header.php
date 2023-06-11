<?php
$keranjang = $this->db->get_where('keranjang', ['id_user' => $this->session->userdata('id_user')])->result();
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href=<?= base_url('/');?>>Percetakan Baja</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('homepage');?>>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('produk');?>>Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('about');?>>About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('contact');?>>Contact</a>
                        </li>
                    </ul>
                </div>
                <?php if ($this->session->userdata('logged_in')): ?>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="<?= base_url('/keranjang') ?>">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?= count($keranjang) ?></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= base_url('/profile') ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> -->
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <div class="container text-light">
                    <div class="w-100 d-flex justify-content-between">
                        <?php if (! $this->session->userdata('logged_in')): ?>
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="me-2 btn btn-success">Login</button>
                        </div>
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#daftarModal" class="btn btn-secondary">Daftar</button>
                        </div>
                        <?php else: ?>
                        <div>
                            <a href="<?= base_url('/pesanan') ?>" class="btn btn-success">Pesanan Saya</a>
                        </div>
                        <div>
                            <a href="<?= base_url('auth/logout') ?>" class="ms-2 btn btn-danger">Logout</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</nav>
    <!-- Close Header -->