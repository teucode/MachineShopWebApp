<?php 
include 'class.php';
$datasup = $supplier->tampil_supplier();
$dataspare = $spareparts->tampil_spareparts();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Transaksi Pengadaan</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Tambah Transaksi Pengadaan</h1>
		<form method="post">
        <div class="form-group">
				<label>ID Transaksi Pengadaan</label>
				<input type="text" class="form-control" name="id_trans">
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
				<label>Kode Spareparts</label>
				<select class="form-control" name="kode_spare">
					<option>-pilih</option>
					<?php foreach ($dataspare as $key => $value): ?>
						<option value="<?php echo $value['kode_spareparts'] ?>"><?php echo $value['nama_spareparts'] ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Harga Satuan</label>
				<input type="number" class="form-control" name="harga">
			</div>
            <div class="form-group">
				<label>Jumlah Barang</label>
				<input type="number" class="form-control" name="jumlah">
			</div>
			<button class="btn btn-primary" name="simpan">Simpan</button>
		</form>
		<?php
            
			if(isset($_POST["simpan"]))
			{
                $total=$_POST["jumlah"]*$_POST["harga"];
                $hasil = $transpengadaan->simpan_transpengadaan($_POST["id_trans"],$_POST["id_sup"],$_POST["kode_spare"],'',$_POST["harga"],$_POST["jumlah"],$total);
				if($hasil=="sukses")
				{
					echo "<script>alert('sukses,data transaksi tersimpan');</script>";
					echo "<script>location='tampiltranspengadaan.php';</script>";
				}
				else
				{
					echo "<script>alert('penyimpanan gagal');</script>";
					echo "<script>location='tambahtranspengadaan.php';</script>";
				}
			}
		?>
	</div>

</body>
</html>                                                                                                                                                                                             