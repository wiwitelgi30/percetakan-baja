 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Produk</h1>
<a href="produk/tambah" class="btn btn-success mb-2">Tambah</a>

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
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no=1; foreach ($produk as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= base_url('assets/uploads/') . $row->gambar ?>" class="img-fluid" width="75px" alt="Gambar Produk"></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->nama_kategori_produk ?></td>
                        <td>Rp. <?= $row->harga ?></td>
                        <td>
                            <a href="<?= base_url('admin/produk/ubah/') . $row->id_produk ?>" class="btn btn-info">Ubah</a>
                            <a href="<?= base_url('admin/produk/hapus_produk/') . $row->id_produk ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

