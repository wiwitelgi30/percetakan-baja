<?php
$kategori_produk = $this->db->select('*')->get('kategori_produk')->result();
?>

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Percetakan Baja</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <a class="text-decoration-none" href="maps:Komp. Pertokoan PRIMKOPAD, Jl. Raya Bogor No.2, RT.4/RW.6, Kramat Jati, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13510">Komp. Pertokoan PRIMKOPAD, Jl. Raya Bogor No.2, RT.4/RW.6, Kramat Jati, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13510</a>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:08128105312">08128105312</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:jimisablon3@gmail.com">jimisablon3@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Produk Kami</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <?php foreach ($kategori_produk as $kategori): ?>
                        <li><a class="text-decoration-none" href="<?= base_url('/produk?kategori=') . $kategori->nama_kategori_produk ?>"><?= $kategori->nama_kategori_produk ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Info Selengkapnya</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="<?= base_url('/') ?>">Home</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('/produk') ?>">Produk</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('/about') ?>">About</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('/contact') ?>">Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; <?= date('Y') ?> Percetakan Baja
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->