<div id="done">
	<?= $this->session->flashdata('alert'); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form action="<?= base_url('user/simpan') ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Tambah User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col mb-3">
							<label for="nameWithTitle" class="form-label">Nama</label>
							<input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="nama">
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="emailWithTitle" class="form-label">Username</label>
							<input type="text" id="emailWithTitle" class="form-control" placeholder="Username" name="username">
						</div>
						<div class="col mb-0">
							<label for="dobWithTitle" class="form-label">Password</label>
							<input type="password" id="dobWithTitle" class="form-control" placeholder="*******" name="password">
						</div>
					</div>
					<div class="row">
						<div class="col mb-3">
							<label for="nameWithTitle" class="form-label">Level</label>
							<select name="level" class="form-control">
								<option value="Admin">Admin</option>
								<option value="Kasir">Kasir</option>
							</select>
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
		<h2 class="h4 mb-1">Data User</h2>
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
									<span class="fe fe-plus fe-16 mr-2"></span> Tambah User </button>
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
							<th>ID</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Last Login</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($user as $aa) { ?>
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
									<p class="mb-0 text-muted"><?= $aa['username'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['nama'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['last_login'] ?></p>
								</td>
								<td>
									<p class="mb-0 text-muted"><?= $aa['level'] ?></p>
								</td>
								<td>
									<a class="btn btn-sm btn-outline-danger" onClick="return confirm('Yakin Menghapus Data?')" href="<?= base_url('user/hapus/' . $aa['id_user']) ?>">
										<i class="fe fe-trash"></i>
									</a>
									<a class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit<?= $aa['id_user'] ?>" href="">
										<i class="fe fe-edit"></i>
									</a>
									<div class="modal fade" id="edit<?= $aa['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<form action="<?= base_url('user/edit') ?>" method="post">
												<input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="verticalModalTitle">Edit User</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col mb-3">
																<label for="nameWithTitle" class="form-label">Nama</label>
																<input type="text" id="nameWithTitle" class="form-control" value="<?= $aa['nama'] ?>" placeholder="Enter Name" name="nama">
															</div>
														</div>
														<div class="row g-2">
															<div class="col mb-0">
																<label for="emailWithTitle" class="form-label">Username</label>
																<input type="text" id="emailWithTitle" class="form-control" placeholder="Username" disabled value="<?= $aa['username'] ?>"  name="username">
															</div>
															<div class="col mb-0">
																<label for="dobWithTitle" class="form-label">Password</label>
																<input type="password" id="dobWithTitle" class="form-control" disabled value="<?= $aa['password'] ?>" name="password">
															</div>
														</div>
														<div class="row">
															<div class="col mb-3">
																<label for="nameWithTitle" class="form-label">Level</label>
																<select name="level" class="form-control">
																	<option value="Admin" <?php if ($aa['level'] == 'Admin') {
																								echo "selected";
																							} ?>>Admin</option>
																	<option value="Kasir" <?php if ($aa['level'] == 'Kasir') {
																								echo "selected";
																							} ?>>Kasir</option>
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
									<a class="btn btn-sm btn-outline-primary" onClick="return confirm('Yakin Mengubah Password menjadi 1234?')" href="<?= base_url('user/reset/' . $aa['id_user']) ?>">
										<i class="fe fe-refresh-cw"></i>
									</a>
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