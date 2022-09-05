<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
<img src="logoawal.png">
	<title>Laporan Sparepart Terlaris</title>
</head>

<body>
	<header>
		<h3>Laporan Sparepart Terlaris</h3>
	</header>
	<th>Tahun : 2019</th>
	<table border="2">
	<thead>
		<tr>
			<th>No</th>
			<th>Bulan</th>
			<th>Nama Sparepart</th>
			<th>Tipe Sparepart</th>
			<th>Jumlah Penjualan</th>
			
		</tr>
	</thead>
	<tbody>
		
		<?php
		$i=1;
		$sql = "SELECT MONTH(tanggal) AS bulan, spareparts.nama_spareparts, spareparts.tipe_spareparts, spareparts.jumlah_stok 
		FROM transaksi
		INNER JOIN detail_transaksi_sparepart ON detail_transaksi_sparepart.nomor_transaksi=transaksi.nomor_transaksi
		inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts
		ORDER BY bulan ASC";
		$query = mysqli_query($conn, $sql) ;
		
		while($siswa = mysqli_fetch_array($query) ){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$siswa['bulan']."</td>";
			echo "<td>".$siswa['nama_spareparts']."</td>";
			echo "<td>".$siswa['tipe_spareparts']."</td>";
			echo "<td>".$siswa['jumlah_stok']."</td>";
		
			echo "</td>";
			$i++;
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	<button  onClick="print_d()">Print Document</button>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
	<!-- <p>Total: <?php echo mysqli_num_rows($query) ?></p> -->
	<a href="index.php">Menu</a>
	</body>
</html>
