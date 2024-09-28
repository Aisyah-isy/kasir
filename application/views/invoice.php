<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="row align-items-center mb-4">
            <div class="col">
                <h2 class="h5 page-title"><small class="text-muted text-uppercase">Invoice</small><br>#<?= $nota;?></h2>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 text-center mb-4">
                        <!-- <img src="./assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4" alt="..."> -->
                        <h2 class="mb-0 text-uppercase">Invoice</h2>
                        <p class="text-muted"> AISHA<br> Mojogedangers </p>
                    </div>
                    <div class="col-md-7">
                        <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                        <p class="mb-4">
                            <strong>Aisyah</strong><br>Mojogedangers<br>aisyahais@gmail.com<br> (478) 446-9234<br>
                        </p>
                        <p>
                            <span class="small text-muted text-uppercase">Invoice #</span><br>
                            <strong><?= $nota;?></strong>
                        </p>
                    </div>
                    <div class="col-md-5">
                        <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                        <p class="mb-4">
                            <strong><?= $penjualan->nama;?></strong><br> <?= $penjualan->alamat;?><br> Ivanteyevka<br> <?= $penjualan->telp;?><br>
                        </p>
                        <p>
                            <small class="small text-muted text-uppercase">Due date</small><br>
                            <strong><?= $penjualan->tanggal;?></strong>
                        </p>
                    </div>
                </div> <!-- /.row -->
                <table class="table table-borderless table-hover">
                    <thead class="text-size-13">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $no = 1;
                        foreach ($detail as $aa) { ?>
                            <tr>
                                <td>
                                    <p class="mb-0 text-muted"><strong><?= $no; ?></strong></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['kode_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['nama'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['jumlah'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">Rp. <?= number_format($aa['harga']) ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">Rp. <?= number_format($aa['jumlah'] * $aa['harga']) ?></p>
                                </td>
                            </tr>
                        <?php $total = $total + $aa['jumlah'] * $aa['harga'];
                            $no++;
                        } ?>
                        <tr>
                            <td colspan="5">Total Harga</td>
                            <td>Rp. <?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row mt-2">
                    <div class="col">
                        <a href="<?= base_url('penjualan/print' . $nota); ?>">
                            <button type="button" class="btn btn-danger">Print PDF</button></a>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.col-12 -->
</div>