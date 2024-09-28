<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="col">
	<h2 class="h5 page-title">Welcome To KASIR AIS, <?= $this->session->userdata('nama'); ?></h2>
</div>
<div class="row">
	<div class="col-md-6 col-xl-3 mb-4">
		<div class="card shadow">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-3 text-center">
						<span class="circle circle-sm bg-primary">
							<i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
						</span>
					</div>
					<div class="col pr-0">
						<p class="small text-muted mb-0">Penjualan Hari Ini</p>
						<span class="h3 mb-0">Rp. <?= number_format($hari_ni) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3 mb-4">
		<div class="card shadow">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-3 text-center">
						<span class="circle circle-sm bg-primary">
							<i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
						</span>
					</div>
					<div class="col pr-0">
						<p class="small text-muted mb-0">Penjualan Bulan Ini</p>
						<span class="h3 mb-0">Rp. <?= number_format($bulan_ni) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3 mb-4">
		<div class="card shadow">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-3 text-center">
						<span class="circle circle-sm bg-primary">
							<i class="fe fe-16 fe-folder-plus text-white mb-0"></i>
						</span>
					</div>
					<div class="col">
						<p class="small text-muted mb-0">Transaksi Hari Ini</p>
						<span class="h3 mb-0"><?= $transaksi; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3 mb-4">
		<div class="card shadow">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-3 text-center">
						<span class="circle circle-sm bg-primary">
							<i class="fe fe-16 fe-package text-white mb-0"></i>
						</span>
					</div>
					<div class="col">
						<p class="small text-muted mb-0">Produk</p>
						<span class="h3 mb-0"><?= $produk; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<?php 
			$nama_now = date('M');
			$nama_1 = date('M',strtotime("-1 Months"));
			$nama_2 = date('M',strtotime("-2 Months"));
			$nama_3 = date('M',strtotime("-3 Months"));
			$nama_4 = date('M',strtotime("-4 Months"));
			$nama_5 = date('M',strtotime("-5 Months"));

			$tgl    = date('Y-m',strtotime("-1 Months"));
			$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
			$bulan_1 = $this->db->get()->row()->total;

			$tgl    = date('Y-m',strtotime("-2 Months"));
			$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
			$bulan_2 = $this->db->get()->row()->total;

			$tgl    = date('Y-m',strtotime("-3 Months"));
			$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
			$bulan_3 = $this->db->get()->row()->total;

			$tgl    = date('Y-m',strtotime("-4 Months"));
			$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
			$bulan_4 = $this->db->get()->row()->total;

			$tgl    = date('Y-m',strtotime("-5 Months"));
			$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =",  $tgl);
			$bulan_5 = $this->db->get()->row()->total;

			if($bulan_1==NULL){$bulan_1=0;}
			if($bulan_2==NULL){$bulan_2=0;}
			if($bulan_3==NULL){$bulan_3=0;}
			if($bulan_4==NULL){$bulan_4=0;}
			if($bulan_5==NULL){$bulan_5=0;}

		?>
		<div class="card shadow">
			<div class="card-body">
				<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
				<script>
					var xValues = ["<?= $nama_5?>", "<?= $nama_4?>", "<?= $nama_3?>", "<?= $nama_2?>", "<?= $nama_1?>", "<?= $nama_now?>"];
					var yValues = [<?= $bulan_5?>, <?= $bulan_4?>, <?= $bulan_3?>, <?= $bulan_2?>, <?= $bulan_1?>,<?= $bulan_ni?>];
					var barColors = ["red", "green", "blue", "orange", "brown","pink"];

					new Chart("myChart", {
						type: "bar",
						data: {
							labels: xValues,
							datasets: [{
								backgroundColor: barColors,
								data: yValues
							}]
						},
						options: {
							legend: {
								display: false
							},
							title: {
								display: true,
								text: "Penjualan 5 Bulan Terakhir"
							}
						}
					});
				</script>

			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
	</div>
</div>