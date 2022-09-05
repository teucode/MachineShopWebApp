<?php 
include 'class.php';
$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pelanggan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Pelanggan</h1>
		<form method="post">
			<div class="form-group">
				<label>ID Pelanggan</label>
				<input type="text" class="form-control" name="id_pel">
			</div>
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" class="form-control" name="nama_pel">
			</div>
			<div class="form-group">
				<label>Telepon Pelanggan</label>
				<input type="number" class="form-control" name="telp_pel">
			</div>
			<div class="form-group">
				<label>Alamat Pelanggan</label>
				<textarea class="form-control" name="alamat_pel"></textarea>
			</div>
			<!-- <div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password">
			</div> -->
			<button class="btn btn-primary" name="simpan">Simpan</button>
		</form>
		<?php
			if(isset($_POST["simpan"]))
			{
				$hasil = $pelanggan->simpan_pelanggan($_POST["id_pel"],$_POST["nama_pel"],$_POST["telp_pel"],$_POST["alamat_pel"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data pelanggan tersimpan');</script>";
					echo "<script>location='tampilpelanggan.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahpelanggan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             