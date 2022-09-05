<?php 
include 'class.php';
$id=$_GET['id_pelanggan'];
$datapel=$pelanggan->ambil_pelanggan($id);
//$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pelanggan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Pelanggan</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" class="form-control" name="nama_pel" value="<?php echo $datapel['nama_pelanggan']?>">
			</div>
			<div class="form-group">
				<label>Telepon Pelanggan</label>
				<input type="number" class="form-control" name="telp_pel" value="<?php echo $datapel['telp_pelanggan']?>"></textarea>
			</div>
			<div class="form-group">
				<label>Alamat Pelanggan</label>
				<textarea class="form-control" name="alamat_pel"><?php echo $datapel['alamat_pelanggan'] ?></textarea>
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
				$hasil = $pelanggan->edit_pelanggan($id,$_POST["nama_pel"],$_POST["telp_pel"],$_POST["alamat_pel"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data pelanggan berhasil diubah');</script>";
					echo "<script>location='tampilpelanggan.php';</script>";
				}
				else
				{
					echo "<script>alert('data pelanggan gagal diubah');</script>";
					echo "<script>location='editpelanggan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             