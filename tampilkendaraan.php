<?php 
include 'class.php';
include 'koneksi.php';
$datakend = $kendaraan->tampil_kendaraan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Kendaraan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Kendaraan</h1><br>
		<a href="tambahkendaraan.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampilkendaraan.php" method="get">
			<label>Cari ID Kendaraan :</label>
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
					<th>Id Kendaraan</th>
					<th>Id Pelanggan</th>
					<th>Nomor Polisi</th>
					<th>Merk Kendaraan</th>
                    <th>Tipe Kendaraan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from kendaraan where id_kendaraan like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from kendaraan") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
						<td><?php echo $value["id_kendaraan"]; ?></td>
						<td><?php echo $value["id_pelanggan"]; ?></td>
						<td><?php echo $value["nomor_polisi"]; ?></td>
						<td><?php echo $value["merk_kendaraan"]; ?></td>
						<td><?php echo $value["tipe_kendaraan"]; ?></td>
						<td>
						<a href="editkendaraan.php?id_kendaraan=<?php echo $value['id_kendaraan'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapuskendaraan.php?id_supplier=<?php echo $value['id_kendaraan'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
		
	</div>

</body>
</html>