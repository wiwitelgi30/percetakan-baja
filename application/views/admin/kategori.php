<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kategori</h1>
<a href="kategori/tambah" class="btn btn-success mb-2">Tambah</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($kategori_produk as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_kategori_produk ?></td>
                        <td>
                            <a href="<?= base_url('admin/kategori/ubah/') . $row->id_kategori_produk ?>" class="btn btn-info">Ubah</a>
                            <a href="<?= base_url('admin/kategori/hapus_kategori_produk/') . $row->id_kategori_produk ?>" class="btn btn-danger">Hapus</a>
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

