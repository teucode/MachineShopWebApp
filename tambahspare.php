<?php 
include 'class.php';
$datasup = $supplier->tampil_supplier();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Spareparts</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Spareparts</h1>
		<form method="post">
        <div class="form-group">
				<label>Kode Spareparts</label>
				<input type="text" class="form-control" name="kode_spare">
			</div>
            <div class="form-group">
				<label>ID Supplier</label>
				<select class="form-control" name="id_sup">
					<option>-pilih</option>
					<?php foreach ($datasup as $key => $value): ?>
						<option value="<?php echo $value['id_supplier'] ?>"><?php echo $value['nama_supplier'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kode Penempatan</label>
				<input type="text" class="form-control" name="kode_tempat">
			</div>
            <div class="form-group">
				<label>Nama Spareparts</label>
				<input type="text" class="form-control" name="nama_spare">
			</div>
            <div class="form-group">
				<label>Tipe Spareparts</label>
				<input type="text" class="form-control" name="tipe_spare">
			</div>
            <div class="form-group">
				<label>Merk Spareparts</label>
				<input type="text" class="form-control" name="merk_spare">
			</div>
            <div class="form-group">
				<label>Motor</label>
				<input type="text" class="form-control" name="motor">
			</div>
			<div class="form-group">
				<label>Jumlah Stok</label>
				<input type="number" class="form-control" name="stok"></textarea>
			</div>
            <div class="form-group">
				<label>Harga</label>
				<input type="number" class="form-control" name="harga">
			</div>
            <div class="form-group">
				<label>Stok Minimal</label>
				<input type="text" class="form-control" name="stokmin">
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
                $hasil = $spareparts->simpan_spareparts($_POST["kode_spare"],$_POST["id_sup"],$_POST["kode_tempat"],$_POST["nama_spare"],$_POST["tipe_spare"],$_POST["merk_spare"],$_POST["motor"],$_POST["stok"],$_POST["harga"],$_POST["stokmin"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data spareparts tersimpan');</script>";
					echo "<script>location='tampilspare.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahspare.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             