<?php 
include 'class.php';
$datacabang = $cabang->tampil_cabang();
$datarole = $role->tampil_role();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pegawai</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Pegawai</h1>
		<form method="post">
			<div class="form-group">
				<label>ID Pegawai</label>
				<input type="text" class="form-control" name="id_peg">
			</div>
			<div class="form-group">
				<label>Id Cabang</label>
				<select class="form-control" name="id_cab">
					<option>-pilih</option>
					<?php foreach ($datacabang as $key => $value): ?>
						<option value="<?php echo $value['id_cabang'] ?>"><?php echo $value['nama_cabang'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"></textarea>
			</div>
			<div class="form-group">
				<label>No.Telp</label>
				<input type="number" class="form-control" name="telp">
			</div>
			<div class="form-group">
				<label>Gaji</label>
				<input type="number" class="form-control" name="gaji">
			</div>
			<div class="form-group">
				<label>Role</label>
				<select class="form-control" name="role">
					<option value="">-pilih</option>
					<?php foreach ($datarole as $key => $value): ?>
						
					<option value="<?php echo $value['id_role'] ?>"><?php echo $value['nama_role'] ?></option>
					<?php endforeach ?>
				</select>
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
				$hasil = $pegawai->simpan_pegawai($_POST["id_peg"],$_POST["id_cab"],$_POST["nama"],$_POST["alamat"],$_POST["telp"],$_POST["gaji"],$_POST["role"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data pegawai tersimpan');</script>";
					echo "<script>location='tampilpegawai.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahpegawai.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>