<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>
<h2 class="page-title">Transaksi Penjualan</h2>
<div class="row text-small">
    <div class="card col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Pilih Produk Yang Akan Dijual</strong>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="hidden" class="form-control" name="id_pelanggan" id="nota" value="<?= $id_pelanggan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="jumlah" id="inputAddress2" value="<?= $nama_pelanggan ?>" disabled>
                    </div>
                </div>
                <form action="<?= base_url('penjualan/addtemp') ?>" method="post">
                    <div class="form-group">
                        <label for="inputProduk">Produk</label>
                        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                        <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">
                        <select name="id_produk" class="form-control">
                            <?php foreach ($produk as $aa) { ?>
                                <option value="<?= $aa['id_produk'] ?>"><?= $aa['nama'] ?> - <?= $aa['kode_produk'] ?> (<?= $aa['stok'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="inputAddress2" placeholder="Jumlah Yang Dijual" require>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-md-8">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Pilih Produk Yang Akan Dijual</strong>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <form class="form">
                        <div class="form-row">
                            <div class="form-group col-auto mr-auto">
                                <div class="btn btn-outline-danger">
                                    <li class="nav-item w-100">
                                        <i class="fe fe-trash fe-16"></i>
                                    </li>
                                </div>
                            </div>
                            <div class="form-group col-auto">
                                <p>Pastikan Produk Yang Dipilih Benar</p>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- table -->
                <table class="table table-borderless table-hover">
                    <thead class="text-size-13">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $cek = 0;
                        $no = 1;
                        foreach ($temp as $aa) { ?>
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
                                    <p class="mb-0 text-muted"><?= $aa['jumlah'] ?>
                                        <?php if ($aa['jumlah'] > $aa['stok']) {
                                            echo "<span class='badge badge-danger'>Stok Tidak Mencukupi</span>";
                                            $cek = 1;
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">Rp. <?= number_format($aa['harga']) ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">Rp. <?= number_format($aa['jumlah'] * $aa['harga']) ?></p>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-danger" onClick="return confirm('Yakin Menghapus Produk Dari Keranjang?')" href="<?= base_url('penjualan/hapus_temp/' . $aa['id_temp']) ?>">
                                        <i class="fe fe-trash"></i>
                                    </a>
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

                <form action="<?= base_url('penjualan/bayarv2') ?>" method="post">
                    <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                    <?php if (($temp <> NULL) AND ($cek==0) ) { ?>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    <?php } ?>
                </form>
            </div>

        </div>
    </div>
</div>