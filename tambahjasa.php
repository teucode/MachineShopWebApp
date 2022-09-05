<?php 
include 'class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Jasa Service</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Jasa Service</h1>
		<form method="post">
        <div class="form-group">
				<label>ID Jasa Service</label>
				<input type="text" class="form-control" name="id_jasa">
			</div>
			<div class="form-group">
				<label>Harga Jasa Service</label>
				<input type="number" class="form-control" name="harga_jasa">
			</div>
            <div class="form-group">
				<label>Nama Jasa Service</label>
				<input type="text" class="form-control" name="nama_jasa">
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
                $hasil = $jasaservice->simpan_jasa($_POST["id_jasa"],$_POST["harga_jasa"],$_POST["nama_jasa"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data jasa service tersimpan');</script>";
					echo "<script>location='tampiljasa.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahjasa.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             