    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <form action="<?= base_url('produk') ?>" method="get">
                <h1 class="h2 pb-4 fw-normal">Kategori</h1>
                <ul class="list-styled templatemo-accordion">
                    <?php foreach ($kategori_produk as $row): ?>
                    <li>
                        <button onclick="this.form.submit()" name="kategori" value="<?= $row->nama_kategori_produk ?>" class="btn collapsed d-flex justify-content-between h3 text-decoration-none">
                            <?= $row->nama_kategori_produk ?>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </form>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12 pb-4">
                        <form action="<?= base_url('produk') ?>" method="get">
                        <div class="d-flex">
                            <input type="search" name="search" id="search" class="me-2 form-control form-control-lg" value="<?= $this->input->get('search') ?>" placeholder="Cari produk..." autocomplete="off">
                            <button type="submit" class="btn btn-success">Cari</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="mb-4">
                    <small>
                        Menampilkan <?= count($produk) ?> produk
                        
                        <?php if ($this->input->get('search')): ?>
                            untuk "<b><?= $this->input->get('search') ?></b>"
                        <?php endif; ?>

                        <?php if ($this->input->get('kategori')): ?>
                            dengan kategori <b><?= $this->input->get('kategori') ?></b>
                        <?php endif; ?>
                    </small>
                </div>
                
                <div class="row">
                    <?php foreach ($produk as $row): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="<?= base_url('assets/uploads/') . $row->gambar ?>">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="<?= base_url('/produk/detail/') . $row->slug ?>"><i class="far fa-eye"></i> Detail</a></li>
                                            <?php if ($this->session->userdata('logged_in')): ?>
                                            <li>
                                                <form action="<?= base_url('/keranjang/tambah_keranjang') ?>" method="post">
                                                    <input type="hidden" name="id_produk" value="<?= $row->id_produk ?>">
                                                    <input type="hidden" name="jumlah_produk" value="1">
                                                    <button type="submit" class="btn btn-success text-white mt-2"><i class="fas fa-plus"></i> Keranjang</button>
                                                </form>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="<?= base_url('/produk/detail/') . $row->slug ?>" class="h3 text-decoration-none"><?= $row->nama_produk ?></a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <p class="mb-0 fw-bold text-success">Rp <?= number_format($row->harga) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    </footer>
    <!-- End Footer -->