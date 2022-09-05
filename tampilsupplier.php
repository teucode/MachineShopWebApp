<?php 
include 'class.php';
include 'koneksi.php';
$datasupplier = $supplier->tampil_supplier();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Supplier</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Data Supplier</h1><br>
		<a href="tambahsupplier.php" class="btn btn-primary">Tambah Data</a>
		<a href="index.php" class="btn btn-danger">Kembali</a><br><br><br>
		<form action="tampilsupplier.php" method="get">
			<label>Cari ID Supplier :</label>
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
					<th>Id Supplier</th>
					<th>Nama Sales</th>
					<th>Alamat Supplier</th>
					<th>Telepon Sales</th>
                    <th>Nama Supplier</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$data = mysqli_query($conn, "SELECT * from supplier where id_supplier like '%".$cari."%'") or die( mysqli_error($conn));				
				}else {
					$data = mysqli_query($conn, "SELECT * from supplier") or die( mysqli_error($conn));
				}
				$no = 1;
				while($value = mysqli_fetch_array($data) or die( mysqli_error($conn))) {
				?>
					<tr>
						<td><?php echo $value["id_supplier"]; ?></td>
						<td><?php echo $value["nama_sales"]; ?></td>
						<td><?php echo $value["alamat_supplier"]; ?></td>
						<td><?php echo $value["telp_sales"]; ?></td>
						<td><?php echo $value["nama_supplier"]; ?></td>
						<td>
						<a href="editsupplier.php?id_supplier=<?php echo $value['id_supplier'] ?>" class="btn btn-primary">Edit</a>
						<a href="hapussupplier.php?id_supplier=<?php echo $value['id_supplier'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
		
	</div>

</body>
</html>