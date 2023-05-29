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
    <h4>Keranjang Belanja</h4>
    <div class="row">
        <table class="mt-4 table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
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
                                <b class="text-success">Rp <?= number_format($produk->harga, 0,',','.') ?></b>
                            </div>
                        </div>
                    </td>
                    <td rowspan="2">
                        <form action="<?= base_url('/keranjang/ubah_jumlah_produk') ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="id_keranjang" value="<?= $produk->id_keranjang ?>">
                                <div class="col-3">
                                    <input type="number" name="jumlah_produk" id="jumlah_produk" value="<?= $produk->jumlah_produk ?>" class="form-control form-control-sm" min="1" max="<?= $produk->stok ?>">
                                </div>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td rowspan="2"><b>Rp <?= number_format($produk->harga * $produk->jumlah_produk, 0,',','.') ?></b></td>
                    <td rowspan="2">
                        <a href="<?= base_url('/keranjang/hapus_produk/') . $produk->id_keranjang ?>" class="btn btn-sm btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="<?= base_url('/keranjang/tambah_catatan_produk') ?>" method="post">
                            <input type="hidden" name="id_keranjang" value="<?= $produk->id_keranjang ?>">
                            <textarea onblur="this.form.submit()" name="catatan" id="catatan" rows="2" class="form-control" placeholder="Tambahkan catatan. cth: link desain dll"><?= $produk->catatan ?></textarea>
                        </form>
                    </td>
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
            <a href="<?= base_url('/checkout') ?>" class="ms-4 btn btn-success">Checkout <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>