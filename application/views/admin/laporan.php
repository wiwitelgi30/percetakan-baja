<style>
    .gambar-produk {
        /* border-radius: 0.5rem; */
        max-height: 50px;
    }

    td {
        vertical-align: middle;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Penjualan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <button id="print" class="mb-3 btn btn-primary">Print</button>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pesanan</th>
                        <th class="text-end">Total Pesanan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($pesanan)): ?>
                    <?php foreach ($pesanan as $row): ?>
                    <tr>
                        <td>
                            <small class="fw-bold text-success">No. <?= $row->id_pesanan ?></small>
                            <ul class="mt-2 list-unstyled">
                                <?php foreach ($row->detail as $index => $item): ?>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/uploads/') . $item->gambar ?>" class="mr-2 gambar-produk img-fluid" alt="Gambar Produk">
                                            <h5><?= $item->nama_produk ?></h5>
                                        </div>
                                        <div>
                                            <b>Rp <?= number_format($item->harga, 0,',','.') ?></b>
                                            x <?= $item->jumlah_produk ?>
                                        </div>
                                    </div>
                                </li>

                                <?php if ($index != array_key_last($row->detail)): ?>
                                <hr>
                                <?php endif; ?>
                                
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td class="text-end"><b>Rp <?= number_format($row->total_harga, 0,',','.') ?></b></td>
                        <td><?= $row->status_pesanan ?></td>
                        <td>
                            <a href="<?= base_url('admin/pesanan/detail/') . $row->id_pesanan ?>" class="btn btn-sm btn btn-outline-success">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center p-5">Pesanan sablon masih kosong.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<script>
function printData()
{
   var divToPrint = document.getElementById("dataTable");
   newWin = window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

function generatePdf() {
    window.jsPDF = window.jspdf.jsPDF;
    var doc = new jsPDF()
    doc.autoTable({
        html: '#dataTable',
        columns: [
            { header: 'Pesanan', dataKey: 'pesanan' },
            { header: 'Total Pesanan', dataKey: 'total_pesanan' },
            { header: 'Status', dataKey: 'Status' }
        ],
    })
    doc.save('laporan.pdf')
}

document.getElementById('print').onclick = function() {
    generatePdf()
}
</script>
