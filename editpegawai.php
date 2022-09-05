<?php 
include 'class.php';
$id=$_GET['id_pegawai'];
$datapegawai=$pegawai->ambil_pegawai($id);
$datacabang = $cabang->tampil_cabang();
$datarole = $role->tampil_role();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pegawai</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Data Pegawai</h1>
		<form method="post">
			<div class="form-group">
				<label>Id_Cabang</label>
				<select class="form-control" name="id">
					<option>-pilih</option>
					<?php foreach ($datacabang as $key => $value): ?>
					<option <?php if ($datapegawai['id_cabang']==$value['id_cabang']) {
						echo "selected";
					} ?> value="<?php echo $value['id_cabang'] ?>"><?php echo $value['nama_cabang'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $datapegawai['nama_pegawai']?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"><?php echo $datapegawai['alamat_pegawai'] ?></textarea>
			</div>
			<div class="form-group">
				<label>No.Telp</label>
				<input type="number" class="form-control" name="telp" value="<?php echo $datapegawai['telp_pegawai'] ?>">
			</div>
			<div class="form-group">
				<label>Gaji</label>
				<input type="number" class="form-control" name="gaji" value="<?php echo $datapegawai['gaji_pegawai'] ?>">
			</div>
			<div class="form-group">
				<label>Role</label>
				<select class="form-control" name="role">
					<option value="">-pilih</option>
					<?php foreach ($datarole as $key => $value): ?>
						
					<option <?php if ($datapegawai['id_role']==$value['id_role']): ?>
						selected
					<?php endif ?> value="<?php echo $value['id_role'] ?>"><?php echo $value['nama_role'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<!-- <div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" value="<?php echo $datapegawai['username'] ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="pass">
			</div> -->
			<button class="btn btn-primary btn-block" name="edit">Edit</button>
		</form>
		<?php
			if(isset($_POST["edit"]))
			{
				$hasil = $pegawai->edit_pegawai($id,$_POST["id"],$_POST["nama"],$_POST["alamat"],$_POST["telp"],$_POST["gaji"],$_POST["role"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data pegawai berahasil diubah');</script>";
					echo "<script>location='tampilpegawai.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='editdatapegawai.php?id_pegawai=$id';</script>";
				}
				
			}
		?>
	</div>

</body>
</html>