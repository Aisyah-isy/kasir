<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelanggan as $aa) { ?>
                            <tr>
                                <td>
                                    <p class="mb-0 text-muted"><strong><?= $no; ?></strong></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['nama'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['alamat'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['telp'] ?></p>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-success" href="<?= base_url('penjualan/transaksi/' . $aa['id_pelanggan']) ?>">
                                        <i class="fe fe-check-square"></i> Pilih
                                    </a>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="row mt-0">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <h2 class="h4 mb-1">Data Penjualan</h2>
        <div class="card shadow">
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
                                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#verticalModal">
                                    <span class="fe fe-plus fe-16 mr-2"></span> Tambah Penjualan </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- table -->
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all2">
                                    <label class="custom-control-label" for="all2"></label>
                                </div>
                            </td>
                            <th>No</th>
                            <th>No Nota</th>
                            <th>Nominal</th>
                            <th>Pelanggan</th>
                            <!-- <th>Daftar Produk</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $no = 1;
                        foreach ($penjualan as $aa) { ?>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="2474">
                                        <label class="custom-control-label" for="2474"></label>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><strong><?= $no; ?></strong></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['kode_penjualan'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">Rp.<?= number_format($aa['total_harga']); ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><?= $aa['nama'] ?></p>
                                </td>
                                <!-- <td>
                                    <p class="mb-0 text-muted"></p>
                                </td> -->
                                <td>
                                    <a class="btn btn-sm btn-outline-danger" href="<?= base_url('penjualan/invoice/' . $aa['kode_penjualan']) ?>">
                                        cek
                                    </a>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php $total = $total + $aa['total_harga'];
                            $no++;
                        } ?>
                        <tr>
                            <td colspan="5">Total </td>
                            <td>Rp. <?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- <nav aria-label="Table Paging" class="mb-0 text-muted">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div> <!-- customized table -->
</div>