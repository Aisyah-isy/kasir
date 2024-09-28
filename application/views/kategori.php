<div id="done">
	<?= $this->session->flashdata('alert'); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form action="<?= base_url('kategori/simpan') ?>" method="post">
			<div class="modal-content col-md-12">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Tambah Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xl-12">
							<label for="nameWithTitle" class="form-label">Nama Kategori</label>
							<input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="nama_k">
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
		<h2 class="h4 mb-1">Nama Kategori</h2>
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
									<span class="fe fe-plus fe-16 mr-2"></span> Tambah Kategori </button>
							</div>
						</div>
					</form>
				</div>
				<!-- table -->
				<table class="table table-borderless table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($kate as $aa) { ?>
							<tr>
								<td>
									<p class="mb-0 text-muted"><strong><?= $no; ?></strong></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['nama_k'] ?></p>
								</td>
								<td>
									<a class="btn btn-sm btn-outline-danger" onClick="return confirm('Yakin Menghapus Data?')" href="<?= base_url('kategori/hapus/' . $aa['id_kategori']) ?>">
										<i class="fe fe-trash"></i>
									</a>
									<a class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit<?= $aa['id_kategori'] ?>" href="">
										<i class="fe fe-edit"></i>
									</a>
									<div class="modal fade" id="edit<?= $aa['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<form action="<?= base_url('kategori/edit') ?>" method="post">
												<input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="verticalModalTitle">Edit Kategori</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col mb-3">
																<label for="nameWithTitle" class="form-label">Nama Kategori</label>
																<input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['nama_k'] ?>" placeholder="Enter Name" name="nama_k">
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