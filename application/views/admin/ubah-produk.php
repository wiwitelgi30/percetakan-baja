 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Produk</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="<?= base_url('admin/produk/ubah_produk/') . $produk->id_produk ?>" method="post" enctype="multipart/form-data">
        <div class="card-body"> 
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk->nama_produk ?>" placeholder="Nama Produk" >
            </div> 
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $produk->gambar ?>" placeholder="Gambar Produk">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Produk</label>
                <select class="form-control" id="kategori" name="id_kategori_produk">
                    <option>Kategori</option>
                    <?php foreach ($kategori_produk as $row): ?>
                        <option value="<?= $row->id_kategori_produk ?>" selected="<?php ($produk->id_kategori_produk == $row->id_kategori_produk) ?>"><?= $row->nama_kategori_produk ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Produk</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= $produk->stok ?>" placeholder="Stok Produk">
            </div> 
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="texe" class="form-control" id="harga" name="harga" value="<?= $produk->harga ?>" placeholder="Harga Produk">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Produk"><?= $produk->deskripsi ?></textarea>
            </div>
            <div class="mb-3 text-right">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

</div>
<!-- /.container-fluid -->

