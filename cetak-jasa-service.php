<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<img src="logoawal.png ">
	<title>Laporan Jasa Service</title>
</head>

<body>
	<header>
		<h3>Laporan Jasa Service</h3>
	</header>
	
	
	<nav>
		
		<button  onClick="print_d()">Print </button>
			<script>
				window.load = print_d();
				function print_d(){
				window.print();
			}
			</script>
	</nav>
	<br>
	
	<table border="2">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Jasa Service</th>
			<th>Harga </th>
       
            <th>Tanggal </th>
            <th>Status </th>
            <th>Plat Kendaraan </th>
            <th>Merk Kendaraan </th>
           
            
		</tr>
	</thead>
	<tbody>
		
		<?php
		$i=1;
        $no = 1;
        //$totalprice=0; 
        $total_nilai=0;
		$sql = "SELECT jasa_service.nama_jasa as NAMA_SERVICE, jasa_service.harga_jasa as HARGA_SERVICE, transaksi.tanggal as TANGGAL_TRANSAKSI, transaksi.STATUS_PEMBAYARAN, kendaraan.nomor_polisi as NOMOR_POLISI, kendaraan.merk_kendaraan as MERK_KENDARAAN
        FROM detail_transaksi_jasa 
        INNER JOIN transaksi ON detail_transaksi_jasa.nomor_transaksi=transaksi.nomor_transaksi 
        INNER JOIN jasa_service ON jasa_service.id_jasa=detail_transaksi_jasa.id_jasa
        INNER JOIN kendaraan ON detail_transaksi_jasa.id_kendaraan=kendaraan.id_kendaraan";
		$query = mysqli_query($conn, $sql);
		
		// var_dump($query);

		while($siswa = mysqli_fetch_array($query) ){
			$ab= $siswa['HARGA_SERVICE'];
			echo "<tr>";
			echo "<td>".$i."</td>";
			//echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['NAMA_SERVICE']."</td>";
            
			echo "<td>Rp.".$siswa['HARGA_SERVICE']."</td>";
            
            echo "<td>".$siswa['TANGGAL_TRANSAKSI']."</td>";
            echo "<td>".$siswa['STATUS_PEMBAYARAN']."</td>";
            echo "<td>".$siswa['NOMOR_POLISI']."</td>";
            echo "<td>".$siswa['MERK_KENDARAAN']."</td>";
           
			$total_nilai += $ab;
			
			
			// echo "<a href='form-edit-jasa.php?KODE_JASA=".$siswa['KODE_JASA']."'>Edit</a> | ";
			// echo "<a href='hapus-jasa.php?KODE_JASA=".$siswa['KODE_JASA']."'>Hapus</a> | ";
			//echo "<a href='cari-jasa.php?kode_jasa=".$siswa['kode_jasa']."'>Cari</a> | ";
			
			echo "</td>";
			$i++;
			echo "</tr>";
		}		
		$siswa = mysqli_query($conn,"SELECT SUM(jasa_service.harga_jasa as HARGA_SERVICE) AS jumlah_a FROM detail_transaksi_jasa
										inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa");
        echo "<td>TOTAL</td><td><td>Rp.$total_nilai</td></td>";
        echo "</table>";
		?>
		 <!-- <tr> 
            <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
        </tr>  -->
		
	</tbody>
	</table>
	
	<p>Total: <?php echo mysqli_num_rows($query) ?></p>
	<a href="index.php">Menu</a>
	</body>
</html>
