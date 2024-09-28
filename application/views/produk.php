<div id="done">
	<?= $this->session->flashdata('alert'); ?>
</div>

<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form action="<?= base_url('produk/simpan') ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Tambah Produk</h5>
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
							<label for="emailWithTitle" class="form-label">Harga</label>
							<input type="number" id="emailWithTitle" class="form-control" placeholder="Harga" name="harga" require>
						</div>
						<div class="col mb-0">
							<label for="dobWithTitle" class="form-label">Stok</label>
							<input type="number" id="dobWithTitle" class="form-control" placeholder="Stok" name="stok" require>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12 mb-0">
							<label for="nameWithTitle" class="form-label">Kategori</label>
							<select name="id_kategori" class="form-control">
								<?php foreach ($kategori1 as $aa) { ?>
									<option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_k'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col mb-3">
							<label for="nameWithTitle" class="form-label">Kode Produk</label>
							<input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="kode_produk" require>
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
		<h2 class="h4 mb-1">Data Produk</h2>
		<div class="card shadow">
			<div class="card-body">
				<div class="toolbar">
					<form class="form">
						<div class="form-row">
							<div class="form-group col-auto mr-auto">
								<button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#verticalModal">
									<span class="fe fe-plus fe-16 mr-2"></span> Tambah Produk </button>
							</div>
							<!-- <div class="form-group col-auto ">
								<form action="<?= base_url('produk/cari') ?>" method="post" class="form-outline mr-auto searchform">
									<div class="row">
										<div class="col-md-8">
											<input name="cari" class="form-control mr-sm-2 bg-transparant border-1 pl-4 " type="search" placeholder="Cari Produk..." aria-label="Search">
										</div>
										<div class="col-md-1">
											<button type="submit">
												<i class="fe fe-search fe-16">
												</i>
											</button>
										</div>
									</div>
								</form>
							</div> -->
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
							<th>Kode Produk</th>
							<th>Kategori</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($produk as $aa) { ?>
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
									<p class="mb-0 text-muted"><?= $aa['kode_produk'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['nama_k'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['stok'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['harga'] ?></p>
								</td>
								<td>
									<a class="btn btn-sm btn-outline-danger" onClick="return confirm('Yakin Menghapus Data?')" href="<?= base_url('produk/hapus/' . $aa['id_produk']) ?>">
										<i class="fe fe-trash"></i>
									</a>
									<a class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit<?= $aa['id_produk'] ?>" href="">
										<i class="fe fe-edit"></i>
									</a>
									<div class="modal fade" id="edit<?= $aa['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<form action="<?= base_url('produk/edit') ?>" method="post">
												<input type="hidden" name="id_produk" value="<?= $aa['id_produk'] ?>">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="verticalModalTitle">Edit Produk</h5>
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
																<label for="emailWithTitle" class="form-label">Harga</label>
																<input type="number" id="emailWithTitle" class="form-control" value="<?= $aa['harga'] ?>" name="harga">
															</div>
															<div class="col mb-0">
																<label for="nameWithTitle" class="form-label">Stok</label>
																<input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['stok'] ?>" name="stok">
															</div>
														</div>
														<div class="row mt-2">
															<div class="col mb-3">
																<label for="nameWithTitle" class="form-label">Kode Produk</label>
																<input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['kode_produk'] ?>" name="kode_produk">
															</div>
														</div>
														<div class="row">
															<div class="col mb-3">
																<label for="nameWithTitle" class="form-label">Kategori</label>
																<select name="id_kategori" class="form-control">
																	<?php foreach ($kategori1 as $bb) { ?>
																		<option <?php if ($bb['id_kategori'] == $aa['id_kategori']) {
																					echo "selected";
																				} ?> value="<?= $bb['id_kategori'] ?>"><?= $bb['nama_k'] ?></option>
																	<?php } ?>
																</select>
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