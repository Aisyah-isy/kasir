<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>

<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?= base_url('pelanggan/simpan') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Nama</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="nama" require>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Alamat</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="Alamat" name="alamat" require>
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">No. TELP (wa)</label>
                            <input type="text" id="dobWithTitle" class="form-control" placeholder="No. TELP (wa)" name="telp" require>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="row mt-0">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <h2 class="h4 mb-1">Data Pelanggan</h2>
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
                                    <span class="fe fe-plus fe-16 mr-2"></span> Tambah Pelanggan </button>
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="2474">
                                        <label class="custom-control-label" for="2474"></label>
                                    </div>
                                </td>
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
                                    <a class="btn btn-sm btn-outline-danger" onClick="return confirm('Yakin Menghapus Data?')" href="<?= base_url('pelanggan/hapus/' . $aa['id_pelanggan']) ?>">
                                        <i class="fe fe-trash"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit<?= $aa['id_pelanggan'] ?>" href="">
                                        <i class="fe fe-edit"></i>
                                    </a>
                                    <div class="modal fade" id="edit<?= $aa['id_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <form action="<?= base_url('pelanggan/edit') ?>" method="post">
                                                <input type="hidden" name="id_pelanggan" value="<?= $aa['id_pelanggan'] ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="verticalModalTitle">Edit pelanggan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="nameWithTitle" class="form-label">Nama</label>
                                                                <input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['nama'] ?>" name="nama">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="emailWithTitle" class="form-label">Alamat Pelanggan</label>
                                                                <input type="text" id="emailWithTitle" class="form-control" value="<?= $aa['alamat'] ?>" name="alamat">
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="nameWithTitle" class="form-label">No. TELP (wa)</label>
                                                                <input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['telp'] ?>" name="telp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn mb-2 btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
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