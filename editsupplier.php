<?php 
include 'class.php';
$id=$_GET['id_supplier'];
$datasup=$supplier->ambil_supplier($id);
//$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Supplier</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Supplier</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama Sales</label>
				<input type="text" class="form-control" name="nama_sales" value="<?php echo $datasup['nama_sales']?>">
			</div>
            <div class="form-group">
				<label>Alamat Supplier</label>
				<textarea class="form-control" name="alamat_sup"><?php echo $datasup['alamat_supplier']?></textarea>
			</div>
			<div class="form-group">
				<label>Telepon Sales</label>
				<input type="number" class="form-control" name="telp_sales" value="<?php echo $datasup['telp_sales']?>"></textarea>
			</div>
            <div class="form-group">
				<label>Nama Supplier</label>
				<input type="text" class="form-control" name="nama_sup" value="<?php echo $datasup['nama_supplier']?>">
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
				$hasil = $supplier->edit_supplier($id,$_POST["nama_sales"],$_POST["alamat_sup"],$_POST["telp_sales"],$_POST["nama_sup"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data supplier berhasil diubah');</script>";
					echo "<script>location='tampilsupplier.php';</script>";
				}
				else
				{
					echo "<script>alert('data pelanggan gagal diubah');</script>";
					echo "<script>location='editsupplier.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             