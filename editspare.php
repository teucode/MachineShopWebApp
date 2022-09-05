<?php 
include 'class.php';
$id=$_GET['kode_spareparts'];
$dataspare = $spareparts->ambil_spareparts($id);
$datasup = $supplier->tampil_supplier();
//$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Spareparts</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Spareparts</h1>
		<form method="post">
            <div class="form-group">
				<label>ID Supplier</label>
				<select class="form-control" name="id_sup">
					<option>-pilih</option>
					<?php foreach ($datasup as $key => $value): ?>
					<option <?php if ($dataspare['id_supplier']==$value['id_supplier']) {
						echo "selected";
					} ?> value="<?php echo $value['id_supplier'] ?>"><?php echo $value['nama_supplier'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kode Penempatan</label>
				<input type="text" class="form-control" name="kode_tempat" value="<?php echo $dataspare['kode_penempatan']?>">
			</div>
            <div class="form-group">
				<label>Nama Spareparts</label>
				<input type="text" class="form-control" name="nama_spare" value="<?php echo $dataspare['nama_spareparts']?>">
			</div>
            <div class="form-group">
				<label>Tipe Spareparts</label>
				<input type="text" class="form-control" name="tipe_spare" value="<?php echo $dataspare['tipe_spareparts']?>">
			</div>
            <div class="form-group">
				<label>Merk Spareparts</label>
				<input type="text" class="form-control" name="merk_spare" value="<?php echo $dataspare['merk_spareparts']?>">
			</div>
            <div class="form-group">
				<label>Motor</label>
				<input type="text" class="form-control" name="motor" value="<?php echo $dataspare['motor']?>">
			</div>
            <div class="form-group">
				<label>Jumlah Stok</label>
				<input type="text" class="form-control" name="stok" value="<?php echo $dataspare['jumlah_stok']?>">
			</div>
            <div class="form-group">
				<label>Harga</label>
				<input type="text" class="form-control" name="harga" value="<?php echo $dataspare['harga']?>">
			</div>
            <div class="form-group">
				<label>Stok Minimal</label>
				<input type="text" class="form-control" name="stokmin" value="<?php echo $dataspare['stok_min']?>">
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
				$hasil = $spareparts->edit_spareparts($id,$_POST["id_sup"],$_POST["kode_tempat"],$_POST["nama_spare"],$_POST["tipe_spare"],$_POST["merk_spare"],$_POST["motor"],$_POST["stok"],$_POST["harga"],$_POST["stokmin"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data spareparts berhasil diubah');</script>";
					echo "<script>location='tampilspare.php';</script>";
				}
				else
				{
					echo "<script>alert('data spareparts gagal diubah');</script>";
					echo "<script>location='editspare.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             