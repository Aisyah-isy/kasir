<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Kasir Ais || <?= $judul_halaman; ?></title>
  <?php require_once('_komponen/_css.php'); ?>
</head>

<body class="vertical  dark  ">
  <div class="wrapper">
    <?php require_once('_komponen/_navbar.php'); ?>

    <?php require_once('_komponen/_sidebar.php'); ?>

    <main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <?= $contents;?>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container-fluid -->
      <?php require_once('_komponen/_fitur.php'); ?>

    </main> <!-- main -->
  </div> <!-- .wrapper -->
  <?php require_once('_komponen/_js.php'); ?>
</body>

</html>