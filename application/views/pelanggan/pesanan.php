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
    <h4>Daftar Pesanan</h4>
    <div class="row">
        <table class="mt-4 table">
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
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <img src="<?= base_url('assets/uploads/') . $item->gambar ?>" class="me-2 gambar-produk img-fluid" alt="Gambar Produk">
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
                        <?php if ($row->status_pesanan == 'Menunggu Pembayaran'): ?>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#bayarModal"
                            data-id_pesanan="<?= $row->id_pesanan ?>"
                            data-total_pesanan="<?= $row->total_harga ?>" class="bayar-pesanan btn btn-sm btn btn-success">Bayar</a>
                        <?php endif; ?>

                        <a href="<?= base_url('/pesanan/detail/') . $row->id_pesanan ?>" class="btn btn-sm btn btn-outline-success">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center p-5">Pesanan anda masih kosong.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

    <!-- Login Modal -->
    <div class="modal fade bg-white" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/pesanan/bayar_pesanan') ?>" method="POST" class="modal-content modal-body border-0 p-0" enctype="multipart/form-data">
                <div class="mb-4">
                    <h3>Bayar Pesanan</h3>
                </div>

                <p>Silahkan melakukan pembayaran melalui nomor rekening dan total pembayaran sebagai berikut:</p>

                <div class="form-group mb-4">
                    <table>
                        <tr>
                            <th>Total Pembayaran</th>
                            <td>&nbsp;&nbsp; : <b id="total-bayar" class="text-success"></b></td>
                        </tr>
                        <tr>
                            <th>Nomor Rekening</th>
                            <td>&nbsp;&nbsp; : <b class="text-primary">BRI</b> - <b>123123121323</b> a.n Wiwit</td>
                        </tr>
                    </table>
                </div>

                <input type="hidden" name="id_pesanan" id="id_pesanan">

                <div class="form-group mb-4">
                    <label for="bukti_bayar" class="form-label">Bukti Bayar</label>
                    <input type="file" id="bukti_bayar" name="bukti_bayar" class="form-control" required>
                </div>

                <div class="text-end form-group mb-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const rupiah = (number)=>{
            return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
            }).format(number);
        }
        const button = {
            bayar: document.querySelectorAll('.bayar-pesanan'),
        }

        button.bayar.forEach(el => {
            el.onclick = function(ev) {
                document.querySelector('#id_pesanan').value = ev.target.dataset.id_pesanan
                document.querySelector('#total-bayar').innerHTML = rupiah(ev.target.dataset.total_pesanan)
            }
        });
    </script>