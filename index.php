<?php 
include 'class.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Administrator</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="dist/css/admin.css">
</head>
<body>

<div class="wrapper">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">AtmaAuto</a>
		</div>
	</nav>
	<aside class="sidebar sidebar-collapse">
		<div class="menu">
			<ul class="menu-content">
				<li>
					<a href=""><i class="fa fa-home"></i><span>Home</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-cube"></i><span>Data Master</span><i class="fa fa-angle-down pull-right"></i></a>
					<ul>
						<li><a href="tampilpegawai.php">Data Pegawai</a></li>
						<li><a href="tampilpelanggan.php">Data Pelanggan</a></li>
						<li><a href="tampilsupplier.php">Data Supplier</a></li>
						<li><a href="tampilspare.php">Data Spareparts</a></li>
						<li><a href="tampilkendaraan.php">Data Kendaraan</a></li>
						<li><a href="tampiljasa.php">Data Jasa Service</a></li>
						<li><a href="tampiltransjas.php">Data Transaksi Jasa Service</a></li>
					<li><a href="tampilsparebystokasc.php">Data Spareparts berdasarkan Stok</a></li>
					</ul>
				</li>
				<li>
					<a href="tampiltranspengadaan.php"><i class="fa fa-book"></i><span>Transaksi Pengadaan</span></a>
				</li>
				<li>
				<a href="#"><i class="fa fa-cube"></i><span>Laporan</span><i class="fa fa-angle-down pull-right"></i></a>
					
					<li><a href="cetak-pendapatan-tahunan.php"><i class="fa fa-book"></i><span>Laporan Pendapatan Tahunan</span></a></li>
					<li><a href="cetak-pendapatan-bulanan.php"><i class="fa fa-book"></i><span>Laporan Pendapatan Bulanan</span></a></li>
					<li><a href="cetak-laporan-pengeluaran.php"><i class="fa fa-book"></i><span>Laporan Pengeluaran Bulanan</span></a></li>
					<li><a href="cetak-sparepart-terlaris.php"><i class="fa fa-book"></i><span>Laporan Sparepart Terlaris</span></a></li>
					<li><a href="cetak-jasa-service.php"><i class="fa fa-book"></i><span>Laporan Jasa Service</span></a></li>
					<li><a href="cetak-laporan-sisa-stok.php"><i class="fa fa-book"></i><span>Laporan Sisa Stok Bulanan</span></a></li>
					
				</li>
				<li>
					<a href="tampiltransaksipel.php"><i class="fa fa-book"></i><span>Cek Riwayat Transaksi</span></a>
					
					
				</li>
				<li>
					<a href="logout.php"><i class="fa fa-sign-out"></i><span>Sign Out</span></a>
				</li>
			</ul>
		</div>
	</aside>
	<section class="content">
		<div class="inner">
			<p>
				Atma Auto adalah sebuah bengkel yang dikembangkan oleh Atma Corporation. Bengkel ini awalnya beralamat di
				Jl. Babarsari No. 40 namun kemudian mulai mengembangkan usahanya ke berbagai cabang. 
				Telepon	: 0274 - 9876789
			</p>
		</div>
	</section>
</div>






<script src="dist/js/jquery.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/admin.js"></script>
</body>
</html>