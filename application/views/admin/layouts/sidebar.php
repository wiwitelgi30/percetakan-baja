<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard');?>">
    <div class="sidebar-brand-text mx-3">Percetakan Baja</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/dashboard');?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Master
</div>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/produk');?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Produk</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/kategori');?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Kategori Produk</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Pemesanan
</div>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/pesanan');?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Pesanan Sablon</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Laporan
</div>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/laporan/penjualan');?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Penjualan</span>
    </a>
</li>



</ul>
<!-- End of Sidebar -->