<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Penjualan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori Produk</th>
                        <th>Terjual</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no=1; foreach ($produk as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= base_url('assets/uploads/') . $row->gambar ?>" class="img-fluid" width="75px" alt="Gambar Produk"></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->nama_kategori_produk ?></td>
                        <td><?= $row->terjual ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

