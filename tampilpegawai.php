<?php 
include 'class.php';
include 'koneksi.php';
$semuapegawai = $pegawai->tampil_pegawai();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Pegawai</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Pegawai</h1>
		<a href="tambahpegawai.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampilpegawai.php" method="get">
			<label>Cari ID Pegawai :</label>
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
			<thead>
				<tr>
					<th>ID Pegawai</th>
					<th>ID Cabang</th>
					<th>Nama Pegawai</th>
					<th>Alamat Pegawai</th>
					<th>Telp Pegawai</th>
					<th>Role</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from pegawai where id_pegawai like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from pegawai") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					
				<tr>
					<td><?php echo $value["id_pegawai"]; ?></td>
					<td><?php echo $value["id_cabang"]; ?></td>
					<td><?php echo $value["nama_pegawai"]; ?></td>
					<td><?php echo $value["alamat_pegawai"]; ?></td>
					<td><?php echo $value["telp_pegawai"]; ?></td>
					<td><?php echo $value["id_role"]; ?></td>
					<td>
						<a href="editpegawai.php?id_pegawai=<?php echo $value['id_pegawai'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapuspegawai.php?id_pegawai=<?php echo $value['id_pegawai'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</body>
</html>