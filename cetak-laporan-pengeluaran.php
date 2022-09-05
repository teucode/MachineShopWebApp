<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<img src="logoawal.png " >
	<title>Laporan Pengeluaran Bulanan</title>
</head>

<body>
	<header>
		<h3>Laporan Pengeluaran Bulanan</h3>
	</header>
	
	<table align="left" border="1" width="20%">
	<tr>
      <td>Pilih</td>
      <td><select name="nilai" width="100%">
            <option name="1"value="1">Januari</option>
            <option value="2">Febuari</option>
            <option value="5">Mei</option>
          </select></td>
      <td><input type=submit value=Pilih></td>
    </tr>
    </table>
	
	<br>
	<br>
	<table align="#" border="2">
	<thead>
		<tr>
			<th>No</th>
            <th>Tanggal </th>
            <th>Stok Barang Keluar </th>
            <th>Harga </th>
            
		</tr>
	</thead>
	<tbody>
		
		<?php
		$i=1;
        $no = 1;
        
        // $hari = date("d"); 
        // $bulan = date("m");
        // $tahun = date("Y");
        // if(nilai==1){
            // $query = mysqli_query($db, "SELECT * FROM pegawai where day(tanggal)=$hari AND month(tanggal)=$bulan AND year(tanggal)=$tahun");	
            $sql = "SELECT * FROM transaksi_pengadaan";
            $query = mysqli_query($conn, $sql);
            // $jml = mysqli_num_rows($query);
            // if ($jml > 0){
                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$siswa['tanggal_pengadaan']."</td>";
                    echo "<td>".$siswa['jumlah_barang']."</td>";
                    echo "<td>".$siswa['total_harga']."</td>";
                    echo "</td>";
                    $i++;
                    echo "</tr>";
                }
            // }
        ?>
       
	</tbody>
    </table>
    <table align="left" border="1" width="27.5%" >
    <th>Total:</th>
    <?php 
        $total=0;
        $query = mysqli_query($conn,"SELECT SUM(total_harga) AS total  FROM transaksi_pengadaan group by month(tanggal_pengadaan)");
       
            while($siswa = mysqli_fetch_array($query)){
                
                echo "<th>".$siswa['total']."</th>";
            }
        ?>
    </table>
    <br>
	<br>
    <br>
	<!-- <p>Total: <?php echo mysqli_num_rows($query) ?></p> -->
    <nav>
		<button onClick="print_d()">Print </button>
			<script>
				window.load = print_d();
				function print_d(){
				window.print();
			}
			</script>
	</nav>
    <a href="index.php">Menu</a>
	</body>
</html>
