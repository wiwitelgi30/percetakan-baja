<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:jimisablon3@gmail.com">wiwitelgi30@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:08128105312">08128105312</a>
                </div>
                <?php if (! $this->session->userdata('logged_in')): ?>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="me-2 btn btn-success">Login</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#daftarModal" class="btn btn-light">Daftar</button>
                </div>
                <?php else: ?>
                <div>
                    <a href="<?= base_url('/pesanan') ?>" class="btn btn-success">Pesanan Saya</a>
                    <a href="<?= base_url('auth/logout') ?>" class="ms-2 btn btn-outline-light">Logout</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->