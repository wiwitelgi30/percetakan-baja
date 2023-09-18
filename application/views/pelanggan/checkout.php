<style>
    .gambar-produk {
        border-radius: 0.5rem;
        max-height: 100px;
    }

    td {
        /* vertical-align: middle; */
    }
</style>

<div class="container py-5">
    <h4>Rincian Pesanan</h4>
    <div class="row">
        <table class="mt-4 table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                    <th>Link Desain Produk</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($keranjang)): ?>
                <?php foreach ($keranjang as $produk): ?>
                <tr>
                    <td>
                        <div class="d-flex">
                            <img src="<?= base_url('assets/uploads/') . $produk->gambar ?>" class="gambar-produk img-fluid" alt="Gambar Produk">
                            <div class="mx-2 fw-bolder">
                                <h5><?= $produk->nama_produk ?></h5>
                                <b class="text-success">Rp <?= number_format($produk->harga, 0,',','.') ?></b> x <?= $produk->jumlah_produk ?>
                            </div>
                        </div>
                    </td>
                    <td><b>Rp <?= number_format($produk->harga * $produk->jumlah_produk, 0,',','.') ?></b></td>
                    <td><?= $produk->catatan ?? '-' ?></td>
                    <td><a href="<?= $produk->link_design ?>" target="_blank">Link Desain</a></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center p-5">Keranjang belanja anda masih kosong.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-end align-items-center">
            <b class="h5">Total Pesanan: Rp <?= number_format($total_pesanan,0,',','.') ?></b>
            <a href="<?= base_url('/checkout/buat_pesanan') ?>" class="ms-4 btn btn-success">Buat Pesanan <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>