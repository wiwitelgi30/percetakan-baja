<style>
    .gambar-produk {
        max-height: 50px;
    }

    .bukti-bayar {
        max-height: 20rem;
    }

    td {
        vertical-align: middle;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="mb-4 d-flex justify-content-between">
    <h1 class="h3 mb-2 text-gray-800">Pesanan No. <?= $pesanan->id_pesanan ?></h1>
    <?php if ($pesanan->status_pesanan !== 'Selesai'): ?>
    <button id="selesaikan-pesanan" data-href="<?= base_url('admin/pesanan/selesai/') . $pesanan->id_pesanan ?>" class="btn btn-success"><i class="fas fa-check"></i> Selesaikan Pesanan</button>
    <?php endif; ?>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <table>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><?= $pesanan->nama ?></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td><?= $pesanan->no_hp ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $pesanan->alamat ?></td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Daftar Pesanan</th>
                        <th>Catatan</th>
                        <th>Link Design</th>
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
                        <td><a href="<?= $item->link_design ?>" target="_blank">Link Desain</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5>Bukti Pembayaran</h5>
                <a href="<?= base_url('assets/uploads/') . $pesanan->bukti_bayar ?>">
                    <img src="<?= base_url('assets/uploads/') . $pesanan->bukti_bayar ?>" class="bukti-bayar" alt="Bukti Pembayaran">
                </a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<script>
    document.getElementById('selesaikan-pesanan').addEventListener("click",  function(ev){
        if (confirm('Apakah anda takin ingin selesaikan pesanan ini?')) {
            window.location.href = ev.target.dataset.href
        }
    });
</script>

