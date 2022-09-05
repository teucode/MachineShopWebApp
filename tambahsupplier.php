<?php 
include 'class.php';
$datasup = $supplier->tampil_supplier();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Supplier</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Supplier</h1>
		<form method="post">
        <div class="form-group">
				<label>ID Supplier</label>
				<input type="text" class="form-control" name="id_sup">
			</div>
			<div class="form-group">
				<label>Nama Sales</label>
				<input type="text" class="form-control" name="nama_sales">
			</div>
            <div class="form-group">
				<label>Alamat Supplier</label>
				<textarea class="form-control" name="alamat_sup"></textarea>
			</div>
			<div class="form-group">
				<label>Telepon Sales</label>
				<input type="number" class="form-control" name="telp_sales"></textarea>
			</div>
            <div class="form-group">
				<label>Nama Supplier</label>
				<input type="text" class="form-control" name="nama_sup">
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
                $hasil = $supplier->simpan_supplier($_POST["id_sup"],$_POST["nama_sales"],$_POST["alamat_sup"],$_POST["telp_sales"],$_POST["nama_sup"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data supplier tersimpan');</script>";
					echo "<script>location='tampilsupplier.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahsupplier.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             