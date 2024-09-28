<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title><?= $judul; ?></title>
	<?php require_once('_komponen/_css.php'); ?>

</head>

<body class="dark ">
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100">
			<form action="<?= base_url('auth/login'); ?>" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
				<h1 class="h6 mb-3">Login Dulu</h1>
				<div class="form-group">
					<label for="inputEmail" class="sr-only">Username</label>
					<input type="text" id="inputEmail" class="form-control form-control-lg" name="username" placeholder="Username" required="" autofocus="">
				</div>
				<div class="form-group">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" class="form-control form-control-lg" name="password" placeholder="Password" required="">
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				<p class="mt-5 mb-3 text-muted">ais © 2020</p>
				<div id="done">
					<?= $this->session->flashdata('alert'); ?>
				</div>
			</form>
		</div>
	</div>
	<?php require_once('_komponen/_js.php'); ?>
</body>

</html>
</body>

</html>