<?php 
include 'class.php';
$id=$_GET['id_kendaraan'];
$datakend=$kendaraan->ambil_kendaraan($id);
$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Kendaraan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Kendaraan</h1>
		<form method="post">
			<div class="form-group">
				<label>ID Pelanggan</label>
				<select class="form-control" name="id_pel">
					<option>-pilih</option>
					<?php foreach ($datapel as $key => $value): ?>
					<option <?php if ($datakend['id_pelanggan']==$value['id_pelanggan']) {
						echo "selected";
					} ?> value="<?php echo $value['id_pelanggan'] ?>"><?php echo $value['nama_pelanggan'] ?></option>	
					<?php endforeach ?>
				</select>
            </div>
			<div class="form-group">
				<label>Nomor Polisi</label>
				<input type="text" class="form-control" name="nopol" value="<?php echo $datakend['nomor_polisi']?>">
			</div>
            <div class="form-group">
				<label>Merk Kendaraan</label>
				<input type="text" class="form-control" name="merk_kend" value="<?php echo $datakend['merk_kendaraan']?>">
			</div>
            <div class="form-group">
				<label>Tipe Kendaraan</label>
				<input type="text" class="form-control" name="tipe_kend" value="<?php echo $datakend['tipe_kendaraan']?>">
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
                $hasil = $kendaraan->edit_kendaraan($id,$_POST["id_pel"],$_POST["nopol"],$_POST["merk_kend"],$_POST["tipe_kend"]);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data kendaraan berhasil diubah');</script>";
					echo "<script>location='tampilkendaraan.php';</script>";
				}
				else
				{
					echo "<script>alert('data kendaraan gagal diubah');</script>";
					echo "<script>location='editkendaraan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             