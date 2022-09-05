<?php 
include 'class.php';
$datatransaksijas = $transaksijasa->tampil_transaksijasa();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Riwayat Transaksi</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Transaksi Jasa Service</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID Transaksi Jasa</th>
					<th>ID Kendaraan</th>
					<th>Nomor Transaksi</th>
					<th>Nama CS</th>
					<th>Nama Montir</th>
					<th>Nama Jasa</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($datatransaksijas as $key => $value): ?>
					<tr>
					
						<td><?php echo $value["id_detail_transaksi_js"]; ?></td>
						<td><?php echo $value["id_kendaraan"]; ?></td>
						<td><?php echo $value["nomor_transaksi"]; ?></td>
						<td><?php echo $value["nama_cs"]; ?></td>
						<td><?php echo $value["nama_montir"]; ?></td>
						<td><?php echo $value["nama_jasa"]; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-danger">Kembali</a>
	</div>

</body>
</html>