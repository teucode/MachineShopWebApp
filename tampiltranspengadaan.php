<?php 
include 'class.php';
include 'koneksi.php';
$datatranspengadaan = $transpengadaan->tampil_transpengadaan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Daftar Transaksi Pengadaan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Transaksi Pengadaan</h1><br>
		<a href="tambahtranspengadaan.php" class="btn btn-primary">Tambah Transaksi</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampiltranspengadaan.php" method="get">
			<label>Cari ID Trans :</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari">
		</form><br>
		<?php 
			if(isset($_GET['cari'])){
				$cari = $_GET['cari'];
				echo "<b>Hasil pencarian : ".$cari."</b>";
			}
		?><br>
		<table class="table table-bordered">
			<thead><br>
				<tr>
					<th>ID Transaksi</th>
					<th>ID Supplier</th>
					<th>Kode Spareparts</th>
					<th>Harga Satuan</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from transaksi_pengadaan where id_transaksi_pengadaan like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from transaksi_pengadaan") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
						<td><?php echo $value["id_transaksi_pengadaan"]; ?></td>
						<td><?php echo $value["id_supplier"]; ?></td>
						<td><?php echo $value["kode_spareparts"]; ?></td>
						<td><?php echo $value["harga_satuan"]; ?></td>
						<td><?php echo $value["jumlah_barang"]; ?></td>
						<td><?php echo $value["total_harga"]; ?></td>
						<td>
						<a href="edittranspengadaan.php?id_transaksi_pengadaan=<?php echo $value['id_transaksi_pengadaan'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapustranspengadaan.php?id_transaksi_pengadaan=<?php echo $value['id_transaksi_pengadaan'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
		
	</div>

</body>
</html>