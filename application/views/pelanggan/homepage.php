    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Kategori Produk</h1>
                <p>
                    Percetakan Baja menyediakan kategori agar dapat memudahkan pelanggan dalam mencari produk yang ingin melakukan proses jasa cetak.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($kategori_produk as $kategori): ?>
            <div class="col-12 col-md-4 p-5 mt-3 border-end border-start">
                <h5 class="text-center mt-3 mb-3"><?= $kategori->nama_kategori_produk ?></h5>
                <p class="text-center"><a href="<?= base_url('/produk?kategori=') . $kategori->nama_kategori_produk ?>" class="btn btn-success">Cari Sekarang</a></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Produk Terbaru</h1>
                    <p>
                        Percetakan Baja menyediakan beberapa produk jasa cetak sablon terbaru guna membantu pengusaha atau organisasi dalam mempromosikan maupun meningkatkan citra dengan menambahkan merek atau label pada produk anda.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produk as $row): ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?= base_url('/produk/detail/') . $row->slug ?>">
                            <img src="<?= base_url('assets/uploads/') .$row->gambar  ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-success text-right">Rp <?= number_format($row->harga,0,',','.') ?></li>
                            </ul>
                            <a href="<?= base_url('/produk/detail/') . $row->slug ?>" class="h2 text-decoration-none text-dark"><?= $row->nama_produk ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    <script>
        $(document).ready(function() {
            <?php if ($this->session->flashdata('error.login')): ?>
                $("#loginModal").modal('show');
            <?php endif; ?>

            <?php if ($this->session->flashdata('error.daftar')): ?>
                $("#daftarModal").modal('show');
            <?php endif; ?>

            <?php if ($this->session->flashdata('success.daftar')): ?>
                $("#loginModal").modal('show');
            <?php endif; ?>
        });
    </script>