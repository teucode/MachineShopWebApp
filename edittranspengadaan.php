<?php 
include 'class.php';
$id=$_GET['id_transaksi_pengadaan'];
$datatrans = $transpengadaan->ambil_transpengadaan($id);
$datasup = $supplier->tampil_supplier();
$dataspare = $spareparts->tampil_spareparts();
//$datapel = $pelanggan->tampil_pelanggan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Transaksi Pengadaan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Edit Transaksi Pengadaan</h1>
		<form method="post">
            <div class="form-group">
				<label>ID Supplier</label>
				<select class="form-control" name="id_sup">
					<option>-pilih</option>
					<?php foreach ($datasup as $key => $value): ?>
					<option <?php if ($datatrans['id_supplier']==$value['id_supplier']) {
						echo "selected";
					} ?> value="<?php echo $value['id_supplier'] ?>"><?php echo $value['nama_supplier'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
            <div class="form-group">
				<label>Kode Spareparts</label>
				<select class="form-control" name="kode_spare">
					<option>-pilih</option>
					<?php foreach ($dataspare as $key => $value): ?>
					<option <?php if ($datatrans['kode_spareparts']==$value['kode_spareparts']) {
						echo "selected";
					} ?> value="<?php echo $value['kode_spareparts'] ?>"><?php echo $value['nama_spareparts'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Harga Satuan</label>
				<input type="number" class="form-control" name="harga" value="<?php echo $datatrans['harga_satuan']?>">
			</div>
            <div class="form-group">
				<label>Jumlah Barang</label>
				<input type="number" class="form-control" name="jumlah" value="<?php echo $datatrans['jumlah_barang']?>">
			</div>
            
			<button class="btn btn-primary" name="edit">Simpan</button>
		</form>
		<?php
            
			if(isset($_POST["edit"]))
			{
				$total=$_POST["jumlah"]*$_POST["harga"];
				$hasil = $transpengadaan->edit_transpengadaan($id,$_POST["id_sup"],$_POST["kode_spare"],'',$_POST["harga"],$_POST["jumlah"],$total);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data transaksi pengadaan berhasil diubah');</script>";
					echo "<script>location='tampiltranspengadaan.php';</script>";
				}
				else
				{
					echo "<script>alert('data transaksi pengadaan gagal diubah');</script>";
					echo "<script>location='edittranspengadaan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             