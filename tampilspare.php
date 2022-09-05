<?php 
include 'class.php';
include 'koneksi.php';
$dataspare = $spareparts->tampil_spareparts();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Spareparts</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Spareparts</h1>
		<a href="tambahspare.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampilspare.php" method="get">
			<label>Cari Kode Spareparts :</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari">
		</form><br>
		<?php 
			if(isset($_GET['cari'])){
				$cari = $_GET['cari'];
				echo "<b>Hasil pencarian : ".$cari."</b>";
			}
		?><br>
		<table class="table table-bordered">
			<thead><br>
				<tr>
					<th>Kode Spareparts</th>
					<th>ID Supplier</th>
					<th>Kode Penempatan</th>
					<th>Nama Spareparts</th>
					<th>Tipe Spareparts</th>
					<th>Merk Spareparts</th>
                    <th>Motor</th>
                    <th>Jumlah Stok</th>
					<th>Harga</th>
					<th>Stok Minimal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			
            <?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from spareparts where kode_spareparts like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from spareparts") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
					
						<td><?php echo $value["kode_spareparts"]; ?></td>
						<td><?php echo $value["id_supplier"]; ?></td>
						<td><?php echo $value["kode_penempatan"]; ?></td>
						<td><?php echo $value["nama_spareparts"]; ?></td>
						<td><?php echo $value["tipe_spareparts"]; ?></td>
						<td><?php echo $value["merk_spareparts"]; ?></td>
						<td><?php echo $value["motor"]; ?></td>
						<td><?php echo $value["jumlah_stok"]; ?></td>
						<td><?php echo $value["harga"]; ?></td>
						<td><?php echo $value["stok_min"]; ?></td>
                        <td>
						<a href="editspare.php?kode_spareparts=<?php echo $value['kode_spareparts'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapusspare.php?kode_spareparts=<?php echo $value['kode_spareparts'] ?>" class="btn btn-danger">Hapus</a>
					</td>
					</tr>
                <?php } ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-danger">Kembali</a>
	</div>

</body>
</html>