<style>
    .gambar-produk {
        /* border-radius: 0.5rem; */
        max-height: 50px;
    }

    td {
        vertical-align: middle;
    }
</style>

<div class="container py-5">
    <div class="d-flex justify-content-between">
        <h4>Pesanan No. <?= $pesanan->id_pesanan ?></h4>
        <h4><?= $pesanan->status_pesanan ?></h4>
    </div>
    <div class="row">
        <table class="mt-4 table">
            <thead>
                <tr>
                    <th>Daftar Pesanan</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan->detail as $item): ?>
                <tr>
                    <td>
                        <div class="d-flex">
                            <img src="<?= base_url('assets/uploads/') . $item->gambar ?>" class="me-2 gambar-produk img-fluid" alt="Gambar Produk">
                            <div>
                                <h5><?= $item->nama_produk ?></h5>
                                <b>Rp <?= number_format($item->harga, 0,',','.') ?></b>
                                x <?= $item->jumlah_produk ?>
                            </div>
                        </div>
                    </td>
                    <td><?= $item->catatan ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total Pesanan: Rp <?= number_format($pesanan->total,0,',','.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>