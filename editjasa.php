<?php 
include 'class.php';
$id=$_GET['id_jasa'];
$datajasa=$jasaservice->ambil_jasa($id);
//$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Jasa Service</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Jasa Service</h1>
		<form method="post">
			<div class="form-group">
				<label>Harga Jasa Service</label>
				<input type="number" class="form-control" name="harga_jasa" value="<?php echo $datajasa['harga_jasa']?>">
			</div>
			<div class="form-group">
				<label>Nama Jasa Service</label>
				<input type="text" class="form-control" name="nama_jasa" value="<?php echo $datajasa['nama_jasa']?>">
			</div>
			<!-- <div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password">
			</div> -->
			<button class="btn btn-primary" name="edit">Simpan</button>
		</form>
		<?php
			if(isset($_POST["edit"]))
			{
				$hasil = $jasaservice->edit_jasa($id,$_POST["harga_jasa"],$_POST["nama_jasa"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data jasa service berhasil diubah');</script>";
					echo "<script>location='tampiljasa.php';</script>";
				}
				else
				{
					echo "<script>alert('data jasa service gagal diubah');</script>";
					echo "<script>location='editjasa.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             