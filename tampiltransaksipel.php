<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Tampil Riwayat Transaksi</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
<div class="wrapper">
		<h1>Cek Riwayat Transaksi</h1>
		<form action="tampiltransaksipel.php" method="get">
			<label>Cari Plat Nomor:</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari" class="btn-warning">
		</form><br>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br>
		<?php 
			if(isset($_GET['cari'])){
				$cari = $_GET['cari'];
				echo "<b>Hasil pencarian : ".$cari."</b>";
			}
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nomor Polisi</th>
					<th>Merk Kendaraan</th>
					<th>Tipe Kendaraan</th>
					<th>Nama Pelanggan</th>
					<th>Nama Spareparts</th>
					<th>Nama Jasa Service</th>
					<th>Grand Total</th>
					<th>Status Pembayaran</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(isset($_GET['cari'])){
						$cari = $_GET['cari'];
						$data = mysqli_query($conn, "SELECT kendaraan.nomor_polisi, kendaraan.merk_kendaraan, kendaraan.tipe_kendaraan, pelanggan.nama_pelanggan,
											detail_transaksi_sparepart.nama_spareparts, transaksi.grand_total,
											detail_transaksi_jasa.nama_jasa, transaksi.status_pembayaran
											from transaksi inner join pelanggan on transaksi.id_pelanggan = pelanggan.id_pelanggan
											inner join kendaraan on kendaraan.id_pelanggan = pelanggan.id_pelanggan 
											inner join detail_transaksi_sparepart on detail_transaksi_sparepart.nomor_transaksi = transaksi.nomor_transaksi
											inner join detail_transaksi_jasa on detail_transaksi_jasa.nomor_transaksi = transaksi.nomor_transaksi
											where kendaraan.nomor_polisi like '%".$cari."%'") or die( mysqli_error($conn));				
					}else {
						$data = mysqli_query($conn, "SELECT kendaraan.nomor_polisi, kendaraan.merk_kendaraan, kendaraan.tipe_kendaraan, pelanggan.nama_pelanggan, 
											detail_transaksi_sparepart.nama_spareparts, transaksi.grand_total,
											detail_transaksi_jasa.nama_jasa, transaksi.status_pembayaran
											from transaksi inner join pelanggan on transaksi.id_pelanggan = pelanggan.id_pelanggan
											inner join kendaraan on kendaraan.id_pelanggan = pelanggan.id_pelanggan 
											inner join detail_transaksi_sparepart on detail_transaksi_sparepart.nomor_transaksi = transaksi.nomor_transaksi
											inner join detail_transaksi_jasa on detail_transaksi_jasa.nomor_transaksi = transaksi.nomor_transaksi
											where transaksi.status_pembayaran = 'lunas'") or die( mysqli_error($conn));
					}
					$no = 1;
					while($d = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d["nomor_polisi"]; ?></td>
						<td><?php echo $d["merk_kendaraan"]; ?></td>
						<td><?php echo $d["tipe_kendaraan"]; ?></td>
						<td><?php echo $d["nama_pelanggan"]; ?></td>
						<td><?php echo $d["nama_spareparts"]; ?></td>
						<td><?php echo $d["nama_jasa"]; ?></td>
						<td><?php echo $d["grand_total"]; ?></td>
						<td><?php echo $d["status_pembayaran"]; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-danger">Kembali</a>
	</p>
</div>
	

</body>
</html>