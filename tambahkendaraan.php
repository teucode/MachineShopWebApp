<?php 
include 'class.php';
$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kendaraan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Kendaraan</h1>
		<form method="post">
			<div class="form-group">
				<label>ID Kendaraan</label>
				<input type="text" class="form-control" name="id_kend">
			</div>
			<div class="form-group">
				<label>Id Pelanggan</label>
				<select class="form-control" name="id_pel">
					<option>-pilih</option>
					<?php foreach ($datapel as $key => $value): ?>
						<option value="<?php echo $value['id_pelanggan'] ?>"><?php echo $value['nama_pelanggan'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nomor Polisi</label>
				<input type="text" class="form-control" name="nopol">
			</div>
			<div class="form-group">
				<label>Merk Kendaraan</label>
				<input type="text" class="form-control" name="merk_kend">
			</div>
			<div class="form-group">
				<label>Tipe Kendaraan</label>
				<input type="text" class="form-control" name="tipe_kend">
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
				$hasil = $kendaraan->simpan_kendaraan($_POST["id_kend"],$_POST["id_pel"],$_POST["nopol"],$_POST["merk_kend"],$_POST["tipe_kend"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data kendaraan tersimpan');</script>";
					echo "<script>location='tampilkendaraan.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahkendaraan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>