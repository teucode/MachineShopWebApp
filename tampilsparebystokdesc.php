<?php 
include 'class.php';
include 'koneksi.php';
$datasparestok = $spareparts->tampil_sparepartsbystok();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Spareparts DESC</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Spareparts Stok DESC</h1>
		<form method="get" action="tampilsparebystokasc.php" id="form1">       
			<button type="submit" class="btn btn-warning" form="form1" >Ubah menjadi ASC</button>
		</form><br>
		<a href="index.php" class="btn btn-danger">Kembali</a><br>
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
				</tr>
			</thead>
			<tbody>
			<?php 
				
				$data = mysqli_query($conn, "SELECT * from spareparts order by jumlah_stok desc") or die( mysqli_error($conn));				
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
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-danger">Kembali</a>
	</div>

</body>
</html>