<?php 
include 'class.php';
include 'koneksi.php';
$datajasa = $jasaservice->tampil_jasa();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Jasa Service</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Jasa Service</h1><br>
		<a href="tambahjasa.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampiljasa.php" method="get">
			<label>Cari ID Jasa Service :</label>
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
					<th>Id Jasa Service</th>
					<th>Harga Jasa Service</th>
					<th>Nama Jasa Service</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from jasa_service where id_jasa like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from jasa_service") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
						<td><?php echo $value["id_jasa"]; ?></td>
						<td><?php echo $value["harga_jasa"]; ?></td>
						<td><?php echo $value["nama_jasa"]; ?></td>
						<td>
						<a href="editjasa.php?id_jasa=<?php echo $value['id_jasa'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapusjasa.php?id_jasa=<?php echo $value['id_jasa'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
		
	</div>

</body>
</html>