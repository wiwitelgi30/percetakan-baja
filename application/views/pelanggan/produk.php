<!-- Modal -->
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



    <!-- Start Content -->
    <div class="container py-5">
        <form action="<?= base_url('produk') ?>" method="get">
            <div class="row">

                <div class="col-lg-3">
                    <h1 class="h2 pb-4">Kategori</h1>
                    <ul class="list-unstyled templatemo-accordion">
                        <?php foreach ($kategori_produk as $row): ?>
                        <li class="pb-3">
                            <a onclick="this.form.submit()" name="kategori" value="<?= $row->nama_kategori_produk ?>" class="collapsed d-flex justify-content-between h3 text-decoration-none">
                                <?= $row->nama_kategori_produk ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6 pb-4">
                            <div class="d-flex">
                                <input type="search" name="search" id="search" class="me-2 form-control" value="<?= $this->input->get('search') ?>" placeholder="Cari produk..." autocomplete="off">
                                <button type="submit" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <small>
                            Menampilkan <?= count($produk) ?> produk
                            
                            <?php if ($this->input->get('search')): ?>
                                untuk "<b><?= $this->input->get('search') ?></b>"
                            <?php endif; ?>

                            <?php if ($this->input->get('kategori')): ?>
                                dengan ketegori <?= $this->input->get('kategori') ?>
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
                                                <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i> Detail</a></li>
                                                <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-plus"></i> Keranjang</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="shop-single.html" class="h3 text-decoration-none"><?= $row->nama_produk ?></a>
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
        </form>
    </div>
    <!-- End Content -->

    </footer>
    <!-- End Footer -->