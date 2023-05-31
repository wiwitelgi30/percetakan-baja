    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
        <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?= base_url('assets/uploads/') . $produk->gambar ?>" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?= $produk->nama_produk ?></h1>
                            <p class="h3 py-2">Rp <?= number_format($produk->harga,0,',','.') ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Kategori:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?= $produk->nama_kategori_produk ?></strong></p>
                                </li>
                            </ul>

                            <h6>Deskripsi:</h6>
                            <p><?= $produk->deskripsi ?></p>

                            <form action="<?= base_url('/keranjang/tambah_keranjang') ?>" method="POST">
                                <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Qty
                                                <input type="hidden" name="jumlah_produk" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Tambah ke keranjang</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Content -->

    </footer>
    <!-- End Footer -->