 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Kategori</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="<?= base_url('admin/kategori/ubah_kategori_produk/') . $kategori_produk->id_kategori_produk ?>" method="post" enctype="multipart/form-data">
        <div class="card-body"> 
            <div class="mb-3">
                <label for="nama_kategori_produk" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori_produk" name="nama_kategori_produk" value="<?= $kategori_produk->nama_kategori_produk ?>" placeholder="Nama Kategori" >
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

