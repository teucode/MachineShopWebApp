<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
<img src="logoawal.png">
	<title>Laporan Pendapatan Bulanan</title>
</head>

<body>
	<header>
		<h3>Laporan Pendapatan Bulanan</h3>
	</header>
	<li><a href="cetak-pendapatan-bulanan.php">Laporan Pendapatan Bulanan</a></li>
    <li><a href="cetak-pendapatan-tahunan.php">Laporan Pendapatan Tahunan</a></li>
    <br>
	<table border="2">Tahun : 2018
	<thead>
		<tr>
			<th>No</th>
			<th>Bulan</th>
            <th>Service</th>
            <th>Sparepart</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
        $i=1;
        $total_nilai=0;
		$sql = "SELECT jasa_service.harga_jasa, spareparts.harga, month(transaksi.tanggal) as bulan 
        FROM transaksi
        INNER JOIN detail_transaksi_jasa ON transaksi.nomor_transaksi=detail_transaksi_jasa.nomor_transaksi 
        inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa 
        INNER JOIN detail_transaksi_sparepart ON transaksi.nomor_transaksi=detail_transaksi_sparepart.nomor_transaksi
        inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts group by bulan
        ORDER BY tanggal ASC ";
        $query = mysqli_query($conn, $sql);
		while($siswa = mysqli_fetch_array($query)){
            $ab= $siswa['harga_jasa'] + $siswa['harga'];
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$siswa['bulan']."</td>";
            echo "<td>Rp.".$siswa['harga_jasa']."</td>";
            echo "<td>Rp.".$siswa['harga']."</td>";
            echo "<td>Rp.$ab</td>";
        
			echo "</td>";
			$i++;
            echo "</tr>";
            $total_nilai += $ab;
        }
        $bulan=5;
        $siswa = mysqli_query($conn,"SELECT SUM(jasa_service.harga_jasa) AS jumlah_a, SUM(spareparts.harga) AS jumlah_b,
        month(transaksi.tanggal) as bulan
        from transaksi
        INNER JOIN detail_transaksi_jasa ON transaksi.nomor_transaksi=detail_transaksi_jasa.nomor_transaksi 
        inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa 
        INNER JOIN detail_transaksi_sparepart ON transaksi.nomor_transaksi=detail_transaksi_sparepart.nomor_transaksi
        inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts where bulan=$bulan");
        echo "<tr><td>TOTAL</td><td>$siswa[jumlah_a]</td><td>$siswa[jumlah_b]</td><td><td>Rp.$total_nilai</td></td></tr>";
        echo "</table>";
	
		?>
        </tbody>
        </table>
		<p>Total : <?php echo mysqli_num_rows($query) ?></p>
	
	<button  onClick="print_d()">Print Document</button>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
     
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
        <script type="text/javascript">
	    var chart1; 
        $(document).ready(function() {
            chart1 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },   
                title: {
                    text: 'Grafik Pendapatan Bulanan '
                },
                xAxis: {
                    categories: ['Bulan']
                },
                yAxis: {
                    title: {
                    text: 'Harga'
                    }
                },
                    series:             
                    [
            <?php 
        	
            $sql   = "SELECT SUM(jasa_service.harga_jasa) AS jumlah_a, SUM(spareparts.harga) AS jumlah_b
                INNER JOIN detail_transaksi_jasa ON transaksi.nomor_transaksi=detail_transaksi_jasa.nomor_transaksi 
                inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa 
                INNER JOIN detail_transaksi_sparepart ON transaksi.nomor_transaksi=detail_transaksi_sparepart.nomor_transaksi
                inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts ORDER BY tanggal ASC";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $siswa = mysqli_fetch_array( $query ) ){
            	$TANGGAL_MASUK=$siswa['tanggal']; 
 
                 $sql_harga   = "SELECT SUM(jasa_service.harga_jasa) AS jumlah_a
                 from transaksi
                 INNER JOIN detail_transaksi_jasa ON transaksi.nomor_transaksi=detail_transaksi_jasa.nomor_transaksi 
                 inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa 
                 INNER JOIN detail_transaksi_sparepart ON transaksi.nomor_transaksi=detail_transaksi_sparepart.nomor_transaksi
                 inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts WHERE tanggal='$tanggal'";
                 $harga="SELECT SUM(spareparts.harga) AS jumlah_b
                 from transaksi
                 INNER JOIN detail_transaksi_jasa ON transaksi.nomor_transaksi=detail_transaksi_jasa.nomor_transaksi 
                 inner join jasa_service on jasa_service.id_jasa = detail_transaksi_jasa.id_jasa 
                 INNER JOIN detail_transaksi_sparepart ON transaksi.nomor_transaksi=detail_transaksi_sparepart.nomor_transaksi
                 inner join spareparts on spareparts.kode_spareparts = detail_transaksi_sparepart.kode_spareparts WHERE tanggal='$tanggal'";
                 $total=$sql_harga+$harga;
                 $query_harga = mysqli_query( $conn,$total ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $total ) ){
                    $ab  = $siswa['ab '];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $tanggal; ?>',
                      data: [<?php echo $ab ; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
    </script>
	</head>
    <body>
            <div id='container'></div>		
        </body>

	<br>
	<button>
        <a href="index.php">Menu</a>
	</button>
    </body>
</html>

