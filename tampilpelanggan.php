<?php 
include 'class.php';
include 'koneksi.php';
$datapelanggan = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Pelanggan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Pelanggan</h1><br>
		<a href="tambahpelanggan.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampilpelanggan.php" method="get">
			<label>Cari ID Pelanggan :</label>
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
					<th>Id Pelanggan</th>
					<th>Nama Pelanggan</th>
					<th>No.Telp</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from pelanggan") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
						<td><?php echo $value["id_pelanggan"]; ?></td>
						<td><?php echo $value["nama_pelanggan"]; ?></td>
						<td><?php echo $value["telp_pelanggan"]; ?></td>
						<td><?php echo $value["alamat_pelanggan"]; ?></td>
						<td>
						<a href="editpelanggan.php?id_pelanggan=<?php echo $value['id_pelanggan'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapuspelanggan.php?id_pelanggan=<?php echo $value['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
		
	</div>

</body>
</html>