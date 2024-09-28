<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
	<a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
		<i class="fe fe-x"><span class="sr-only"></span></i>
	</a>
	<nav class="vertnav navbar navbar-light">
		<!-- nav bar -->
		<div class="w-100 mb-4 d-flex">
			<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
				<svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
					<g>
						<polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
						<polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
						<polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
					</g>
				</svg>
			</a>
		</div>
		<?php $menu = $this->uri->segment(1); ?>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item <?php if ($menu == 'home') {
									echo "active";
								} ?> w-100">
				<a class="nav-link" href="<?= site_url('home') ?>">
					<i class="fe fe-home fe-16"></i>
					<span class="ml-3 item-text">Dashboard</span>
				</a>
			</li>
		</ul>
		<?php if ($this->session->userdata('level') == 'Admin') { ?>
			<ul class="navbar-nav flex-fill w-100 mb-2">
				<li class="nav-item  <?php if ($menu == 'user') {
											echo "active";
										} ?> w-100">
					<a class="nav-link" href="<?= site_url('user') ?>">
						<i class="fe fe-user fe-16"></i>
						<span class="ml-3 item-text">Pengguna</span>
					</a>
				</li>
			</ul>
		<?php } 	?>
		<?php if ($this->session->userdata('level') == 'Admin') { ?>
			<ul class="navbar-nav flex-fill w-100 mb-2">
				<li class="nav-item  <?php if ($menu == 'kategori') {
											echo "active";
										} ?> w-100">
					<a class="nav-link" href="<?= site_url('kategori') ?>">
						<i class="fe fe-list fe-16"></i>
						<span class="ml-3 item-text">Kategori Produk</span>
					</a>
				</li>
			</ul>
		<?php } ?>
		<?php if ($this->session->userdata('level') == 'Admin') { ?>
			<ul class="navbar-nav flex-fill w-100 mb-2">
				<li class="nav-item  <?php if ($menu == 'produk') {
											echo "active";
										} ?> w-100">
					<a class="nav-link" href="<?= site_url('produk') ?>">
						<i class="fe fe-archive fe-16"></i>
						<span class="ml-3 item-text">Produk</span>
					</a>
				</li>
			</ul>
		<?php } ?>
		
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item  <?php if ($menu == 'pelanggan') {
										echo "active";
									} ?> w-100">
				<a class="nav-link" href="<?= site_url('pelanggan') ?>">
					<i class="fe fe-users fe-16"></i>
					<span class="ml-3 item-text">Pelanggan</span>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item  <?php if ($menu == 'penjualan') {
										echo "active";
									} ?> w-100">
				<a class="nav-link" href="<?= site_url('penjualan') ?>">
					<i class="fe fe-clipboard fe-16"></i>
					<span class="ml-3 item-text">Penjualan</span>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item  <?php if ($menu == 'surat') {
										echo "active";
									} ?> w-100">
				<a class="nav-link" href="<?= site_url('surat') ?>">
					<i class="fe fe-mail fe-16"></i>
					<span class="ml-3 item-text">Surat</span>
				</a>
			</li>
		</ul>
		<div class="btn-box w-100 mt-4 mb-1">
			<a href="<?= site_url('auth/logout') ?>" class="btn mb-2 btn-danger btn-lg btn-block">
				<i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Logout</span>
			</a>
		</div>
	</nav>
</aside>